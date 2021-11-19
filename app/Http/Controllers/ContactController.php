<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;;
use App\Models\Contact;
use Mail;

class ContactController extends Controller
{
        public function ContactUsForm(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
         ]);
        Contact::create($request->all());
        //  Send mail to admin
        \Mail::send('frontend.footer.mail', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'user_query' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('noreply@healthspeech.com', 'Admin')->subject($request->get('subject'));
        });
        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }
}
