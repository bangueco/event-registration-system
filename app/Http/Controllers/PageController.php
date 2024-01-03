<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function viewHomePage()
    {
        return view('pages.home');
    }

    public function viewLoginPage()
    {
        return view('authentication.login');
    }

    public function viewRegisterPage()
    {
        return view('authentication.register');
    }
}
