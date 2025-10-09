<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    /**
     * Show admin images page
     */
    public function index()
    {
        return view('admin.images');
    }
}


