<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function aboutus()
    {
        return view('aboutus');
    }

    public function faq()
    {
        return view('faq');
    }

    public function termcondition()
    {
        return view('termcondition');
    }

    public function dprofile()
    {
        return view('dprofile');
    }
}
