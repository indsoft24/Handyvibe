<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TablesController extends Controller
{
    /**
     * Show admin tables page
     */
    public function index()
    {
        return view('admin.basic-tables');
    }
}


