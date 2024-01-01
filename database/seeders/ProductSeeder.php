<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Bayonne Ham',
            'description' => 'description for product',
            'category' => 'category 4',
            'quantity' => '100',
            'availability' => true,
            'top_product' => true,
            'weight' => 1,
            'price_before_discount' => 20,
            'image' => asset('storage/images/products/bayonne_ham.webp'),
            'shawerma_krakows_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Product::create([
            'name' => 'Beef Meat',
            'description' => 'description for product',
            'category' => 'category 4',
            'quantity' => '100',
            'availability' => true,
            'top_product' => true,
            'weight' => 1,
            'price_before_discount' => 20,
            'image' => asset('storage/images/products/beef_meat.webp'),
            'shawerma_krakows_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Product::create([
            'name' => 'Beef Ribs',
            'description' => 'description for product',
            'category' => 'category 4',
            'quantity' => '100',
            'availability' => true,
            'top_product' => true,
            'weight' => 1,
            'price_before_discount' => 20,
            'image' => asset('storage/images/products/beef_ribs.webp'),
            'shawerma_krakows_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Product::create([
            'name' => 'Beef Steack',
            'description' => 'description for product',
            'category' => 'category 4',
            'quantity' => '100',
            'availability' => true,
            'top_product' => false,
            'weight' => 1,
            'price_before_discount' => 20,
            'image' => asset('storage/images/products/beef_steack.webp'),
            'shawerma_krakows_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Product::create([
            'name' => 'Chicken Chunks',
            'description' => 'description for product',
            'category' => 'category 4',
            'quantity' => '100',
            'availability' => true,
            'top_product' => false,
            'weight' => 1,
            'price_before_discount' => 20,
            'image' => asset('storage/images/products/chicken_chunks.webp'),
            'shawerma_krakows_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Product::create([
            'name' => 'Fresh Prawns',
            'description' => 'description for product',
            'category' => 'category 4',
            'quantity' => '100',
            'availability' => true,
            'top_product' => false,
            'weight' => 1,
            'price_before_discount' => 20,
            'image' => asset('storage/images/products/fresh_prawns.webp'),
            'shawerma_krakows_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Product::create([
            'name' => 'Meat Patties',
            'description' => 'description for product',
            'category' => 'category 4',
            'quantity' => '100',
            'availability' => true,
            'top_product' => false,
            'weight' => 1,
            'price_before_discount' => 20,
            'image' => asset('storage/images/products/meat_patties.webp'),
            'shawerma_krakows_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Product::create([
            'name' => 'Pork Steak',
            'description' => 'description for product',
            'category' => 'category 4',
            'quantity' => '100',
            'availability' => true,
            'top_product' => false,
            'weight' => 1,
            'price_before_discount' => 20,
            'image' => asset('storage/images/products/pork_steak.webp'),
            'shawerma_krakows_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Product::create([
            'name' => 'Salmon Fish Steaks',
            'description' => 'description for product',
            'category' => 'category 4',
            'quantity' => '100',
            'availability' => true,
            'top_product' => false,
            'weight' => 1,
            'price_before_discount' => 20,
            'image' => asset('storage/images/products/salmon_fish_steaks.webp'),
            'shawerma_krakows_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Product::create([
            'name' => 'Smoked Pork',
            'description' => 'description for product',
            'category' => 'category 4',
            'quantity' => '100',
            'availability' => true,
            'top_product' => false,
            'weight' => 1,
            'price_before_discount' => 20,
            'image' => asset('storage/images/products/smoked_pork.webp'),
            'shawerma_krakows_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Product::create([
            'name' => 'Tuna Fish',
            'description' => 'description for product',
            'category' => 'category 4',
            'quantity' => '100',
            'availability' => true,
            'top_product' => false,
            'weight' => 1,
            'price_before_discount' => 20,
            'image' => asset('storage/images/products/tuna_fish.webp'),
            'shawerma_krakows_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Product::create([
            'name' => 'Wild_Caught_Salmon',
            'description' => 'description for product',
            'category' => 'category 4',
            'quantity' => '100',
            'availability' => true,
            'top_product' => false,
            'weight' => 1,
            'price_before_discount' => 20,
            'image' => asset('storage/images/products/wild_caught_salmon.webp'),
            'shawerma_krakows_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
