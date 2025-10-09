<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show admin profile page
     */
    public function index()
    {
        return view('admin.profile');
    }
}


