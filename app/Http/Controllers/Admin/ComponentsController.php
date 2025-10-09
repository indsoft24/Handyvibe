<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComponentsController extends Controller
{
    /**
     * Show admin components page
     */
    public function index()
    {
        return view('admin.components');
    }

    /**
     * Show alerts component page
     */
    public function alerts()
    {
        return view('admin.alerts');
    }

    /**
     * Show avatars component page
     */
    public function avatars()
    {
        return view('admin.avatars');
    }

    /**
     * Show badges component page
     */
    public function badges()
    {
        return view('admin.badge');
    }

    /**
     * Show buttons component page
     */
    public function buttons()
    {
        return view('admin.buttons');
    }
}


