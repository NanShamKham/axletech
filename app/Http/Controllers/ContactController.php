<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Mail;
use Session;

class ContactController extends Controller
{
    public function contactForm()
    {
        return view('contactForm');
    }

    public function storeContactForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'subject'=>'required|max:100',
            'message' => 'required|max:255',
            'g-recaptcha-response' => function ($attribute, $value, $fail) {
                $secretKey = config('services.recaptcha.secret');
                $response = $value;
                $userIP = $_SERVER['REMOTE_ADDR'];
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIP";
                $response = \file_get_contents($url);
                $response = json_decode($response);
                if(!$response->success){
                    Session::flash('g-recaptcha-response', 'please check reCaptcha.');
                    Session::flash('alert-class', 'alert-danger');
                    $fail($attribute.'google reCaptcha fail');
                }
            },
            // 'name' => 'required',
            // 'email' => 'required|email',
            // 'phone' => 'required|digits:10|numeric',
            // 'subject' => 'required',
            // 'message' => 'required',
        ]);

        $input = $request->all();

        Contact::create($input);

        //  Send mail to admin
        \Mail::send('contactMail', array(
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'subject' => $input['subject'],
            'message' => $input['message'],
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('paingpaing41100@gmail.com', 'Admin')->subject($request->get('subject'));
        });

        return redirect()->back()->with(['success' => '!--Thanks You For Sending Message--']);
    }
}