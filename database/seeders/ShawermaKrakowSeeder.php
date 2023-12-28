<?php

namespace Database\Seeders;

use App\Models\ShawermaKrakow;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShawermaKrakowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShawermaKrakow::create([
            "name"=> "Shawerma Krakow",
            "owner"=> "Hassan",
            "mobile"=> "545455660",
            "address"=> "poland",
        ]);
    }
}
