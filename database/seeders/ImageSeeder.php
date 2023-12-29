<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Image::create([
            'title' => 'Banner 2',
            'url' => asset('Banner_2.webp'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Image::create([
            'title' => 'Cards bg',
            'url' => asset('Cards_bg.webp'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Image::create([
            'title' => 'Pack food',
            'url' => asset('Pack_food.webp'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Image::create([
            'title' => 'Sausage',
            'url' => asset('Sausage.webp'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Image::create([
            'title' => 'About img 1',
            'url' => asset('about/About_img_1.webp'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Image::create([
            'title' => 'About img 2',
            'url' => asset('about/About_img_2.webp'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Image::create([
            'title' => 'About main img',
            'url' => asset('about/About_main_img.webp'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Image::create([
            'title' => 'Team 1',
            'url' => asset('team/Team_1.webp'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Image::create([
            'title' => 'Team 2',
            'url' => asset('team/Team_2.webp'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Image::create([
            'title' => 'Team 3',
            'url' => asset('team/Team_3.webp'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Image::create([
            'title' => 'Team bg',
            'url' => asset('team/Team_bg.webp'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
