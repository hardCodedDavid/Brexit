<?php

namespace App\Http\Controllers;

use App\Deposit;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Admin;
use App\Plan;
use App\Wallet;
use App\Investment;
use App\Mail\Messaging;
use App\Payout;
use Mail;

class Globals extends Controller
{
    //
    public static function getAdmin(){
    	$id = Auth::guard('admin')->id();
    	$user = Admin::where('id',$id)->first();
    	return $user;
    }

    public static function getUser(){
    	$id = Auth::id();
    	$user = User::where('id',$id)->first();
    	return $user;
    }

    public static function getByEmail($email){
    	return User::where('email', $email)->first();
    }

    public static function getPlan($slug){
    	// return Plan::where('id', $slug)->first();
    	return Plan::where('slug', $slug)->first();
    }

    public static function getInvestmentSum($plan){
        $investment = Investment::where(['user'=>self::getUser()->email, 'plan'=>$plan])->sum('amount');
        $withdrawals = Payout::where(['user'=>self::getUser()->email, 'plan'=>$plan, 'status' => 'pending'])->sum('amount');
        
        $funds = $investment - $withdrawals;

        $amount = self::getUser()->staticInvestments()->where('status', 'open')->where('asset', $plan)->sum('amount_invested');
        $roi = self::getUser()->staticInvestments()->where('status', 'close')->where('asset', $plan)->sum('roi');
    
        // $totalInvestment = 0;

        // foreach ($amount as $investment) {
        //     $totalInvestment += (int)$investment['amount_invested'];
        // }
        
        return ($funds - $amount + $roi);
    }

    public static function getInvestmentSum2($user){
        return Investment::where('user', $user)->sum('amount');
    }

    public static function getLockedFunds($user = null)
    {
        // $user = $user?: auth()->user();

        // return Investment::where('user', $user->email)->where('locked',  1)->sum('amount');


        $user = self::getUser();

        $amount = $user->staticInvestments()->where('status', 'open')->get();
    
        $totalInvestment = 0;

        foreach ($amount as $investment) {
            $totalInvestment += (int)$investment['amount_invested'];
        }

        return $totalInvestment;
    }

    public static function getWithdrawableFunds($user = null)
    {
        $user = $user?: auth()->user();

        return Investment::where('user', $user->email)->where('locked',  0)->sum('amount');
    }

    public static function getIndividualFunds($asset)
    {
        $user = self::getUser();

        $amount = $user->staticInvestments()->where('status', 'open')->where('asset', $asset)->get();
    
        $totalInvestment = 0;

        foreach ($amount as $investment) {
            $totalInvestment += (int)$investment['amount_invested'];
        }

        return $totalInvestment;
    }

    public static function getAssetFunds()
    {
        $investment = Investment::where(['user'=>self::getUser()->email])->sum('amount');
        $withdrawals = Payout::where(['user'=>self::getUser()->email, 'status' => 'pending'])->sum('amount');
        
        $funds = $investment - $withdrawals;

        $amount = self::getUser()->staticInvestments()->where('status', 'open')->get();
    
        $totalInvestment = 0;

        foreach ($amount as $investment) {
            $totalInvestment += (int)$investment['amount_invested'];
        }
        
        return ($funds - $totalInvestment);
    }
}
