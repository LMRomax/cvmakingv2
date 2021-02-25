<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ContactController extends Controller
{
    public function sendEmail(Request $request){
        $validation = $request->validate([
            'contact_email' => ['required', 'string', 'email', 'max:255'],
            'contact_message' => ['required', 'string', 'max: 20000'],
        ]); 

        Mail::to('maxencectmd.lemaitre@gmail.com')->send(new ContactMail($request->except('_token')));
      
        if(Mail::failures()){
            if(LaravelLocalization::getCurrentLocale() == "fr") {
                return redirect()->back()->with('error', 'Votre e-mail n\'a pas été envoyé !');
            }
            else if(LaravelLocalization::getCurrentLocale() == "en") {
                return redirect()->back()->with('error', 'Your email has not been sent!');
            }
            else if (LaravelLocalization::getCurrentLocale() == "es") {
                return redirect()->back()->with('error', '¡Tu correo electrónico no ha sido enviado!');
            }  
        }
        else {
            if(LaravelLocalization::getCurrentLocale() == "fr") {
                return redirect()->back()->with('success', 'Email envoyé avec succés !');
            }
            else if(LaravelLocalization::getCurrentLocale() == "en") {
                return redirect()->back()->with('error', 'Your email has been sent!');
            }
            else if (LaravelLocalization::getCurrentLocale() == "es") {
                return redirect()->back()->with('error', '¡Tu correo electrónico ha sido enviado!');
            }
        }
    }
}
