<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display the about page
     */
    public function index()
    {
        // Get about page content from settings
        $aboutContent = Setting::get('about_us', '');
        
        // Get about page specific settings
        $aboutSettings = [
            'hero_title' => Setting::get('about_hero_title', 'About HandyVibe'),
            'hero_subtitle' => Setting::get('about_hero_subtitle', 'One App. All Services. Anytime.'),
            'hero_description' => Setting::get('about_hero_description', 'Bringing qualified experts to your doorstep for home solutions and beauty services.'),
            'story_title' => Setting::get('about_story_title', 'Our Story & Mission'),
            'story_content' => Setting::get('about_story_content', ''),
            'what_we_do_title' => Setting::get('about_what_we_do_title', 'What We Do'),
            'what_we_do_description' => Setting::get('about_what_we_do_description', 'Our platform makes it simple to book essential services right to your door.'),
            'quality_title' => Setting::get('about_quality_title', 'How We Deliver Quality'),
            'quality_content' => Setting::get('about_quality_content', ''),
            'cta_title' => Setting::get('about_cta_title', 'Ready to Experience Hassle-Free Services?'),
            'cta_description' => Setting::get('about_cta_description', 'Download the HandyVibe app and get started today.'),
        ];

        // Get banner settings
        $bannerImage = Setting::get('about_banner', 'images/img_bg_2.jpg');

        return view('about', compact('aboutContent', 'aboutSettings', 'bannerImage'));
    }
}
