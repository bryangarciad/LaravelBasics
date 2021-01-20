<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContacFormMail;

class ContactFormController extends Controller
{
    //
    public function create(){
        return view('contact.create');
    }

    public function store(){

        $data= request()->validate([
            'name' => 'required',
            'email'  => 'required',
            'message' => 'required'
        ]);

        // send an email; usa smtp client Laracel is shipped with mailable client
        Mail::to('bryan.garcia.duran@gmail.com')->send(new ContacFormMail($data));


        //sen message with flashh!
        return redirect('/contact')->with('message', 'Thanks'); //with is executed once when reload goe to south
        
        // You can use flash instead 
        // session()->flash('message', 'Thanks');
    }
}
