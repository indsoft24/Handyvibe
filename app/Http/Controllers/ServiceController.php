<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private $services = [
        [
            'slug' => 'electrician',
            'name' => 'Electrician Service',
            'price' => '800',
            'image' => 'images/img_bg_1.jpg',
            'short_description' => 'Find trusted experts for all electrical services at home or office.',
            'long_description' => "Modern homes use advanced electrical appliances, and attempting repairs yourself can be life-threatening. The HandyVibe company has a solution for all your problems. If you need a residential electrician, you won't have to search for them anywhere; you can get it done through the HandyVibe website, and that too within a reasonable budget."
        ],
        [
            'slug' => 'plumber',
            'name' => 'Plumbing Service',
            'price' => '530',
            'image' => 'images/img_bg_2.jpg',
            'short_description' => 'Fix leaks, clogs, and all plumbing needs right at your doorstep.',
            'long_description' => "A leaking faucet is something no one can tolerate, especially at night, and local plumbers can cost a fortune. In the future, if you ever need a plumber, just remember the HandyVibe company directly to get all kinds of services at a minimum price."
        ],
        [
            'slug' => 'carpenter',
            'name' => 'Carpentry Service',
            'price' => '750',
            'image' => 'images/img_bg_3.jpg',
            'short_description' => 'Find skilled professionals for any carpentry needs, big or small.',
            'long_description' => "A carpenter is an artist who can give a new look to your house. For tasks like fixing a sticky door, a rotting window frame, or a damaged deck board, you'll need a carpenter. If you need any of these works, then you can directly book one by visiting the HandyVibe website."
        ],
        [
            'slug' => 'car-washing',
            'name' => 'Car Washing Service',
            'price' => '540',
            'image' => 'images/img_bg_4.jpg',
            'short_description' => 'Get trusted car washing services right at your doorstep.',
            'long_description' => "Washing your car is a boring and time-consuming task. Instead of waiting in lines or wasting time, get your car serviced right in your parking space with the help of HandyVibe company services."
        ],
        [
            'slug' => 'appliance-repair',
            'name' => 'Home Appliances Repair',
            'price' => '940',
            'image' => 'images/img_bg_5.jpg',
            'short_description' => 'Expert solutions for hassle-free repairs at your doorstep.',
            'long_description' => "Home appliances are the true heroes of your everyday life. When one breaks down, it can cause a lot of stress. Before rushing to replace it, pause. Understanding the world of home appliance repair and servicing can save you time, money, and stress. Call HandyVibe Service Men and get efficient service within your budget."
        ],
        [
            'slug' => 'beauty-and-health',
            'name' => 'Beauty & Health',
            'price' => '1000',
            'image' => 'images/product-5.jpg',
            'short_description' => 'Professional skin care, hair care, and massage therapy at home.',
            'long_description' => 'Enjoy professional beauty services from the comfort of your home. Our qualified experts provide everything from massage therapy to skin and hair care, ensuring you look and feel your best without stepping out the door.'
        ],
    ];

    public function index()
    {
        return view('product', ['services' => $this->services]);
    }

    public function show($slug)
    {
        $service = collect($this->services)->firstWhere('slug', $slug);

        if (!$service) {
            abort(404);
        }

        $related = collect($this->services)->where('slug', '!=', $slug)->take(3);

        return view('single-service', [
            'service' => $service,
            'related' => $related
        ]);
    }
}