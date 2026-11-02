<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::firstOrCreate(
            [ 'key' => 'salon-1', 'area' => 'Salon 1' ]
        );

        Location::firstOrCreate(
            [ 'key' => 'salon-2', 'area' => 'Salon 2' ]
        );

        Location::firstOrCreate(
            [ 'key' => 'salon-3', 'area' => 'Salon 3' ]
        );

        Location::firstOrCreate(
            [ 'key' => 'salon-4', 'area' => 'Salon 4' ]
        );

        Location::firstOrCreate(
            [ 'key' => 'salon-5', 'area' => 'Salon 5' ]
        );
        
        Location::firstOrCreate(
            [ 'key' => 'salon-6', 'area' => 'Salon 6' ]
        );
    }
}
