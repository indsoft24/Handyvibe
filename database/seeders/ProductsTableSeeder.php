<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'code' => 'PROD001',
                'name' => 'Laptop Dell XPS 13',
                'quantity' => 50,
                'price' => 1299.99,
                'description' => 'High-performance laptop with Intel i7 processor',
                'is_active' => true,
            ],
            [
                'code' => 'PROD002',
                'name' => 'iPhone 15 Pro',
                'quantity' => 100,
                'price' => 999.99,
                'description' => 'Latest Apple smartphone with A17 chip',
                'is_active' => true,
            ],
            [
                'code' => 'PROD003',
                'name' => 'Samsung Galaxy S24',
                'quantity' => 75,
                'price' => 899.99,
                'description' => 'Premium Android smartphone',
                'is_active' => true,
            ],
            [
                'code' => 'PROD004',
                'name' => 'Sony WH-1000XM5',
                'quantity' => 30,
                'price' => 399.99,
                'description' => 'Noise-cancelling wireless headphones',
                'is_active' => true,
            ],
            [
                'code' => 'PROD005',
                'name' => 'iPad Pro 12.9"',
                'quantity' => 40,
                'price' => 1099.99,
                'description' => 'Professional tablet with M2 chip',
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
