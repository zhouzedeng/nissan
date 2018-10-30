<?php
namespace Wangxun\Contact\Controllers;

use App\Http\Controllers\Controller;

class ContactController extends Controller
{

    public function index()
    {
         //dd('12345');
        //echo say('12345');die;
        //dd(Config::get("contact.message"));
        //dd(config('dndc.contact.msg'));
        //echo config('dndc.contact.msg');
        //return view('contact::contact');
        return view('dndc.contact.contact');
    }
}