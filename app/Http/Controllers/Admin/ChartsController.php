<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChartsController extends Controller
{
    /**
     * Show admin charts page
     */
    public function index()
    {
        return view('admin.charts');
    }

    /**
     * Show bar chart page
     */
    public function bar()
    {
        return view('admin.bar-chart');
    }

    /**
     * Show line chart page
     */
    public function line()
    {
        return view('admin.line-chart');
    }
}


