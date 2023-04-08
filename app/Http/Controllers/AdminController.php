<?php

namespace App\Http\Controllers;

use Mail;
use App\Plan;
use App\Stat;
use App\User;
use App\Payout;
use App\Deposit;
use App\Settings;
use App\Transfer;
use App\CreditCard;
use App\Investment;
use App\Transaction;
use App\Mail\Messaging;
use App\Staticinvestment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use App\Http\Controllers\Globals as Util;

class AdminController extends Controller
{

    public function home(){
        $users = count(User::get());
        $investments = Investment::sum('amount');
        $deposits = Deposit::where('status', 'approved')->sum('amount');
        $payout = Payout::where('status', 'approved')->sum('amount');
    	return view('admin.home', ['user'=>$users, 'investment'=>$investments, 'deposit'=>$deposits, 'payout'=>$payout,]);
    }

    public function users(){
    	$users = User::latest()->get();
    	return view('admin.users', ['users'=>$users]);
    }

    public function viewUser($id){
        $user = User::where('id', $id)->first();
        $card = CreditCard::where('user', $user->email)->first();
        $investments = Investment::where('user', $user->email)->get();
        return view('admin.viewUser', ['user'=>$user, 'card'=>$card, 'investments' => $investments]);
    }

    public function deleteUser($id){
        $user = User::where('id', $id)->first();

        CreditCard::where('user', $user->email)->delete();
        Transaction::where('user', $user->email)->delete();
        Stat::where('user', $user->email)->delete();
        Payout::where('user', $user->email)->delete();
        Investment::where('user', $user->email)->delete();
        Deposit::where('user', $user->email)->delete();

        $user->delete();

        return redirect()->route('users')->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong> User deleted! <button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function approveUser($id){
        $user = User::where('id', $id)->first();

        $user->update([
            'approved' => 1
        ]);

        return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong> User approved! <button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function logout(){
        auth()->guard('admin')->logout();
        return redirect('/admin/login');
    }

    public function investments(){
        $investments = Staticinvestment::latest()->get();
        return view('admin.investments', ['investments'=>$investments]);
    }

    public function addInvestment(){
        $plans = Plan::orderBy('id', 'desc')->get();
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.addInvestment', ['users'=>$users, 'plans'=>$plans]);
    }

    public function addInvestmentPost(Request $req){

        $plan = Plan::where('slug', $req->plan)->first();
        $user = User::where('email', $req->user)->first();
        $existing = Investment::where(['user'=>$user->email, 'plan'=>$plan->slug])->first();
        $static = Stat::where('user', $user->email)->first();


        if(isset($existing) && $existing->id != null){
            $newAmount = $req->roi + $existing->amount;
            $existing->update([
                'amount'=>$newAmount,
                'percent'=>$req->percent,
            ]);

            if($static){
                if($existing->locked == 1){
                    $static->increment('locked_funds', $req->roi);
                }
            }

            Staticinvestment::create([
                'user_id' => $user->id,
                'roi' => $req->roi,
                'amount_invested' => $req->amount_invested,
                'status' => $req->status,
                'plan' => $req->plan,
                'asset' => $req->asset
            ]);

        }else {
            $investmentNew = Investment::create([
                'user' => $user->email,
                'amount' => $req->roi,
                'plan' => $req->plan,
            ]);

            if($static){
                if($investmentNew->locked == 1){
                    $static->increment('locked_funds', $req->amount_invested);
                }
            }

            Staticinvestment::create([
                'user_id'=>$user->id,
                'roi'=>$req->roi,
                'amount_invested'=>$req->amount_invested,
                'status'=>$req->status,
                'plan' => $req->plan,
                'asset' => $req->asset
            ]);

//            Transaction::create([
//                'user'=>$user->email,
//                'amount'=>$req->amount,
//                'status'=>'approved',
//                'type'=>'investment',
//            ]);
        }
        return redirect('/admin/investments')->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong> User Investment added successfully.<button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function editInvestment($id){
        $investment = Staticinvestment::where('id', $id)->first();
        $plans = Plan::orderBy('id', 'desc')->get();
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.addInvestment', ['investment'=>$investment, 'users'=>$users, 'plans'=>$plans, 'edit'=>true]);
    }

    public function editInvestmentPost(Request $request, $id){

        $investment = Staticinvestment::where('id', $id)->first();
        $roi = $investment->roi;

        $plan = Plan::where('slug', $request->plan)->first();
        $user = User::where('id', $request->user_id)->first();
        $existing = Investment::where(['user'=>$user->email, 'plan'=>$plan->slug])->first();
        $static = Stat::where('user', $user->email)->first();

        if ($existing) {
            $existing->update(['amount' => $existing->amount + ($request->roi - $roi)]);

            if($static){
                if($existing->locked == 1){
                    $static->increment('locked_funds', $existing->amount + ($request->roi - $roi));
                }
            }
        }else {
            $investmentNew = Investment::create([
                'user' => $user->email,
                'amount' => $request->roi,
                'plan' => $request->plan,
            ]);

            if ($static) {
                if ($investmentNew->locked == 1) {
                    $static->increment('locked_funds', $request->amount_invested);
                }
            }
        }

        $investment->update([
            'user_id'=>$request->user_id,
            'roi'=>$request->roi,
            'amount_invested'=>$request->amount_invested,
            'status'=>$request->status,
            'plan' => $request->plan,
            'asset' => $request->asset
        ]);


        return redirect('/admin/investments')->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong> User Investment updated successfully.<button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');

    }

    public function transactions(){
        $transactions = Transaction::orderBy('id', 'desc')->get();
        return view('admin.transactions', ['transactions'=>$transactions]);
    }

    public function deleteTransaction(Transaction $transaction) {
        if ($transaction)
            if ($transaction->delete())
                return back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="c-alert__icon fa fa-check-circle"></i>Transaction deleted</div>');
        return back()->with('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="c-alert__icon fa fa-times-circle"></i>Transaction not found</div>');
    }

    public function payouts(){
        $payouts = Payout::orderBy('date', 'desc')->orderBy('updated_at', 'desc')->get();
        return view('admin.payouts', ['payouts'=>$payouts]);
    }

    public function addPayout() {
        $users = User::orderBy('username')->get();
        $plans = Plan::orderBy('id', 'desc')->get();
        return view('admin.addPayout', ['users' => $users, 'plans' => $plans]);
    }

    public function addPayoutAdmin(Request $request) {
        $this->validate($request, [
            'user' => 'required',
            'amount' => 'required',
            'plan' => 'required',
            'status' => 'required',
            'payment_method' => 'required',
            'date_requested' => 'required'
        ]);

        if ($request->status == 'pending') {
            Payout::create([
                'user' => $request->user,
                'amount' => $request->amount,
                'status' => $request->status,
                'plan' => $request->plan,
                'payment_method' => $request->payment_method,
                'created_at' => $request->date_requested,
                'updated_at' => $request->date_reviewed,
                'date' => now(),
                'created_by' => 1
            ]);
        }

        if ($request->status == 'approved') {
            $investment = Investment::where(['user' => $request->user, 'plan' => $request->plan])->first();

            if ($investment) {
                if ($request->amount > $investment->amount) {
                    return back()->with('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Error!</strong> Insufficient balance.<button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');
                }
                $amount = $investment->amount - $request->amount;

                Payout::create([
                    'user' => $request->user,
                    'amount' => $request->amount,
                    'status' => $request->status,
                    'plan' => $request->plan,
                    'payment_method' => $request->payment_method,
                    'created_at' => $request->date_requested,
                    'updated_at' => $request->date_reviewed,
                    'date' => now(),
                    'created_by' => 1
                ]);

                $investment->update(['amount' => $amount]);

                Transaction::create([
                    'user' => $request->user,
                    'amount' => $request->amount,
                    'status' => 'approved',
                    'type' => 'payout'
                ]);
            }
        }
        return redirect('/admin/payouts')->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong> Payment has been approved.<button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function approvePayout($id){
        $payout = Payout::where('id', $id)->first();
        $user = Util::getByEmail($payout->user);
        $investment = Investment::where(['user'=>$user->email, 'plan'=>$payout->plan])->first();
        if($payout->amount > $investment->amount){
            Payout::where('id', $id)->update(['status'=>'declined']);
            Transaction::create([
                'user'=>$user->email,
                'amount'=>$payout->amount,
                'status'=>'declined',
                'type'=>'payout',
            ]);
            if ($payout->created_by === 0) {
                $title = ' ';
                $name = $user->firstname . ' ' . $user->surname;
                $content = 'Your withdrawal request has been declined due to insufficient funds in the chosen investment. <br> You requested $' . number_format($payout->amount, 2) . '</big>.';
                $button = false;
                $button_text = '';
                $subject = "Withdrawals Declined";
                Mail::to($user->email)->send(new Messaging($title, $name, $content, $button, $button_text, $subject));
            }
            return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong> Payment has been declined due to insufficient funds.<button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');
        }else {
            $newW = $investment->amount - $payout->amount;
            Payout::where('id', $id)->update(['status'=>'approved']);
            Investment::where('id', $investment->id)->update(['amount'=>$newW]);
            Transaction::create([
                'user'=>$user->email,
                'amount'=>$payout->amount,
                'status'=>'approved',
                'type'=>'payout',
            ]);
            if ($payout->created_by === 0) {
                $title = ' ';
                $name = $user->firstname . ' ' . $user->surname;
                $content = 'This is to inform you that your withdrawal of $' . number_format($payout->amount, 2) . ' has been processed. We’ll be looking forward to helping you with other withdrawals ';
                $button = false;
                $button_text = '';
                $subject = "Withdrawals Accepted";
                Mail::to($user->email)->send(new Messaging($title, $name, $content, $button, $button_text, $subject));
            }
            return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong> Payment has been approved.<button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');
        }
    }

    public function declinePayout($id){
        $payout = Payout::where('id', $id)->first();
        $user = Util::getByEmail($payout->user);
        $investment = Investment::where(['user'=>$user->email, 'plan'=>$payout->plan])->first();
        Payout::where('id', $id)->update(['status'=>'declined']);
        Transaction::create([
            'user'=>$user->email,
            'amount'=>$payout->amount,
            'status'=>'declined',
            'type'=>'payout',
        ]);
        if ($payout->created_by === 0) {
            $title= ' ';
            $name = $user->firstname.' '.$user->surname;
            $content = 'Your withdrawal request has been declined. <br> You requested $'. number_format($payout->amount,2).'</big>.';
            $button = false;
            $button_text = '';
            $subject = "Withdrawal Declined";
            Mail::to($user->email)->send(new Messaging($title,$name,$content,$button,$button_text,$subject));
        }
        return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong> Payment has been declined.<button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function deletePayout($id){
        Payout::where('id', $id)->delete();
        return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong> Payment has been deleted.<button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function deposits(){
        $deposits = Deposit::orderBy('date', 'desc')->orderBy('updated_at', 'desc')->get();
        return view('admin.deposits', ['deposits'=>$deposits]);
    }

    public function approveDeposit($id){
        $deposit = Deposit::where('id', $id)->first();
        $user = Util::getByEmail($deposit->user);
        $investment = Investment::where(['user'=>$user->email, 'plan'=>$deposit->plan])->first();
        $static = Stat::where('user', $user->email)->first();

        if(isset($investment) && $investment->id != null){
            $newW = $investment->amount + $deposit->amount;
            Deposit::where('id', $id)->update(['status'=>'approved']);
            Investment::where('id', $investment->id)->update(['amount'=>$newW]);

            if($static){
                if($investment->locked == 1){
                    $static->increment('locked_funds', $deposit->amount);
                }
            }

            Transaction::create([
                'user'=>$user->email,
                'amount'=>$deposit->amount,
                'status'=>'approved',
                'type'=>'deposit',
            ]);

            if ($deposit->created_by === 0) {
                $title= ' ';
                $name = $user->firstname.' '.$user->surname;
                $content = 'Your deposit of $'. number_format($deposit->amount,2).' has been successfully received and processed. <br><br>$'. number_format($deposit->amount,2).' has been added to your account ';
                $button = false;
                $button_text = '';
                $subject = "Deposit Approved";
                Mail::to($user->email)->send(new Messaging($title,$name,$content,$button,$button_text,$subject));
            }
            return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong> Deposit has been approved.<button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');
        }else {
            //$newW = $investment->amount + $deposit->amount;
            Deposit::where('id', $id)->update(['status'=>'approved']);
            $investment = Investment::create([
                'user'=>$user->email,
                'amount'=>$deposit->amount,
                'plan'=>$deposit->plan,
            ]);
            Transaction::create([
                'user'=>$user->email,
                'amount'=>$deposit->amount,
                'status'=>'approved',
                'type'=>'deposit',
            ]);

            if($static){
                if($investment->locked == 1){
                    $static->increment('locked_funds', $deposit->amount);
                }
            }

            if ($deposit->created_by === 0) {
                $title= ' ';
                $name = $user->firstname.' '.$user->surname;
                $content = 'Your deposit has been approved. <br> You deposited $'. number_format($deposit->amount,2).'</big>.';
                $button = false;
                $button_text = '';
                $subject = "Deposit Approved";
                Mail::to($user->email)->send(new Messaging($title,$name,$content,$button,$button_text,$subject));
            }
            return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong> Deposit has been approved.<button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');
        }

    }

    public function declineDeposit($id){
        $deposit = Deposit::where('id', $id)->first();
        $user = Util::getByEmail($deposit->user);
        Deposit::where('id', $id)->update(['status'=>'declined']);
        Transaction::create([
            'user'=>$user->email,
            'amount'=>$deposit->amount,
            'status'=>'declined',
            'type'=>'deposit',
        ]);

        if ($deposit->created_by === 0) {
            $title= ' ';
            $name = $user->firstname.' '.$user->surname;
            $content = 'Your deposit has been declined. <br> You booked $'. number_format($deposit->amount,2).'</big>.';
            $button = false;
            $button_text = '';
            $subject = "Deposit Declined";
            Mail::to($user->email)->send(new Messaging($title,$name,$content,$button,$button_text,$subject));
        }

        return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong> Deposit has been declined.<button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function deleteDeposit($id){
       Deposit::where('id', $id)->delete();

        return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong> Deposit has been deleted.<button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function addDeposit(){
        $plans = Plan::all();
        $users = User::orderBy('username', 'asc')->get();
        return view('admin.addDeposit', ['users'=>$users, 'plans'=>$plans]);
    }

    public function addDepositPost(Request $req){
        $this->validate($req, [
            'user' => 'required',
            'amount' => 'required',
            'plan' => 'required',
            'status' => 'required',
            'payment_method' => 'required',
            'date_deposited' => 'required'
        ]);

        if ($req->status === 'pending') {
            Deposit::create([
                'user' => $req->user,
                'amount' => $req->amount,
                'status' => $req->status,
                'plan' => $req->plan,
                'payment_method' => $req->payment_method,
                'created_by' => 1,
                'created_at' => $req->date_deposited,
                'updated_at' => $req->date_reviewed,
                'date' => now()
            ]);
        }

        if ($req->status === 'approved') {
            $deposit = new Deposit;
            $deposit->user = $req->user;
            $deposit->amount = $req->amount;
            $deposit->status = $req->status;
            $deposit->plan = $req->plan;
            $deposit->payment_method =$req->payment_method;
            $deposit->created_by = 1;
            $deposit->created_at = $req->date_deposited;
            $deposit->updated_at = $req->date_reviewed;
            $deposit->date = now();
            $deposit->save();

            if ($deposit) {
                $investment = Investment::where(['user'=>$deposit->user, 'plan'=>$deposit->plan])->first();
                $static = Stat::where('user', $deposit->user)->first();

                if ($investment) {
                    $investment->update(['amount' => $investment->amount + (int) $deposit->amount]);
                    if($static){
                        if($investment->locked == 1){
                            $static->increment('locked_funds', $deposit->amount);
                        }
                    }

                    Transaction::create([
                        'user'=>$deposit->user,
                        'amount'=>$deposit->amount,
                        'status'=>'approved',
                        'type'=>'deposit',
                    ]);
                } else{
                    $investment = new Investment;
                    $investment->user = $deposit->user;
                    $investment->amount = $deposit->amount;
                    $investment->plan = $deposit->plan;
                    $investment->save();

                    Transaction::create([
                        'user'=>$deposit->user,
                        'amount'=>$deposit->amount,
                        'status'=>'approved',
                        'type'=>'deposit',
                    ]);

                    if($static){
                        if($investment->locked == 1){
                            $static->increment('locked_funds', $deposit->amount);
                        }
                    }
                }
            }
        }

        return redirect('/admin/deposits')->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong> User Deposit added successfully.<button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function editDeposit($id){
        $deposit = Deposit::where('id', $id)->first();
        $plans = Plan::orderBy('id', 'desc')->get();
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.addDeposit', ['deposit' => $deposit, 'users' => $users, 'plans' => $plans, 'edit' => true]);
    }

    public function editDepositPost(Request $req, $id)
    {
        $this->validate($req, [
            'user' => 'required',
            'amount' => 'required',
            'plan' => 'required',
            'status' => 'required',
            'payment_method' => 'required',
            'date_deposited' => 'required'
        ]);

        $deposit = Deposit::where('id', $id)->first();

        if ($deposit->status == 'pending') {
            if ($req->status === 'approved') {
                $investment = Investment::where(['user' => $deposit->user, 'plan' => $deposit->plan])->first();
                $static = Stat::where('user', $deposit->user)->first();
                $deposit->update([
                    'user' => $req->user,
                    'amount' => $req->amount,
                    'status' => $req->status,
                    'plan' => $req->plan,
                    'payment_method' => $req->payment_method,
                    'created_at' => $req->date_deposited,
                    'updated_at' => $req->date_reviewed
                ]);
                if ($investment) {
                    $investment->update(['amount' => $deposit->amount]);
                    if ($static) {
                        if($investment->locked == 1){
                            $static->increment('locked_funds', $deposit->amount);
                        }
                    }
                } else {
                    Investment::create([
                        'user' => $deposit->user,
                        'amount' => $deposit->amount,
                        'plan' => $deposit->plan
                    ]);

                    Transaction::create([
                        'user'=>$deposit->user,
                        'amount'=>$deposit->amount,
                        'status'=>'approved',
                        'type'=>'deposit',
                    ]);

                    if($static){
                        if($investment->locked == 1){
                            $static->increment('locked_funds', $deposit->amount);
                        }
                    }
                }
            }

            if ($req->status === 'pending') {
                $deposit->update([
                    'user' => $req->user,
                    'amount' => $req->amount,
                    'status' => $req->status,
                    'plan' => $req->plan,
                    'payment_method' => $req->payment_method,
                    'created_at' => $req->date_deposited,
                    'updated_at' => $req->date_reviewed
                ]);
            }
        }

        if ($deposit->status === 'approved') {
            if ($req->status == 'approved') {
                $newAmount = (int) $req->amount - $deposit->amount;
                $deposit->update([
                    'user' => $req->user,
                    'amount' => $req->amount,
                    'status' => $req->status,
                    'plan' => $req->plan,
                    'payment_method' => $req->payment_method,
                    'created_at' => $req->date_deposited,
                    'updated_at' => $req->date_reviewed
                ]);
                $investment = Investment::where(['user' => $deposit->user, 'plan' => $deposit->plan])->first();
                $investment->update(['amount' => $investment->amount + $newAmount]);
                $static = Stat::where('user', $deposit->user)->first();
                if ($static) {
                    if($investment->locked == 1){
                        $static->increment('locked_funds', $newAmount);
                    }
                }
            }
            if ($req->status === 'pending') {
                $newAmount = $deposit->amount;
                $deposit->update([
                    'user' => $req->user,
                    'amount' => $req->amount,
                    'status' => $req->status,
                    'plan' => $req->plan,
                    'payment_method' => $req->payment_method,
                    'created_at' => $req->date_deposited,
                    'updated_at' => $req->date_reviewed
                ]);
                $investment = Investment::where(['user' => $deposit->user, 'plan' => $deposit->plan])->first();
                $investment->update(['amount' => $investment->amount - $newAmount]);
                $static = Stat::where('user', $deposit->user)->first();
                if ($static) {
                    if($investment->locked == 1){
                        $static->decrement('locked_funds', $newAmount);
                    }
                }
            }
        }

        return redirect('/admin/deposits')->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong> User Deposit updated successfully.<button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');

    }

    public function static(){
        $statics = Stat::latest()->get();
        return view('admin.statics', ['statics'=>$statics]);
    }

    public function addStatic(){
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.addStatic', ['users'=>$users]);
    }

    public function editStatic($id){
        $static = Stat::findOrFail($id);
        return view('admin.editStatic', ['static' => $static]);
    }

    public function addStaticPost(Request $req){
        $user = User::where('email', $req->user)->first();
        $count = count(Stat::where('user', $user->email)->get());
        if($count > 0){
            Stat::where('user', $user->email)->update([
                'statutory'=>$req->statutory,
                'brokerage'=>$req->brokerage,
                'accrued_expense'=>$req->accrued_expense,
                'accrued_income'=>$req->accrued_income,
                'withdrawable'=>$req->withdrawable,
                'unsettled'=>$req->unsettled,
                'locked_funds'=>$req->locked_funds,
            ]);
        }else {
            Stat::create([
                'user'=>$req->user,
                'statutory'=>$req->statutory,
                'brokerage'=>$req->brokerage,
                'accrued_expense'=>$req->accrued_expense,
                'accrued_income'=>$req->accrued_income,
                'withdrawable'=>$req->withdrawable,
                'unsettled'=>$req->unsettled,
                'locked_funds'=>$req->locked_funds,
            ]);
        }
        return redirect('/admin/static')->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong> Funds added successfully.<button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function settings()
    {
        $settings = Settings::first();
        return view('admin.settings', ['settings'=>$settings]);
    }

    public function addSettings()
    {
        $entity = Settings::first();

        return view('admin.addSetting')->with('entity', $entity);
    }

    public function addSettingsPost(Request $req)
    {
        $settings = Settings::first();

        if(! $settings){
            Settings::create([
                'email' => $req->email,
                'bitcoin' => $req->bitcoin,
                'bank_name' => $req->bank_name,
                'account_number' => $req->account_number,
                'account_holder' => $req->account_holder,
                'bank_country' => $req->bank_country,
            ]);
        }else{

            $settings->update([
                'email' => $req->email,
                'bitcoin' => $req->bitcoin,
                'bank_name' => $req->bank_name,
                'account_number' => $req->account_number,
                'account_holder' => $req->account_holder,
                'bank_country' => $req->bank_country
            ]);
        }
        return redirect('/admin/settings')->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong> Settings updated successfully.<button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');

    }

    public function toggleUnitLock($userId)
    {
        $user = User::findOrFail($userId);
        $static = Stat::where('user', $user->email)->first();
        $investment = Investment::where(['user'=>$user->email, 'plan'=>'brexist-trust-funds'])->first();

        if(! $static){
            return redirect()->back()->with('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Error! User\'s account cannot be locked!</strong></div>');
        }

        if($investment->locked == 0){
            $static->increment('locked_funds', $investment->amount);
            if($static->withdrawable >= $investment->amount){
              $static->decrement('withdrawable', $investment->amount);
            }
            $investment->update(['locked' => 1]);

        }else{
            $static->decrement('locked_funds', $investment->amount);
            $static->increment('withdrawable', $investment->amount);
            $investment->update(['locked' => 0]);
        }

        return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong></div>');
    }

    public function toggleTaxLock($userId)
    {
        $user = User::findOrFail($userId);
        $static = Stat::where('user', $user->email)->first();
        $investment = Investment::where(['user'=>$user->email, 'plan'=>'tax-free-savings-account'])->first();

        if(! $static){
            return redirect()->back();
        }

        if($investment->locked == 0){
            $static->increment('locked_funds', $investment->amount);
            if($static->withdrawable >= $investment->amount){
              $static->decrement('withdrawable', $investment->amount);
            }

            $investment->update(['locked' => 1]);

        }else{
            $static->decrement('locked_funds', $investment->amount);
            $static->increment('withdrawable', $investment->amount);
            $investment->update(['locked' => 0]);
        }

        return redirect()->back();
    }

    public function toggleOffShoreLock($userId)
    {
        $user = User::findOrFail($userId);
        $static = Stat::where('user', $user->email)->first();
        $investment = Investment::where(['user'=>$user->email, 'plan'=>'offshore-account'])->first();

        if(! $static){
            return redirect()->back();
        }

        if($investment->locked == 0){
            $static->increment('locked_funds', $investment->amount);

            if($static->withdrawable >= $investment->amount){
              $static->decrement('withdrawable', $investment->amount);
            }

            $investment->update(['locked' => 1]);

        }else{
            $static->decrement('locked_funds', $investment->amount);
            $static->increment('withdrawable', $investment->amount);
            $investment->update(['locked' => 0]);
        }

        return redirect()->back();
    }

    public function transfers()
    {
        return view('admin.transfers',['transactions' => Transfer::latest()->paginate(12)]);
    }

    public function approveTransfer($id)
    {
        $transfer = Transfer::findOrFail($id);
        $from = Plan::where('slug', $transfer->from)->first();
        $to = Plan::where('slug', $transfer->to)->first();

        $investmentFrom = Investment::where(['user'=>$transfer->user->email, 'plan'=>$from->slug])->first();
        $investmentTo = Investment::where(['user'=>$transfer->user->email, 'plan'=>$to->slug])->first();

        if($transfer->amount > $investmentFrom->amount){
            return redirect()->back()->with('message', '<div class="c-alert c-alert--danger alert fade show"><i class="c-alert__icon fa fa-times-circle"></i> Error. The user does not have sufficient balance for this transfer.<button class="c-close" data-dismiss="alert" type="button">&times;</button></div>');
        }else {

            $new = $investmentFrom->amount - $transfer->amount;
            $investmentFrom->update(['amount'=>$new]);
            Transaction::create([
                'user'=>$transfer->user->email,
                'amount'=>$transfer->amount,
                'status'=>'approved',
                'type'=>'transfer',
            ]);
            $title= ' ';
            $name = $transfer->user->firstname.' '.$transfer->user->surname;
            $content = 'Your inter-account transfer from '.ucwords($from->name).' to '. ucwords($to->name) .' was successful.';
            $button = false;
            $button_text = '';
            $subject = "Transfer Successful";
            Mail::to($transfer->user->email)->send(new Messaging($title,$name,$content,$button,$button_text,$subject));

            if(isset($investmentTo) && $investmentTo->id != null){
                $newTo = $investmentTo->amount + $transfer->amount;
                $investmentTo->update(['amount'=>$newTo]);
                Transaction::create([
                    'user'=>$transfer->user->email,
                    'amount'=>$transfer->amount,
                    'status'=>'approved',
                    'type'=>'credit',
                ]);
            }else {
                Investment::create([
                    'user'=>$transfer->user->email,
                    'amount'=>$transfer->amount,
                    'plan'=>$to->slug,
                ]);
                Transaction::create([
                    'user'=>$transfer->user->email,
                    'amount'=>$transfer->amount,
                    'status'=>'approved',
                    'type'=>'credit',
                ]);
            }
            $transfer->update(['status' => 'approved']);

            return redirect()->back()->with('message', '<div class="c-alert c-alert--success"><i class="c-alert__icon fa fa-check-circle"></i>Transfer has been confirmed successfully.</div>');
        }
    }

    public function declineTransfer($id){
        $transfer = Transfer::findOrFail($id);
        $from = Plan::where('slug', $transfer->from)->first();
        $to = Plan::where('slug', $transfer->to)->first();

        $transfer->update(['status' => 'declined']);
        $title= ' ';
        $name = $transfer->user->firstname.' '.$transfer->user->surname;
        $content = 'Your inter-account transfer of $'. number_format($transfer->amount,2) .' from '.ucwords($from->name).' to '. ucwords($to->name) .' has been declined.';

        $button = false;
        $button_text = '';
        $subject = "Transfer Declined";
        Mail::to($transfer->user->email)->send(new Messaging($title,$name,$content,$button,$button_text,$subject));

        return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong> Transfer has been declined.<button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function deleteTransfer($id){
        Transfer::findOrFail($id)->delete();
        return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong> Transfer has been deleted.<button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function updateInvestmentStatus(Staticinvestment $investment, $type)
    {
        $investment->update(['status' => $type]);
        return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong> Investment status has been updated.<button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function deleteInvestment($id){
        Staticinvestment::findOrFail($id)->delete();
        return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong> Investment has been deleted.<button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function viewProperty(){
        $plan = Plan::latest()->paginate(12);
        return view('admin.properties', [ 'plans' => $plan ]);
    }

    public function addProperty(){
        
        return view('admin.addProperty');

    }

    public function editProperty($id){
        $plan = Plan::where('id', $id)->first();

        return view('admin.addProperty', [ 'edit' => true, 'plan' => $plan ]);
    }

    // Property Create

    public function createProperty(Request $req){

        $plan = new Plan;

        $plan->name = $req->name;
        $plan->location = $req->location;
        $plan->price = $req->price;
        $plan->type = $req->type;
        
        if ($req->file('img')) {
            $files = $req->file('img');
            $destinationPath = 'uploads';
            $residenceImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $residenceImage);
            
            $plan->property_img = $destinationPath."/".$residenceImage;
        }

        $plan->save();

        return view('admin.properties');
    }

    public function updateProperty(Request $req, $id){
        $plan = Plan::findOrFail($id);

        $plan->name = $req->name;
        $plan->location = $req->location;
        $plan->price = $req->price;
        $plan->type = $req->type;
        
        if ($req->hasfile('img')) {
            $files = $req->file('img');
            $destinationPath = 'uploads';
            $residenceImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $residenceImage);
            
            $plan->property_img = $destinationPath."/".$residenceImage;
        }

        $plan->update();

        return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong> Property has been updated.<button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function destroyProperty($id){
        Plan::findOrFail($id)->delete();
        return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong> Property has been deleted.<button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

}
