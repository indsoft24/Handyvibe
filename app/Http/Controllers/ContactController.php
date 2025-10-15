<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display the contact page
     */
    public function index()
    {
        // Get contact page content from settings
        $contactContent = Setting::get('contact', '');
        
        // Get contact information from settings
        $contactInfo = [
            'address' => Setting::get('contact_address', '[Your Company Address]'),
            'phone' => Setting::get('contact_phone', '[Your Contact Number]'),
            'email' => Setting::get('contact_email', '[Your Company Email]'),
        ];

        // Get banner settings
        $bannerImage = Setting::get('contact_banner', 'images/img_bg_2.jpg');

        return view('contact', compact('contactContent', 'contactInfo', 'bannerImage'));
    }
}
