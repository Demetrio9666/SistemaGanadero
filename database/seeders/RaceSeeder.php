<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Race;
class RaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Race::create([
            'race_d'=>'Gyr',
            'percentage'=> 100,
            'actual_state'=>'Disponible'
        ]);
        Race::create([
            'race_d'=>'Guzerat',
            'percentage'=> 100,
            'actual_state'=>'Disponible'
        ]);
        Race::create([
            'race_d'=>'Holcen',
            'percentage'=> 100,
            'actual_state'=>'Disponible'
        ]);
        Race::create([
            'race_d'=>'Yersey',
            'percentage'=> 100,
            'actual_state'=>'Disponible'
        ]);
        Race::create([
            'race_d'=>'Browsuit',
            'percentage'=> 100,
            'actual_state'=>'Disponible'
        ]);

        Race::create([
            'race_d'=>'Gyr-Guzerat',
            'percentage'=> 50,
            'actual_state'=>'Disponible'
        ]);
        Race::create([
            'race_d'=>'Gyr-Holcen',
            'percentage'=> 50,
            'actual_state'=>'Disponible'
        ]);
        Race::create([
            'race_d'=>'Gyr-Yersey',
            'percentage'=> 50,
            'actual_state'=>'Disponible'
        ]);
        Race::create([
            'race_d'=>'Gyr-Browsuit',
            'percentage'=> 50,
            'actual_state'=>'Disponible'
        ]);
        Race::create([
            'race_d'=>'Guzerat-Gyr',
            'percentage'=> 50,
            'actual_state'=>'Disponible'
        ]);
        Race::create([
            'race_d'=>'Guzerat-Holcen',
            'percentage'=> 50,
            'actual_state'=>'Disponible'
        ]);
        Race::create([
            'race_d'=>'Guzerat-Yersey',
            'percentage'=> 50,
            'actual_state'=>'Disponible'
        ]);
    }
}
