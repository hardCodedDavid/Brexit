<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function index() 
    {
        $plan = Plan::latest()->paginate(6);
        
        return view('static.index', [ 
            'plans' => $plan,
        ]);
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
        $plan = Plan::latest()->paginate(3);
        $count = Plan::latest()->count();
        
        return view('static.properties', [ 
            'plans' => $plan,
            'count' => $count,
        ]);
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

    public function privacy() 
    {
        return view('static.privacy');
    }

    // public function search(Request $request)
    // {
    //     $keyword = $request->keyword;

    //     $results = Plan::when($keyword, function ($query) use ($keyword) 
    //         {
    //             return $query->where('name', 'like', '%' . $keyword . '%');
    //         })
    //         ->get();

    //     $count = Plan::latest()->count();
    //     return view('static.properties', [ 
    //         'plans' => $results,
    //         'count' => $count,
    //     ]);
    // }

    public function search()
    {
        $query = Plan::query();

        if (request('keyword')) {
            $query->where('name', 'like', '%' . request('keyword') . '%');
        }

        if (request('type')) {
            $query->where('type', '=', request('type'));
        }

        if (request('location')) {
            $query->where('location', 'like', '%' . request('location') . '%');
        }

        if (request('min_price') & request('max_price')) {
            $query->whereBetween('price', [request('min_price'), request('max_price')]);
        }

        $results = $query->paginate(20);

        $count = Plan::latest()->count();

        return view('static.properties', [ 
            'plans' => $results,
            'count' => $count,
        ]);
    }


}
