<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

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
            'image' => assert('images/products/Bayonne_Ham.wepb'),
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
            'image' => assert('images/products/Beef_Meat.wepb'),
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
            'image' => assert('images/products/Beef_Ribs.wepb'),
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
            'image' => assert('images/products/Beef_Steack.wepb'),
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
            'image' => assert('images/products/Chicken_Chunks.wepb'),
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
            'image' => assert('images/products/Fresh_Prawns.wepb'),
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
            'image' => assert('images/products/Meat_Patties.wepb'),
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
            'image' => assert('images/products/Pork_Steak.wepb'),
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
            'image' => assert('images/products/Salmon_Fish_Steaks.wepb'),
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
            'image' => assert('images/products/Smoked_Pork.wepb'),
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
            'image' => assert('images/products/Tuna_Fish.wepb'),
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
            'image' => assert('images/products/Wild_Caught_Salmon.wepb'),
            'shawerma_krakows_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
