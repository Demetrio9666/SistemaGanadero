<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;
class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'location_d'=>'Establo A',
            'description'=> 'San Antonio',
            'actual_state'=>'Disponible'
        ]);
        Location::create([
            'location_d'=>'Establo B',
            'description'=> 'San Antonio',
            'actual_state'=>'Disponible'
        ]);
        Location::create([
            'location_d'=>'Establo C',
            'description'=> 'San Antonio',
            'actual_state'=>'Disponible'
        ]);
        Location::create([
            'location_d'=>'Establo D',
            'description'=> 'San Antonio',
            'actual_state'=>'Disponible'
        ]);
    }
}
