<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show admin signin page
     */
    public function signin()
    {
        return view('admin.signin');
    }

    /**
     * Show admin signup page
     */
    public function signup()
    {
        return view('admin.signup');
    }

    /**
     * Show 404 page
     */
    public function notFound()
    {
        return view('admin.404');
    }
}


