<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class AboutSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // About page banner
        Setting::set('about_banner', 'images/img_bg_2.jpg', 'text', 'banners', 'About page banner image');
        
        // Hero section settings
        Setting::set('about_hero_title', 'About HandyVibe', 'text', 'about', 'About page hero title');
        Setting::set('about_hero_subtitle', 'One App. All Services. Anytime.', 'text', 'about', 'About page hero subtitle');
        Setting::set('about_hero_description', 'Bringing qualified experts to your doorstep for home solutions and beauty services.', 'text', 'about', 'About page hero description');
        
        // Story section settings
        Setting::set('about_story_title', 'Our Story & Mission', 'text', 'about', 'About page story section title');
        Setting::set('about_story_content', '<p>HandyVibe is a reliable online platform connecting consumers with qualified service professionals right at their doorstep.</p><p>No more running around for daily chores. The concept is simple: quality service in minimal time, saving both time and money from the comfort of your home.</p><p>Our mission is to connect with the maximum number of consumers and deliver high-quality, standardized, and reliable services across home and beauty categories.</p>', 'textarea', 'about', 'About page story section content');
        
        // What we do section settings
        Setting::set('about_what_we_do_title', 'What We Do', 'text', 'about', 'About page what we do title');
        Setting::set('about_what_we_do_description', 'Our platform makes it simple to book essential services right to your door.', 'text', 'about', 'About page what we do description');
        
        // Quality section settings
        Setting::set('about_quality_title', 'How We Deliver Quality', 'text', 'about', 'About page quality section title');
        Setting::set('about_quality_content', '<p>We go beyond simply listing providers. HandyVibe manages the entire service experience to ensure quality and reliability.</p><div class="quality-points"><div class="quality-item"><i class="icon-users"></i><h4>Trained Professionals</h4><p>Services delivered by a network of trained, independent service professionals.</p></div><div class="quality-item"><i class="icon-shield"></i><h4>Quality Assurance</h4><p>Every service meets a consistent standard of quality and professionalism.</p></div><div class="quality-item"><i class="icon-mobile"></i><h4>Technology-Driven</h4><p>Our full-stack approach guarantees seamless service from booking to completion.</p></div></div>', 'textarea', 'about', 'About page quality section content');
        
        // Call to action section settings
        Setting::set('about_cta_title', 'Ready to Experience Hassle-Free Services?', 'text', 'about', 'About page CTA title');
        Setting::set('about_cta_description', 'Download the HandyVibe app and get started today.', 'text', 'about', 'About page CTA description');
        
        // Default about page content
        Setting::set('about_us', '<h3>Welcome to HandyVibe</h3><p>We are committed to providing exceptional doorstep services that make your life easier and more convenient.</p><p>Our platform connects you with verified professionals who deliver quality services right to your doorstep, saving you time and effort.</p>', 'textarea', 'pages', 'About Us page content');
    }
}
