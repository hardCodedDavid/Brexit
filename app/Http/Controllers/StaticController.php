<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function index() 
    {
        return view('static.index');
    }

    public function about() 
    {
        return view('static.about');
    }

    public function faq() 
    {
        return view('static.faq');
    }

    public function howItWorks() 
    {
        return view('static.works');
    }

    public function list() 
    {
        $plan = Plan::latest()->paginate(12);
        
        return view('static.properties', [ 'plans' => $plan ]);
    }

    public function contact() 
    {
        return view('static.contact');
    }

    public function historical() 
    {
        return view('static.historical');
    }
    
    public function stakeholder() 
    {
        return view('static.stakeholder');
    }

    public function sell() 
    {
        return view('static.sell-home');
    }

    public function learning() 
    {
        return view('static.learning');
    }

    public function web() 
    {
        return view('static.web3');
    }

    public function vacation() 
    {
        return view('static.vacation');
    }
}
