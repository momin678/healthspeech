<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function about_us(){
        return view('frontend.footer.about-us');
    }
    public function contact_us(){
        return view('frontend.footer.contact-us');
    }
    public function privacy_policy(){
        return view('frontend.footer.privecy-policy');
    }
    public function terms_condition(){
        return view('frontend.footer.terms-and-condition');
    }
    public function advisment(){
        return view('frontend.footer.advisment');
    }
    public function write_us(){
        return view('frontend.footer.write-us');
    }
}
