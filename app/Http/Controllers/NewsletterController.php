<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index() 
    {
        return view('index');
    }

    public function subscribe(Request $request)
    {
        // dd('OK');
        $request->validate([
            'email' => 'required|unique:newsletter,email'
        ]);

        event(new UserSubscribed($request->input('email')));

        return back();
    }
}
