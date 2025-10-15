<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    /**
     * Display settings index page
     */
    public function index()
    {
        $pageSettings = Setting::getByGroup('pages');
        $bannerSettings = Setting::getByGroup('banners');

        return view('admin.settings.index', compact('pageSettings', 'bannerSettings'));
    }

    /**
     * Show page content management
     */
    public function pages()
    {
        $pages = [
            'terms_conditions' => Setting::get('terms_conditions', ''),
            'about_us' => Setting::get('about_us', ''),
            'help' => Setting::get('help', ''),
            'contact' => Setting::get('contact', ''),
            'team' => Setting::get('team', ''),
            'privacy_policy' => Setting::get('privacy_policy', ''),
        ];

        // Get contact page specific settings
        $contactSettings = [
            'contact_address' => Setting::get('contact_address', '[Your Company Address]'),
            'contact_phone' => Setting::get('contact_phone', '[Your Contact Number]'),
            'contact_email' => Setting::get('contact_email', '[Your Company Email]'),
        ];

        // Get about page specific settings
        $aboutSettings = [
            'about_hero_title' => Setting::get('about_hero_title', 'About HandyVibe'),
            'about_hero_subtitle' => Setting::get('about_hero_subtitle', 'One App. All Services. Anytime.'),
            'about_hero_description' => Setting::get('about_hero_description', 'Bringing qualified experts to your doorstep for home solutions and beauty services.'),
            'about_story_title' => Setting::get('about_story_title', 'Our Story & Mission'),
            'about_story_content' => Setting::get('about_story_content', ''),
            'about_what_we_do_title' => Setting::get('about_what_we_do_title', 'What We Do'),
            'about_what_we_do_description' => Setting::get('about_what_we_do_description', 'Our platform makes it simple to book essential services right to your door.'),
            'about_quality_title' => Setting::get('about_quality_title', 'How We Deliver Quality'),
            'about_quality_content' => Setting::get('about_quality_content', ''),
            'about_cta_title' => Setting::get('about_cta_title', 'Ready to Experience Hassle-Free Services?'),
            'about_cta_description' => Setting::get('about_cta_description', 'Download the HandyVibe app and get started today.'),
        ];

        return view('admin.settings.pages', compact('pages', 'contactSettings', 'aboutSettings'));
    }

    /**
     * Update page content
     */
    public function updatePages(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'terms_conditions' => 'nullable|string',
            'about_us' => 'nullable|string',
            'help' => 'nullable|string',
            'contact' => 'nullable|string',
            'team' => 'nullable|string',
            'privacy_policy' => 'nullable|string',
            'contact_address' => 'nullable|string|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'contact_email' => 'nullable|email|max:255',
            'about_hero_title' => 'nullable|string|max:255',
            'about_hero_subtitle' => 'nullable|string|max:255',
            'about_hero_description' => 'nullable|string|max:500',
            'about_story_title' => 'nullable|string|max:255',
            'about_story_content' => 'nullable|string',
            'about_what_we_do_title' => 'nullable|string|max:255',
            'about_what_we_do_description' => 'nullable|string|max:500',
            'about_quality_title' => 'nullable|string|max:255',
            'about_quality_content' => 'nullable|string',
            'about_cta_title' => 'nullable|string|max:255',
            'about_cta_description' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Update each page content
        Setting::set('terms_conditions', $request->terms_conditions, 'textarea', 'pages', 'Terms and Conditions page content');
        Setting::set('about_us', $request->about_us, 'textarea', 'pages', 'About Us page content');
        Setting::set('help', $request->help, 'textarea', 'pages', 'Help page content');
        Setting::set('contact', $request->contact, 'textarea', 'pages', 'Contact page content');
        Setting::set('team', $request->team, 'textarea', 'pages', 'Team page content');
        Setting::set('privacy_policy', $request->privacy_policy, 'textarea', 'pages', 'Privacy Policy page content');

        // Update contact page specific settings
        Setting::set('contact_address', $request->contact_address, 'text', 'contact', 'Company address for contact page');
        Setting::set('contact_phone', $request->contact_phone, 'text', 'contact', 'Company phone number for contact page');
        Setting::set('contact_email', $request->contact_email, 'text', 'contact', 'Company email for contact page');

        // Update about page specific settings
        Setting::set('about_hero_title', $request->about_hero_title, 'text', 'about', 'About page hero title');
        Setting::set('about_hero_subtitle', $request->about_hero_subtitle, 'text', 'about', 'About page hero subtitle');
        Setting::set('about_hero_description', $request->about_hero_description, 'text', 'about', 'About page hero description');
        Setting::set('about_story_title', $request->about_story_title, 'text', 'about', 'About page story section title');
        Setting::set('about_story_content', $request->about_story_content, 'textarea', 'about', 'About page story section content');
        Setting::set('about_what_we_do_title', $request->about_what_we_do_title, 'text', 'about', 'About page what we do title');
        Setting::set('about_what_we_do_description', $request->about_what_we_do_description, 'text', 'about', 'About page what we do description');
        Setting::set('about_quality_title', $request->about_quality_title, 'text', 'about', 'About page quality section title');
        Setting::set('about_quality_content', $request->about_quality_content, 'textarea', 'about', 'About page quality section content');
        Setting::set('about_cta_title', $request->about_cta_title, 'text', 'about', 'About page CTA title');
        Setting::set('about_cta_description', $request->about_cta_description, 'text', 'about', 'About page CTA description');

        return redirect()->back()->with('success', 'Page contents updated successfully!');
    }

    /**
     * Show banner management
     */
    public function banners()
    {
        $banners = [
            'home_banner' => Setting::get('home_banner', ''),
            'about_banner' => Setting::get('about_banner', ''),
            'services_banner' => Setting::get('services_banner', ''),
            'contact_banner' => Setting::get('contact_banner', ''),
            'footer_banner' => Setting::get('footer_banner', ''),
        ];

        return view('admin.settings.banners', compact('banners'));
    }

    /**
     * Update banners
     */
    public function updateBanners(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'home_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'services_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'contact_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'footer_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Handle banner uploads
        $bannerFields = ['home_banner', 'about_banner', 'services_banner', 'contact_banner', 'footer_banner'];

        foreach ($bannerFields as $field) {
            if ($request->hasFile($field)) {
                // Delete old banner if exists
                $oldBanner = Setting::get($field);
                if ($oldBanner && Storage::disk('public')->exists($oldBanner)) {
                    Storage::disk('public')->delete($oldBanner);
                }

                // Store new banner
                $bannerPath = $request->file($field)->store('banners', 'public');
                Setting::set($field, $bannerPath, 'image', 'banners', ucfirst(str_replace('_', ' ', $field)).' image');
            }
        }

        return redirect()->back()->with('success', 'Banners updated successfully!');
    }

    /**
     * Delete a banner
     */
    public function deleteBanner(Request $request, $type)
    {
        $banner = Setting::where('key', $type)->first();

        if ($banner && $banner->value) {
            // Delete file from storage
            if (Storage::disk('public')->exists($banner->value)) {
                Storage::disk('public')->delete($banner->value);
            }

            // Update setting
            $banner->update(['value' => null]);
        }

        return redirect()->back()->with('success', 'Banner deleted successfully!');
    }
}
