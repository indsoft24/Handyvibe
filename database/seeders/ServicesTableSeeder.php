<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Category;
use App\Models\SubCategory;

class ServicesTableSeeder extends Seeder
{
    public function run(): void
    {
        // Get existing categories or create them
        $homeServicesCategory = Category::firstOrCreate([
            'name' => 'Home Services',
            'slug' => 'home-services',
            'description' => 'Professional home maintenance and repair services',
            'status' => true,
            'sort_order' => 1,
        ]);

        $automotiveCategory = Category::firstOrCreate([
            'name' => 'Automotive',
            'slug' => 'automotive',
            'description' => 'Car care and maintenance services',
            'status' => true,
            'sort_order' => 2,
        ]);

        $beautyCategory = Category::firstOrCreate([
            'name' => 'Beauty & Health',
            'slug' => 'beauty-health',
            'description' => 'Personal care and wellness services',
            'status' => true,
            'sort_order' => 3,
        ]);

        // Create subcategories
        $electricalSubCategory = SubCategory::firstOrCreate([
            'category_id' => $homeServicesCategory->id,
            'name' => 'Electrical',
            'slug' => 'electrical',
            'description' => 'Electrical repair and installation services',
            'status' => true,
            'sort_order' => 1,
        ]);

        $plumbingSubCategory = SubCategory::firstOrCreate([
            'category_id' => $homeServicesCategory->id,
            'name' => 'Plumbing',
            'slug' => 'plumbing',
            'description' => 'Plumbing repair and installation services',
            'status' => true,
            'sort_order' => 2,
        ]);

        $carpentrySubCategory = SubCategory::firstOrCreate([
            'category_id' => $homeServicesCategory->id,
            'name' => 'Carpentry',
            'slug' => 'carpentry',
            'description' => 'Woodwork and furniture repair services',
            'status' => true,
            'sort_order' => 3,
        ]);

        $applianceSubCategory = SubCategory::firstOrCreate([
            'category_id' => $homeServicesCategory->id,
            'name' => 'Appliance Repair',
            'slug' => 'appliance-repair',
            'description' => 'Home appliance repair and maintenance',
            'status' => true,
            'sort_order' => 4,
        ]);

        $carWashSubCategory = SubCategory::firstOrCreate([
            'category_id' => $automotiveCategory->id,
            'name' => 'Car Washing',
            'slug' => 'car-washing',
            'description' => 'Car cleaning and detailing services',
            'status' => true,
            'sort_order' => 1,
        ]);

        $massageSubCategory = SubCategory::firstOrCreate([
            'category_id' => $beautyCategory->id,
            'name' => 'Massage Therapy',
            'slug' => 'massage-therapy',
            'description' => 'Professional massage and wellness services',
            'status' => true,
            'sort_order' => 1,
        ]);

        $services = [
            [
                'category_id' => $homeServicesCategory->id,
                'sub_category_id' => $electricalSubCategory->id,
                'name' => 'Expert Electrician Services',
                'description' => 'Modern homes use advanced electrical appliances, and attempting repairs yourself can be life-threatening. The HandyVibe company has a solution for all your problems. If you need a residential electrician, you can get it done through the HandyVibe website within a reasonable budget.',
                'short_description' => 'Find trusted experts for all electrical services at home or office.',
                'price' => 800.00,
                'sale_price' => 750.00,
                'duration' => '2-4 hours',
                'service_type' => 'one_time',
                'features' => [
                    'Licensed electricians',
                    '24/7 emergency service',
                    'Free estimates',
                    'Warranty on all work',
                    'Modern equipment'
                ],
                'requirements' => [
                    'Clear access to electrical panel',
                    'Power supply available',
                    'Basic safety requirements met'
                ],
                'featured_image' => 'images/img_bg_1.jpg',
                'featured' => true,
                'status' => true,
                'meta_title' => 'Expert Electrician Services - HandyVibe',
                'meta_description' => 'Professional electrical services for your home and office. Licensed electricians available 24/7.',
                'sort_order' => 1,
            ],
            [
                'category_id' => $homeServicesCategory->id,
                'sub_category_id' => $plumbingSubCategory->id,
                'name' => 'Reliable Plumbing Solutions',
                'description' => 'A leaking faucet is something no one can tolerate, especially at night, and local plumbers can cost a fortune. In the future, if you ever need a plumber, just remember the HandyVibe company directly to get all kinds of services at a minimum price.',
                'short_description' => 'Fix leaks, clogs, and all plumbing needs right at your doorstep.',
                'price' => 530.00,
                'duration' => '1-3 hours',
                'service_type' => 'one_time',
                'features' => [
                    'Certified plumbers',
                    'Same-day service',
                    'No hidden charges',
                    'Quality materials',
                    'Emergency repairs'
                ],
                'requirements' => [
                    'Access to water main',
                    'Clear work area',
                    'Basic tools available'
                ],
                'featured_image' => 'images/img_bg_2.jpg',
                'featured' => true,
                'status' => true,
                'meta_title' => 'Reliable Plumbing Solutions - HandyVibe',
                'meta_description' => 'Professional plumbing services for leaks, clogs, and repairs. Same-day service available.',
                'sort_order' => 2,
            ],
            [
                'category_id' => $homeServicesCategory->id,
                'sub_category_id' => $carpentrySubCategory->id,
                'name' => 'Skilled Carpentry Work',
                'description' => 'A carpenter is an artist who can give a new look to your house. For tasks like fixing a sticky door, a rotting window frame, or a damaged deck board, you\'ll need a carpenter. You can directly book one by visiting the HandyVibe website.',
                'short_description' => 'Find skilled professionals for any carpentry needs, big or small.',
                'price' => 750.00,
                'sale_price' => 700.00,
                'duration' => '3-6 hours',
                'service_type' => 'one_time',
                'features' => [
                    'Expert craftsmen',
                    'Custom solutions',
                    'Quality wood materials',
                    'Precision work',
                    'Finishing included'
                ],
                'requirements' => [
                    'Clear workspace',
                    'Access to power tools',
                    'Material specifications'
                ],
                'featured_image' => 'images/img_bg_3.jpg',
                'featured' => true,
                'status' => true,
                'meta_title' => 'Skilled Carpentry Work - HandyVibe',
                'meta_description' => 'Professional carpentry services for doors, windows, and furniture repair.',
                'sort_order' => 3,
            ],
            [
                'category_id' => $automotiveCategory->id,
                'sub_category_id' => $carWashSubCategory->id,
                'name' => 'Convenient Car Washing',
                'description' => 'Washing your car is a boring and time-consuming task. Instead of waiting in lines or wasting time, get your car serviced right in your parking space with the help of HandyVibe company services.',
                'short_description' => 'Get trusted car washing services right at your doorstep.',
                'price' => 540.00,
                'duration' => '1-2 hours',
                'service_type' => 'recurring',
                'features' => [
                    'Eco-friendly products',
                    'Professional equipment',
                    'Interior cleaning',
                    'Waxing available',
                    'At your location'
                ],
                'requirements' => [
                    'Water access nearby',
                    'Parking space available',
                    'Vehicle accessible'
                ],
                'featured_image' => 'images/img_bg_4.jpg',
                'featured' => false,
                'status' => true,
                'meta_title' => 'Convenient Car Washing - HandyVibe',
                'meta_description' => 'Professional car washing service at your doorstep. Eco-friendly and convenient.',
                'sort_order' => 4,
            ],
            [
                'category_id' => $homeServicesCategory->id,
                'sub_category_id' => $applianceSubCategory->id,
                'name' => 'Home Appliances Repair',
                'description' => 'Home appliances are the true heroes of your everyday life. When one breaks down, it can cause a lot of stress. Before rushing to replace it, pause. Understanding the world of home appliance repair and servicing can save you time, money, and stress. Call HandyVibe Service Men and get efficient service within your budget.',
                'short_description' => 'Expert solutions for hassle-free repairs at your doorstep.',
                'price' => 940.00,
                'duration' => '2-4 hours',
                'service_type' => 'one_time',
                'features' => [
                    'Certified technicians',
                    'All major brands',
                    'Genuine parts',
                    'Warranty included',
                    'Diagnostic service'
                ],
                'requirements' => [
                    'Appliance accessible',
                    'Power supply available',
                    'Model information'
                ],
                'featured_image' => 'images/img_bg_5.jpg',
                'featured' => true,
                'status' => true,
                'meta_title' => 'Home Appliances Repair - HandyVibe',
                'meta_description' => 'Professional appliance repair service for all major brands. Certified technicians.',
                'sort_order' => 5,
            ],
            [
                'category_id' => $beautyCategory->id,
                'sub_category_id' => $massageSubCategory->id,
                'name' => 'Beauty & Health Services',
                'description' => 'Enjoy professional beauty services from the comfort of your home. Our qualified experts provide everything from massage therapy to skin and hair care, ensuring you look and feel your best without stepping out the door.',
                'short_description' => 'Professional skin care, hair care, and massage therapy at home.',
                'price' => 1000.00,
                'duration' => '1-2 hours',
                'service_type' => 'subscription',
                'features' => [
                    'Licensed therapists',
                    'Premium products',
                    'Relaxing environment',
                    'Customized treatments',
                    'Follow-up care'
                ],
                'requirements' => [
                    'Private space available',
                    'Basic amenities',
                    'Health consultation'
                ],
                'featured_image' => 'images/product-5.jpg',
                'featured' => false,
                'status' => true,
                'meta_title' => 'Beauty & Health Services - HandyVibe',
                'meta_description' => 'Professional beauty and wellness services at your home. Licensed therapists.',
                'sort_order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
