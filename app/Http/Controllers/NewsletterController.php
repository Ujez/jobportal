<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;
class NewsletterController extends Controller
{
    public function create()
    {
        return view('newsletter');
    }
 
    public function store(Request $request)
    {
        if ( ! Newsletter::isSubscribed($request->email) ) 
        {
            Newsletter::subscribePending($request->email);
            return redirect('newsletter')->with('success', 'Thank You For Subscribing');
        }
        return redirect('newsletter')->with('error', 'Sorry! You have already subscribed ');
            
    }
}