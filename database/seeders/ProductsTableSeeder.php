<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;

class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        // Create categories first
        $electronicsCategory = Category::create([
            'name' => 'Electronics',
            'slug' => 'electronics',
            'description' => 'Electronic devices and gadgets',
            'status' => true,
            'sort_order' => 1,
        ]);

        $furnitureCategory = Category::create([
            'name' => 'Furniture',
            'slug' => 'furniture',
            'description' => 'Home and office furniture',
            'status' => true,
            'sort_order' => 2,
        ]);

        // Create subcategories
        $laptopsSubCategory = SubCategory::create([
            'category_id' => $electronicsCategory->id,
            'name' => 'Laptops',
            'slug' => 'laptops',
            'description' => 'Portable computers',
            'status' => true,
            'sort_order' => 1,
        ]);

        $phonesSubCategory = SubCategory::create([
            'category_id' => $electronicsCategory->id,
            'name' => 'Smartphones',
            'slug' => 'smartphones',
            'description' => 'Mobile phones',
            'status' => true,
            'sort_order' => 2,
        ]);

        $chairsSubCategory = SubCategory::create([
            'category_id' => $furnitureCategory->id,
            'name' => 'Chairs',
            'slug' => 'chairs',
            'description' => 'Seating furniture',
            'status' => true,
            'sort_order' => 1,
        ]);

        $products = [
            [
                'category_id' => $electronicsCategory->id,
                'sub_category_id' => $laptopsSubCategory->id,
                'name' => 'Dell XPS 13 Laptop',
                'description' => 'High-performance laptop with Intel i7 processor, 16GB RAM, and 512GB SSD. Perfect for professionals and students.',
                'short_description' => 'Premium laptop with excellent performance',
                'price' => 1299.99,
                'sale_price' => 1199.99,
                'stock_quantity' => 50,
                'manage_stock' => true,
                'in_stock' => true,
                'weight' => '1.27 kg',
                'dimensions' => '30.5 x 20.3 x 1.5 cm',
                'featured_image' => 'images/product-1.jpg',
                'featured' => true,
                'status' => true,
                'meta_title' => 'Dell XPS 13 Laptop - Premium Performance',
                'meta_description' => 'Buy Dell XPS 13 laptop with Intel i7 processor. High performance laptop for professionals.',
                'sort_order' => 1,
            ],
            [
                'category_id' => $electronicsCategory->id,
                'sub_category_id' => $phonesSubCategory->id,
                'name' => 'iPhone 15 Pro',
                'description' => 'Latest Apple smartphone with A17 Pro chip, titanium design, and advanced camera system.',
                'short_description' => 'Latest Apple smartphone with titanium design',
                'price' => 999.99,
                'stock_quantity' => 100,
                'manage_stock' => true,
                'in_stock' => true,
                'weight' => '187 g',
                'dimensions' => '14.67 x 7.15 x 0.83 cm',
                'featured_image' => 'images/product-2.jpg',
                'featured' => true,
                'status' => true,
                'meta_title' => 'iPhone 15 Pro - Latest Apple Smartphone',
                'meta_description' => 'Buy iPhone 15 Pro with A17 Pro chip and titanium design. Latest Apple smartphone.',
                'sort_order' => 2,
            ],
            [
                'category_id' => $electronicsCategory->id,
                'sub_category_id' => $phonesSubCategory->id,
                'name' => 'Samsung Galaxy S24',
                'description' => 'Premium Android smartphone with Snapdragon 8 Gen 3 processor and advanced AI features.',
                'short_description' => 'Premium Android smartphone with AI features',
                'price' => 899.99,
                'sale_price' => 799.99,
                'stock_quantity' => 75,
                'manage_stock' => true,
                'in_stock' => true,
                'weight' => '167 g',
                'dimensions' => '14.7 x 7.0 x 0.77 cm',
                'featured_image' => 'images/product-3.jpg',
                'featured' => true,
                'status' => true,
                'meta_title' => 'Samsung Galaxy S24 - Premium Android Phone',
                'meta_description' => 'Buy Samsung Galaxy S24 with Snapdragon 8 Gen 3 and AI features.',
                'sort_order' => 3,
            ],
            [
                'category_id' => $electronicsCategory->id,
                'sub_category_id' => null,
                'name' => 'Sony WH-1000XM5 Headphones',
                'description' => 'Industry-leading noise cancelling wireless headphones with 30-hour battery life.',
                'short_description' => 'Noise-cancelling wireless headphones',
                'price' => 399.99,
                'stock_quantity' => 30,
                'manage_stock' => true,
                'in_stock' => true,
                'weight' => '250 g',
                'dimensions' => '20.5 x 17.5 x 7.5 cm',
                'featured_image' => 'images/product-4.jpg',
                'featured' => false,
                'status' => true,
                'meta_title' => 'Sony WH-1000XM5 - Noise Cancelling Headphones',
                'meta_description' => 'Buy Sony WH-1000XM5 noise cancelling wireless headphones.',
                'sort_order' => 4,
            ],
            [
                'category_id' => $furnitureCategory->id,
                'sub_category_id' => $chairsSubCategory->id,
                'name' => 'Ergonomic Office Chair',
                'description' => 'Comfortable ergonomic office chair with lumbar support and adjustable height.',
                'short_description' => 'Comfortable ergonomic office chair',
                'price' => 299.99,
                'stock_quantity' => 25,
                'manage_stock' => true,
                'in_stock' => true,
                'weight' => '15 kg',
                'dimensions' => '65 x 65 x 120 cm',
                'featured_image' => 'images/product-5.jpg',
                'featured' => true,
                'status' => true,
                'meta_title' => 'Ergonomic Office Chair - Comfortable Seating',
                'meta_description' => 'Buy ergonomic office chair with lumbar support and adjustable height.',
                'sort_order' => 5,
            ],
            [
                'category_id' => $furnitureCategory->id,
                'sub_category_id' => $chairsSubCategory->id,
                'name' => 'Modern Dining Chair Set',
                'description' => 'Set of 4 modern dining chairs with sleek design and comfortable seating.',
                'short_description' => 'Set of 4 modern dining chairs',
                'price' => 199.99,
                'stock_quantity' => 20,
                'manage_stock' => true,
                'in_stock' => true,
                'weight' => '25 kg',
                'dimensions' => '45 x 45 x 85 cm each',
                'featured_image' => 'images/product-6.jpg',
                'featured' => false,
                'status' => true,
                'meta_title' => 'Modern Dining Chair Set - 4 Chairs',
                'meta_description' => 'Buy modern dining chair set with 4 chairs and sleek design.',
                'sort_order' => 6,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
