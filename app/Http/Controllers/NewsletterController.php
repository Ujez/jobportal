<?php

namespace App\Http\Controllers;

use App\Models\Newsleta;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Newsletter;

class NewsletterController extends Controller
{
    public function create()
    {
        return view('layouts.app');
    }

    public function store(Request $request)
    {
        if (!Newsletter::isSubscribed($request->email)) {
            Newsletter::subscribePending($request->email);
            return redirect('/')->with('success', 'Thank You For Subscribing');
        }
        return redirect('/')->with('error', 'Sorry! You have already subscribed ');

       
    }
    public function addNews(Request $request)
    {
         //Eloquen ORM
         Newsleta::insert([
            'email' => $request->email,
            'created_at' => Carbon::now(),
        ]);

        return redirect('/')->with('success', 'Thank You For Subscribing');
    }
}
