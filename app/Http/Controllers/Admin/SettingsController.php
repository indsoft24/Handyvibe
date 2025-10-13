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

        return view('admin.settings.pages', compact('pages'));
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
