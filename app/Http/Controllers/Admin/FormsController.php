<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    /**
     * Show admin forms page
     */
    public function index()
    {
        return view('admin.forms');
    }
}


