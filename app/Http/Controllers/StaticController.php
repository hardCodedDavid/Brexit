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
}
