<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Contact;
use App\Models\Admin;

class PageController extends Controller
{
    public function login()
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $cre = request()->only('email', 'password');
        if(auth()->guard('admin')->attempt($cre)){
            return redirect('/admin');
        }
        return redirect()->back();
    }

    public function showLogin()
    {
        return view('admin.login');
    }
    
    public function showDashboard()
    {
        $data = Admin::take(1)->first();
        return view('admin.dashboard', compact('data'));
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect('/');
    }
}
