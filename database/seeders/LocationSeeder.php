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
            'location_d'=>'ESTABLO A',
            'description'=> 'JEAN ANDRES',
            'actual_state'=>'ACTIVO'
        ]);
        Location::create([
            'location_d'=>'ESTABLO B',
            'description'=> 'JEAN ANDRES',
            'actual_state'=>'ACTIVO'
        ]);
        Location::create([
            'location_d'=>'ESTABLO C',
            'description'=> 'JEAN ANDRES',
            'actual_state'=>'ACTIVO'
        ]);
        Location::create([
            'location_d'=>'ESTABLO D',
            'description'=> 'JEAN ANDRES',
            'actual_state'=>'ACTIVO'
        ]);
        Location::create([
            'location_d'=>'ESTABLO H',
            'description'=> 'JEAN ANDRES',
            'actual_state'=>'ACTIVO'
        ]);
    }
}
