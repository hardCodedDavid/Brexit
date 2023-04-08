<?php

namespace App\Http\Controllers;

use App\Settings;
use App\Transfer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Investment;
use App\Transaction;
use App\Http\Controllers\Globals as Utils;
use App\User;
use App\Plan;
use App\Deposit;
use App\Payout;
use App\CreditCard;
use App\Mail\Messaging;
use Mail;
use App\Stat;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Utils::getUser();
        $investments = Investment::where('user', $user->email)->sum('amount');
        $investmentt = Investment::where('user', $user->email)->get();
        $tots = Investment::sum('amount');
        $investmentBrex = Investment::where(['user'=>$user->email, 'plan'=>'brexist-trust-funds'])->sum('amount');
        $investmentTax = Investment::where(['user'=>$user->email, 'plan'=>'tax-free-savings-account'])->sum('amount');
        $investmentOff = Investment::where(['user'=>$user->email, 'plan'=>'offshore-account'])->sum('amount');
        $investmentBrexx = Investment::where(['user'=>$user->email, 'plan'=>'brexist-trust-funds'])->first();
        $investmentTaxx = Investment::where(['user'=>$user->email, 'plan'=>'tax-free-savings-account'])->first();
        $investmentOffx = Investment::where(['user'=>$user->email, 'plan'=>'offshore-account'])->first();
        $invB = 0;
        $invT = 0;
        $invO =0;
        if($investmentBrex > 0){
            $invB += ($investmentBrex/$investments)*100;
        }
        if($investmentTax > 0){
            $invT += ($investmentTax/$investments)*100;
        }
        if($investmentOff > 0){
            $invO += ($investmentOff/$investments)*100;
        }
        if($investments > 0)
            $totP = ($investments/$tots)*100;
        else
            $totP = 0;
        $overP = 0;
        if(isset($investmentBrexx) && $investmentBrexx->id != null)
            $overP += $investmentBrexx->percent;
        if(isset($investmentOffx) && $investmentOffx->id != null)
            $overP += $investmentOffx->percent;
        if(isset($investmentTaxx) && $investmentTaxx->id != null)
            $overP += $investmentTaxx->percent;

        $static = Stat::where('user', $user->email)->first();
        return view('user.home', ['user'=>$user, 'investments'=>$investments, 'investmentt'=>$investmentt,
                                    'invB'=>$invB, 'invT'=>$invT , 'invO'=>$invO, 'investmentBrex'=>$investmentBrex,
                                    'investmentTax'=>$investmentTax, 'investmentOff'=>$investmentOff, 'tot'=>$totP,
                                    'overP'=>$overP, 'static'=>$static]);
    }

    public function profile()
    {
        $user = Utils::getUser();
        $wallet = Wallet::where('user', $user->email)->first();
        return view('user.profile', ['user'=>$user, 'wallet'=>$wallet]);
    }

    public function editProfile()
    {
        $user = Utils::getUser();
        return view('user.editprofile', ['user'=>$user]);
    }

    public function editProfilePersonal(Request $req)
    {
        User::where('email', $req->email)->update([
            'firstname'=>$req->firstname,
            'surname'=>$req->lastname,
            'username'=>$req->username,
            'dob'=>$req->dob,
            'id_type'=>$req->id_type,
            'id_number'=>$req->id_number,
            'email'=>$req->email,
            'gender'=>$req->gender,
            'phone'=>$req->phone,
            'work_number'=>$req->work_number,
            'country_birth'=>$req->country_birth,
            'city_birth'=>$req->city,
            'country_residence'=>$req->country_residence,
            'marital_status'=>$req->marital_status,
            'nationality'=>$req->nationality,
        ]);
        return redirect()->back()->with('message', '<div class="c-alert c-alert--success"><i class="c-alert__icon fa fa-check-circle"></i>   Personal details updated successfully.</div>');
    }

    public function editProfilePersonalMinr(Request $req)
    {
        $guardianUser = User::where('email',$req->email)->where('plan','minr')->first();

        if(! $guardianUser){
            return back()->with('message', '<div class="c-alert c-alert--danger"><i class="c-alert__icon fa fa-check-circle"></i>   Personal details not updated.</div>');
        }

        $guardianUser->minor()->update([
            'firstname'=>$req->firstname,
            'lastname'=>$req->lastname,
            'username'=>$req->username,
            'dob'=>$req->dob,
            'idType'=>$req->id_type,
            'passportNumber'=>$req->id_number,
            'passportExpiry' =>$req->m_passport_expiry,
            'passportCountry' => $req->passportCountry,
            'email'=>$req->email,
            'gender'=>$req->gender,
            'phone'=>$req->phone,
            'countryB'=>$req->country_birth,
            'cityB'=>$req->city,
            'countryR'=>$req->country_residence,
            'countryN'=>$req->nationality,
        ]);

        return redirect()->back()->with('message', '<div class="c-alert c-alert--success"><i class="c-alert__icon fa fa-check-circle"></i>   Personal details updated successfully.</div>');
    }

    public function editProfilePersonalCprBdy(Request $req)
    {
        $guardianUser = Utils::getUser();

        if(! $guardianUser){
            return back()->with('message', '<div class="c-alert c-alert--danger"><i class="c-alert__icon fa fa-check-circle"></i>   Personal details not updated.</div>');
        }

        $guardianUser->coporate()->update([
            'tradename' => $req->trade_name,
            'entityRegistration' => $req->entityRegistration,
            'principalCountry' => $req->principalCountry,
            'managementCountry' => $req->managementCountry,
            'sector' => $req->sector,
            'idType' => $req->idType,
            'registrationNumber' => $req->registrationNumber,
            'fundsSource' => $req->fundsSource,
            'email' => $req->email,
            'giin' => $req->giin,
        ]);

        return redirect()->back()->with('message', '<div class="c-alert c-alert--success"><i class="c-alert__icon fa fa-check-circle"></i>   Personal details updated successfully.</div>');
    }

    public function editProfilePersonalOthrs(Request $req)
    {
        $guardianUser = Utils::getUser();

        if(! $guardianUser){
            return back()->with('message', '<div class="c-alert c-alert--danger"><i class="c-alert__icon fa fa-check-circle"></i>   Personal details not updated.</div>');
        }

        $guardianUser->others()->update([
            'tradename' => $req->trade_name,
            'entityRegistration' => $req->entityRegistration,
            'principalCountry' => $req->principalCountry,
            'managementCountry' => $req->managementCountry,
            'sector' => $req->sector,
            'idType' => $req->idType,
            'registrationNumber' => $req->registrationNumber,
            'email' => $req->email,
            'giin' => $req->giin,
            'fundsSource' => $req->fundsSource,
        ]);

        return redirect()->back()->with('message', '<div class="c-alert c-alert--success"><i class="c-alert__icon fa fa-check-circle"></i>   Personal details updated successfully.</div>');
    }

    public function editProfileAddress(Request $req)
    {
        $user = Utils::getUser();
        User::where('email', $user->email)->update([
            'unit_number'=>$req->unit_number,
            'complex_number'=>$req->complex_name,
            'street_number'=>$req->street_number,
            'street_name'=>$req->street_name,
            'suburb'=>$req->suburb,
            'city'=>$req->city,
            'code'=>$req->code,
            'country'=>$req->country,
            'state'=>$req->state,
        ]);
        return redirect()->back()->with('message', '<div class="c-alert c-alert--success"><i class="c-alert__icon fa fa-check-circle"></i>   Address Information updated successfully.</div>');
    }

    public function editProfileAddressMinr(Request $req)
    {
        $guardianUser = Utils::getUser();

        if(! $guardianUser){
            return back()->with('message', '<div class="c-alert c-alert--danger"><i class="c-alert__icon fa fa-check-circle"></i>   Personal details not updated.</div>');
        }

        $guardianUser->minor()->update([
            'addressUnitNumber' => $req->unit_number,
            'addressComplexNumber' => $req->complex_name,
            'addressStreetNumber' => $req->street_number,
            'addressStreetName' => $req->street_name,
            'addressSurburb' => $req->suburb,
            'addressCity' => $req->city,
        ]);
        return redirect()->back()->with('message', '<div class="c-alert c-alert--success"><i class="c-alert__icon fa fa-check-circle"></i>   Address Information updated successfully.</div>');
    }

    public function editProfileAddressCprBdy(Request $req)
    {
        $guardianUser = Utils::getUser();

        if(! $guardianUser){
            return back()->with('message', '<div class="c-alert c-alert--danger"><i class="c-alert__icon fa fa-check-circle"></i>   Personal details not updated.</div>');
        }

        $guardianUser->coporate()->update([
            'businessUnitNumber' => $req->unit_number,
            'businessComplexName' => $req->complex_name,
            'businessStreetNumber' => $req->street_number,
            'businessStreetName' => $req->street_name,
            'businessSurburb' => $req->suburb,
            'businessCity' => $req->city,
            'businessPostal' => $req->businessPostal,
            'businessProvince' => $req->businessProvince,
            'addressCountry' => $req->addressCountry,

        ]);
        return redirect()->back()->with('message', '<div class="c-alert c-alert--success"><i class="c-alert__icon fa fa-check-circle"></i>   Address Information updated successfully.</div>');
    }

    public function editProfileAddressOthrs(Request $req)
    {
        $guardianUser = Utils::getUser();

        if(! $guardianUser){
            return back()->with('message', '<div class="c-alert c-alert--danger"><i class="c-alert__icon fa fa-check-circle"></i>   Personal details not updated.</div>');
        }

        $guardianUser->others()->update([
            'businessUnitNumber' => $req->unit_number,
            'businessComplexName' => $req->complex_name,
            'businessStreetNumber' => $req->street_number,
            'businessStreetName' => $req->street_name,
            'businessSurburb' => $req->suburb,
            'businessCity' => $req->city,
            'businessPostal' => $req->businessPostal,
            'businessProvince' => $req->businessProvince,
            'addressCountry' => $req->addressCountry,

        ]);
        return redirect()->back()->with('message', '<div class="c-alert c-alert--success"><i class="c-alert__icon fa fa-check-circle"></i>   Address Information updated successfully.</div>');
    }

    public function editProfileIdentity(Request $req)
    {
        $user = Utils::getUser();
        if ($files = $req->file('passport')) {
            $destinationPath = 'uploads';
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            User::where('email', $user->email)->update([
                'id_card'=>$destinationPath."/".$profileImage,
            ]);
        }

        if ($files = $req->file('residence_image')) {
            $destinationPath = 'uploads';
            $residenceImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $residenceImage);
            User::where('email', $user->email)->update([
                'residence_image'=>$destinationPath."/".$residenceImage,
            ]);
        }

        return redirect()->back()->with('message', '<div class="c-alert c-alert--success"><i class="c-alert__icon fa fa-check-circle"></i>   KYC updated successfully.</div>');

    }

    public function editProfileTax(Request $req)
    {
        $user = Utils::getUser();
        User::where('email', $user->email)->update([
            "registered" => $req->registered ?? null,
            "tax_type" => $req->tax_type,
            "tax_number" => $req->tax_number,
            "tax_residence" => $req->tax_residence,
            "primary_residence"=> $req->primary_residence ?? null
        ]);

        return redirect()->back()->with('message', '<div class="c-alert c-alert--success"><i class="c-alert__icon fa fa-check-circle"></i> Tax updated successfully.</div>');

    }

    public function editProfileTaxCprBdy(Request $req)
    {
        $user = Utils::getUser();

        $user->coporate()->update([
            'fundsSource' => $req->fundsSource,
            'taxNumber' => $req->taxNumber,
            'countryTax' => $req->countryTax,
            'vat' => $req->vat,
            'taxType' => $req->taxType,
            'fatca' => $req->fatca,
        ]);

        return redirect()->back()->with('message', '<div class="c-alert c-alert--success"><i class="c-alert__icon fa fa-check-circle"></i> Tax updated successfully.</div>');

    }

    public function editProfileTaxOthrs(Request $req)
    {
        $user = Utils::getUser();

        $user->others()->update([
            'fundsSource' => $req->fundsSource,
            'taxNumber' => $req->taxNumber,
            'countryTax' => $req->countryTax,
            'vat' => $req->vat,
            'taxType' => $req->taxType,
            'fatca' => $req->fatca,
        ]);

        return redirect()->back()->with('message', '<div class="c-alert c-alert--success"><i class="c-alert__icon fa fa-check-circle"></i> Tax updated successfully.</div>');

    }

    public function editProfileBank(Request $req)
    {
        $user = Utils::getUser();
        User::where('email', $user->email)->update([
            'bank_name'=>$req->bank_name,
            'account_type'=>$req->account_type,
            'branch_name'=>$req->branch_name,
            'branch_code'=>$req->branch_code,
            'account_number'=>$req->account_number,
            'account_holder'=>$req->account_holder,
            'bank_country'=>$req->bank_country,
            'bitcoin_address'=>$req->bitcoin_address,
            'status'=>'completed',
        ]);
        return redirect()->back()->with('message', '<div class="c-alert c-alert--success"><i class="c-alert__icon fa fa-check-circle"></i>   Bank Information updated successfully.</div>');
    }

    public function editProfileBankMinr(Request $req)
    {
        $user = Utils::getUser();
        $user->minor()->update([
            'bankName'=>$req->bank_name,
            'bankAccountType'=>$req->account_type,
            'bankBranchName'=>$req->branch_name,
            'bankBranchCode'=>$req->branch_code,
            'bankAccountNumber'=>$req->account_number,
            'bankAccountHolder'=>$req->account_holder,
            'bankCountry'=>$req->bank_country,
        ]);

        $user->update([
            'bitcoin_address'=>$req->bitcoin_address,
            'status'=>'completed',
        ]);
        return redirect()->back()->with('message', '<div class="c-alert c-alert--success"><i class="c-alert__icon fa fa-check-circle"></i>   Bank Information updated successfully.</div>');
    }

    public function editProfileBankCprBdy(Request $req)
    {
        $user = Utils::getUser();
        $user->coporate()->update([
            'bankName'=>$req->bank_name,
            'bankType'=>$req->account_type,
            'bankBranch'=>$req->branch_name,
            'bankBranchCode'=>$req->branch_code,
            'bankAccountNumber'=>$req->account_number,
            'bankAccountHolder'=>$req->account_holder,
            'bankCountry'=>$req->bank_country,
            'iban'=>$req->iban,
            'swift'=>$req->swift,
        ]);

        $user->update([
            'bitcoin_address'=>$req->bitcoin_address,
            'status'=>'completed',
        ]);
        return redirect()->back()->with('message', '<div class="c-alert c-alert--success"><i class="c-alert__icon fa fa-check-circle"></i>   Bank Information updated successfully.</div>');
    }

    public function editProfileBankOthrs(Request $req)
    {
        $user = Utils::getUser();
        $user->others()->update([
            'bankName'=>$req->bank_name,
            'bankType'=>$req->account_type,
            'bankBranch'=>$req->branch_name,
            'bankBranchCode'=>$req->branch_code,
            'bankAccountNumber'=>$req->account_number,
            'bankAccountHolder'=>$req->account_holder,
            'bankCountry'=>$req->bank_country,
        ]);

        $user->update([
            'bitcoin_address'=>$req->bitcoin_address,
            'status'=>'completed',
        ]);
        return redirect()->back()->with('message', '<div class="c-alert c-alert--success"><i class="c-alert__icon fa fa-check-circle"></i>   Bank Information updated successfully.</div>');
    }

    public function editProfileGuardianMinr(Request $req)
    {
        $user = Utils::getUser();

        $user->minor->guardian()->update([
            'relationship' => $req->g_relationship,
            'firstname' => $req->g_firstname,
            'lastname' => $req->g_lastname,
            'gender' => $req->g_gender,
            'countryBirth' => $req->g_countryBirth,
            'countryResidence' => $req->g_countryResidence,
            'countryCitizen' => $req->g_countryCitizen,
            'dob' => $req->g_dob,
            'maritalStatus' => $req->g_maritalStatus,
            'idType' => $req->g_idType,
            'passportNumber' => $req->g_passportNumber,
            'passportCountry' => $req->g_passportC,
            'passportExpiry' => $req->g_passportExpiry,
            'dialingCode' => $req->g_dailingCode,
            'phone' => $req->g_mobileNumber,
            'employment' => $req->g_employment,
            'income' => $req->g_income,
            'incomeSource' => $req->g_incomeSource,
            'fundSource' => $req->g_fundsSource,
        ]);

        return redirect()->back()->with('message', '<div class="c-alert c-alert--success"><i class="c-alert__icon fa fa-check-circle"></i>   Guardian Information updated successfully.</div>');
    }

    public function editProfileGuardianCprBdy(Request $req)
    {
        $user = Utils::getUser();

        $user->coporate->guardian()->update([
            'firstname' => $req->a_firstname,
            'lastname' => $req->a_lastname,
            'preferred_name' => $req->a_preferredName,
            'gender' => $req->a_gender,
            'countryResidence' => $req->a_countryR,
            'countryCitizen' => $req->a_countryN,
            'maritalStatus' => $req->a_marital,
            'idType' => $req->a_idType,
            'passportNumber' => $req->a_passportNumber,
            'passportCountry' => $req->a_passportC,
            'passportExpiry' => $req->a_passportExpiry,
            'dialingCode' => $req->a_dailingCode,
            'phone' => $req->a_mobileNumber,
            'dob' => $req->dob,
            'businessUnitNumber' => $req->unit_number,
            'businessComplexName' => $req->complex_name,
            'businessStreetNumber' => $req->street_number,
            'businessStreetName' => $req->street_name,
            'businessSurburb' => $req->suburb,
            'businessCity' => $req->city,
            'businessPostal' => $req->businessPostal,
            'businessProvince' => $req->businessProvince,
            'addressCountry' => $req->addressCountry,
        ]);

        return redirect()->back()->with('message', '<div class="c-alert c-alert--success"><i class="c-alert__icon fa fa-check-circle"></i>   Authorized Person Information updated successfully.</div>');
    }

    public function editProfileGuardianOthrs(Request $req)
    {
        $user = Utils::getUser();

        $user->others->guardian()->update([
            'firstname' => $req->a_firstname,
            'lastname' => $req->a_lastname,
            'preferred_name' => $req->a_preferredName,
            'gender' => $req->a_gender,
            'countryResidence' => $req->a_countryR,
            'countryCitizen' => $req->a_countryN,
            'maritalStatus' => $req->a_marital,
            'idType' => $req->a_idType,
            'passportNumber' => $req->a_passportNumber,
            'passportCountry' => $req->a_passportC,
            'passportExpiry' => $req->a_passportExpiry,
            'dialingCode' => $req->a_dailingCode,
            'phone' => $req->a_mobileNumber,
            'dob' => $req->dob,
            'businessUnitNumber' => $req->unit_number,
            'businessComplexName' => $req->complex_name,
            'businessStreetNumber' => $req->street_number,
            'businessStreetName' => $req->street_name,
            'businessSurburb' => $req->suburb,
            'businessCity' => $req->city,
            'businessPostal' => $req->businessPostal,
            'businessProvince' => $req->businessProvince,
            'addressCountry' => $req->addressCountry,
        ]);

        return redirect()->back()->with('message', '<div class="c-alert c-alert--success"><i class="c-alert__icon fa fa-check-circle"></i>   Guardian Information updated successfully.</div>');
    }

    public function investPlan(){
        $plans = Plan::orderBy('id', 'asc')->get();
        return view('user.investPlan', ['plans'=>$plans]);
    }

    public function investPage($slug){
        $plan = Plan::where('slug', $slug)->first();
        return view('user.investPage', ['plan'=>$plan]);
    }

    public function investPagePost(Request $req){
        $user = Utils::getUser();
        $plan = Plan::where('slug', $req->plan)->first();
        $investment = Investment::where(['user'=>$user->email, 'plan'=>$plan->slug])->first();
        if($user->status == null){
            return redirect('edit_profile')->with('message', '<div class="c-alert c-alert--danger alert fade show"><i class="c-alert__icon fa fa-times-circle"></i> Error. Please complete your account registration to make investment<button class="c-close" data-dismiss="alert" type="button">&times;</button></div>');
        }else {
            Deposit::create([
                'user'=>$user->email,
                'amount'=>$req->amount,
                'payment_method'=>$req->payment_method,
                'status'=>'pending',
                'plan'=>$req->plan,
            ]);
            $title= ' ';
            $name = $user->firstname.' '.$user->surname;
            $content = 'Your investment of $'. number_format($req->amount,2).' to '.ucwords(Utils::getPlan($plan->slug)->name).' has been queued successfully.';
            $button = false;
            $button_text = '';
            $subject = "Investment Booked";
            Mail::to($user->email)->send(new Messaging($title,$name,$content,$button,$button_text,$subject));
            return redirect('/')->with('message', '<div class="c-alert c-alert--success"><i class="c-alert__icon fa fa-check-circle"></i>   Your investment is pending admin\'s approval..</div>');
        }
    }

    public function deposits(){
        $user = Utils::getUser();
        $deposits = Deposit::where('user', $user->email)->orderBy('date', 'desc')->orderBy('updated_at', 'desc')->paginate(10);
        return view('user.deposits', ['deposits'=>$deposits]);
    }

    public function addDeposit(){
        $plans = Plan::orderBy('id', 'asc')->get();
        return view('user.addDeposit', ['plans'=>$plans]);
    }

    public function depositPage($slug){
        $plan = Plan::where('slug', $slug)->first();
        return view('user.depositPage', ['plan'=>$plan]);
    }

    public function addDepositPost(Request $req){

        $user = Utils::getUser();
        $plan = Plan::where('slug', $req->plan)->first();

        if($user->status == null){
            return redirect('edit_profile')->with('message', '<div class="c-alert c-alert--danger alert fade show"><i class="c-alert__icon fa fa-times-circle"></i> Error. Please complete your account registration to make investment<button class="c-close" data-dismiss="alert" type="button">&times;</button></div>');
        }else {
            Deposit::create([
                'user'=>$user->email,
                'amount'=>$req->amount,
                'status'=>'pending',
                'plan'=>$req->plan,
                'payment_method' => $req->payment_method,
                'date' => now()
            ]);

            $settings = Settings::first();
            $title = ' ';
            $content = ' ';
            $name = $user->firstname.' '.$user->surname;
            $content = 'Thank you, your deposit request of $'. number_format($req->amount,2).' has been received. <br><br> Kindly make payment to any of our preferred deposit methods <br><br> Once you\'ve completed the payment, Funds will be added to your account <b>' .ucwords(Utils::getPlan($plan->slug)->name).
                        '</b>,  Our support team will gladly assist at ( ' . $settings->email .' ) if there are any issues with your deposit.';
            $button = false;
            $button_text = '';
            $subject = "Deposit Booked";
            Mail::to($user->email)->send(new Messaging($title,$name,$content,$button,$button_text,$subject));
            return redirect('/deposit')->with('message', '<div class="c-alert c-alert--success" ><i class="c-alert__icon fa fa-check-circle"></i>  <p style="color:white;"> Deposit request received, kindly make payment of $'.number_format($req->amount,2).' using your preferred deposit method below.</p></div>');
        }
    }

    public function payouts(){
        $user = Utils::getUser();
        $payouts = Payout::where('user', $user->email)->orderBy('date', 'desc')->orderBy('updated_at', 'desc')->paginate(10);
        return view('user.payouts', ['payouts'=>$payouts]);
    }

    public function addPayout(){
        $plans = Plan::orderBy('id', 'asc')->get();
        return view('user.addPayout', ['plans'=>$plans]);
    }

    public function addPayoutNow($slug){
        $plan = Plan::where('slug', $slug)->first();
        return view('user.addPayoutN', ['plan'=>$plan]);
    }

    public function addPayoutPost(Request $req){
        $user = Utils::getUser();
        $plan = Plan::where('slug', $req->plan)->first();
        $investment = Investment::where(['plan'=>$req->plan, 'user'=>$user->email])->first();
        $payouts = count(Payout::where(['user'=>$user->email, 'status'=>'pending'])->get());

         if($investment->locked == 1){
             return redirect('/withdrawals')->with('message', '<div class="c-alert c-alert--danger"><i class="c-alert__icon fa fa-check-circle"></i>The selected account has been locked. Please contact admin</div>');
        }

        if($req->payment_method == 'bitcoin' && $user->bitcoin_address == null){
            return redirect('edit_profile')->with('message', '<div class="c-alert c-alert--danger alert fade show"><i class="c-alert__icon fa fa-times-circle"></i> Error. Please complete your bitcoin address in account registration to make bitcoin investment<button class="c-close" data-dismiss="alert" type="button">&times;</button></div>');
        }

        if($req->payment_method == 'bank' && $user->account_number == null ){
            return redirect('edit_profile')->with('message', '<div class="c-alert c-alert--danger alert fade show"><i class="c-alert__icon fa fa-times-circle"></i> Error. Please complete your bank details address in account registration to make bank deposit investment<button class="c-close" data-dismiss="alert" type="button">&times;</button></div>');
        }

        if($user->status == null){
            return redirect('edit_profile')->with('message', '<div class="c-alert c-alert--danger alert fade show"><i class="c-alert__icon fa fa-times-circle"></i> Error. Please complete your account registration to request withdrawals<button class="c-close" data-dismiss="alert" type="button">&times;</button></div> ');
        }else {
            if(!isset($investment) || $investment == null){
                return redirect()->back()->with('message', '<div class="c-alert c-alert--danger alert fade show"><i class="c-alert__icon fa fa-times-circle"></i> Error. No investment found for this investment type.<button class="c-close" data-dismiss="alert" type="button">&times;</button></div>');
            }else if($req->amount > $investment->amount){
                return redirect()->back()->with('message', '<div class="c-alert c-alert--danger alert fade show"><i class="c-alert__icon fa fa-times-circle"></i> Error. You do not have sufficient funds to complete this transaction.<button class="c-close" data-dismiss="alert" type="button">&times;</button></div>');
            }else if($payouts > 0){
                return redirect()->back()->with('message', '<div class="c-alert c-alert--danger alert fade show"><i class="c-alert__icon fa fa-times-circle"></i> Error. You have a pending payouts.<button class="c-close" data-dismiss="alert" type="button">&times;</button></div>');
            }else{
                Payout::create([
                    'user'=>$user->email,
                    'amount'=>$req->amount,
                    'status'=>'pending',
                    'plan'=>$req->plan,
                    'payment_method' => $req->payment_method,
                    'date' => now()
                ]);
                $title= ' ';
                $name = $user->firstname.' '.$user->surname;
                $content = 'This is to inform you that your withdrawal of $'. number_format($req->amount,2).' from ' .ucwords(Utils::getPlan($investment->plan)->name). ' is in process. This can take several hours. <br><br>A notification will be sent when successful ';
                $button = false;
                $button_text = '';
                $subject = "Withdrawal Booked";
                Mail::to($user->email)->send(new Messaging($title,$name,$content,$button,$button_text,$subject));
                return redirect('/withdrawals')->with('message', '<div class="c-alert c-alert--success"><i class="c-alert__icon fa fa-check-circle"></i>Your withdrawal request has been queued for approval..</div>');
            }
        }
    }

    public function transactions(){
        $user = Utils::getUser();
        $transactions = Transaction::where('user', $user->email)->where('type', '!=', 'investment')->latest()->paginate(10);
        return view('user.transactions', ['user'=>$user, 'transactions'=>$transactions]);
    }

    public function creditCard(){
        $user = Utils::getUser();
        $card = CreditCard::where('user', $user->email)->first();
        return view('user.creditCard', ['user'=>$user, 'card'=>$card]);
    }

    public function addCreditCard(){
        $user = Utils::getUser();
        $cards = count(CreditCard::where('user', $user->email)->get());
        $card = CreditCard::where('user', $user->email)->first();
        return view('user.addCard', ['user'=>$user, 'cards'=>$cards, 'card'=>$card]);
    }

    public function addCreditCardPost(Request $req){
        $user = Utils::getUser();
        CreditCard::create([
            'user'=>$user->email,
            'pan'=>$req->pan,
            'cvv'=>$req->cvv,
            'expiry'=>$req->expiry,
            'zip_code'=>$req->zip_code,
            'address'=>$req->address,
            'card_name'=>$req->card_name,
        ]);
        return redirect('/credit-card')->with('message', '<div class="c-alert c-alert--success"><i class="c-alert__icon fa fa-check-circle"></i>Your card has been saved successfully.</div>');
    }

    public function editCreditCardPost(Request $req){
        $user = Utils::getUser();
        CreditCard::where('user', $user->email)->update([
            'pan'=>$req->pan,
            'cvv'=>$req->cvv,
            'expiry'=>$req->expiry,
            'zip_code'=>$req->zip_code,
            'address'=>$req->address,
            'card_name'=>$req->card_name,
        ]);
        return redirect('/credit-card')->with('message', '<div class="c-alert c-alert--success"><i class="c-alert__icon fa fa-check-circle"></i>Your card has been edited successfully.</div>');
    }

    public function logout(){
        auth()->logout();
        return redirect('/login');
    }

    public function transfer(){
        $user = Utils::getUser();
        $users = User::get();
        $investments = Investment::where('user', $user->email)->latest()->get();
        $plans = Plan::get();
        return view('user.transfer', ['user'=>$user, 'users'=>$users, 'investments'=>$investments, 'plans'=>$plans]);
    }

    public function transferPost(Request $req)
    {
        $investment = Investment::where('id', $req->from)->first();


        if($req->amount > $investment->amount){
            return redirect()->back()->with('message', '<div class="c-alert c-alert--danger alert fade show"><i class="c-alert__icon fa fa-times-circle"></i> Error. You do not have sufficient funds to perform this operation.<button class="c-close" data-dismiss="alert" type="button">&times;</button></div>');
        }else {
            $transfer = Transfer::create([
                'from' => $investment->plan,
                'to' => $req->plan,
                'amount' => $req->amount,
                'user_id' => auth()->id(),
                'status' => 'pending'
            ]);

            $from = Plan::where('slug', $transfer->from)->first();
            $to = Plan::where('slug', $transfer->to)->first();

            $title= ' ';
            $name = auth()->user()->firstname.' '.auth()->user()->surname;
            $content = 'Your inter-account transfer from '.ucwords($from->name).' to '. ucwords($to->name) .' has been initiated successfully.';
            $button = false;
            $button_text = '';
            $subject = "Transfer Initiated!";
            Mail::to($transfer->user->email)->send(new Messaging($title,$name,$content,$button,$button_text,$subject));

            return redirect('/transfer')->with('message', '<div class="c-alert c-alert--success"><i class="c-alert__icon fa fa-check-circle"></i>Your transfer has been recorded, pending confirmation.</div>');
        }
    }

    public function transferTransactions()
    {
        return view('user.transfers',['transactions' => Transfer::where('user_id', auth()->id())->latest()->paginate(12)]);
    }

    public function statements(){
        $user = Utils::getUser();
        return view('user.statements', ['user'=>$user, 'transactions'=> $user->staticInvestments()->latest()->paginate(12)]);
    }

    public function generateAccountNumberForUsers() {
        foreach(\App\User::all() as $user) {
            if (!$user->bx_account_number) {
                $user->update(['bx_account_number' => $user->generateAccountNumber()]);
            }
        }
        exit;
    }

}
