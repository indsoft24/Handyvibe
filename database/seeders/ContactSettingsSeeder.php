<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class ContactSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contact page settings
        Setting::set('contact_address', '123 Business Street, City, State 12345', 'text', 'contact', 'Company address for contact page');
        Setting::set('contact_phone', '+1 (555) 123-4567', 'text', 'contact', 'Company phone number for contact page');
        Setting::set('contact_email', 'info@handyvibe.com', 'text', 'contact', 'Company email for contact page');
        Setting::set('contact_banner', 'images/img_bg_2.jpg', 'text', 'banners', 'Contact page banner image');
        
        // Default contact page content
        Setting::set('contact', '<h3>Get in Touch</h3><p>We\'d love to hear from you. Send us a message and we\'ll respond as soon as possible.</p><p>Whether you have questions about our services, need technical support, or want to discuss a potential project, our team is here to help.</p>', 'textarea', 'pages', 'Contact page content');
    }
}
