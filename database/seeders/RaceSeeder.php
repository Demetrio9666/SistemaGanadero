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
            'race_d'=>'GYR',
            'percentage'=> 100,
            'actual_state'=>'ACTIVO'
        ]);
        Race::create([
            'race_d'=>'GUZERAT',
            'percentage'=> 100,
            'actual_state'=>'ACTIVO'
        ]);
        Race::create([
            'race_d'=>' HOLCEN',
            'percentage'=> 100,
            'actual_state'=>'ACTIVO'
        ]);
        Race::create([
            'race_d'=>'YERSEY',
            'percentage'=> 100,
            'actual_state'=>'ACTIVO'
        ]);
        Race::create([
            'race_d'=>'BROWSUIT',
            'percentage'=> 100,
            'actual_state'=>'ACTIVO'
        ]);

        Race::create([
            'race_d'=>'GYR-GUZERAT',
            'percentage'=> 50,
            'actual_state'=>'ACTIVO'
        ]);
        Race::create([
            'race_d'=>'GYR-HOLCEN',
            'percentage'=> 50,
            'actual_state'=>'ACTIVO'
        ]);
        Race::create([
            'race_d'=>'GYR-YERSEY',
            'percentage'=> 50,
            'actual_state'=>'ACTIVO'
        ]);
        Race::create([
            'race_d'=>'GYR-BROWSUIT',
            'percentage'=> 50,
            'actual_state'=>'ACTIVO'
        ]);
        Race::create([
            'race_d'=>'GUZERAT-GYR',
            'percentage'=> 50,
            'actual_state'=>'ACTIVO'
        ]);
        Race::create([
            'race_d'=>'GUZERAT-HOLCEN',
            'percentage'=> 50,
            'actual_state'=>'ACTIVO'
        ]);
        Race::create([
            'race_d'=>'GUZERAT-YERSEY',
            'percentage'=> 50,
            'actual_state'=>'ACTIVO'
        ]);
    }
}
