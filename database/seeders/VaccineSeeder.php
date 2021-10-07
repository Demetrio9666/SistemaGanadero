<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vaccine;
class VaccineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vaccine::create([
            'vaccine_d'=>'BRUCELOSIS-2021-D1',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'ACTIVO',
        ]);
        Vaccine::create([
            'vaccine_d'=>'BRUCELOSIS-2021-D2',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'ACTIVO',
        ]);
        Vaccine::create([
            'vaccine_d'=>'CLOSTRIDIALES-2021-D1',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'ACTIVO',
        ]);
        Vaccine::create([
            'vaccine_d'=>'CLOSTRIDIALES-2021-D2',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'ACTIVO',
        ]);
        Vaccine::create([
            'vaccine_d'=>'IBR-BVD-2021-D1',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ABC',
            'actual_state'=>'ACTIVO',
        ]);
        Vaccine::create([
            'vaccine_d'=>'IBR-BVD-2021-D2',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'ACTIVO',
        ]);
        Vaccine::create([
            'vaccine_d'=>'DIARREA NEONATAL-2021-D1',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'ACTIVO',
        ]);
        Vaccine::create([
            'vaccine_d'=>'DIARREA NEONATAL-2021-D2',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'ACTIVO',
        ]);
        Vaccine::create([
            'vaccine_d'=>'CARBUNCLO BACTERIAL-2021-D1 ',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'ACTIVO',
        ]);
        Vaccine::create([
            'vaccine_d'=>'CARBUNCLO BACTERIAL-2021-D2',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'ACTIVO',
        ]);
        
        Vaccine::create([
            'vaccine_d'=>'CAMPYLOBACTERIOSIS-2021-D1',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'ACTIVO',
        ]);
        Vaccine::create([
            'vaccine_d'=>'CAMPYLOBACTERIOSIS-2021-D2',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'ACTIVO',
        ]);
        Vaccine::create([
            'vaccine_d'=>'CAMPYLOBACTERIOSIS TIPO B-2021-D1',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'ACTIVO',
        ]);
        Vaccine::create([
            'vaccine_d'=>'CAMPYLOBACTERIOSIS TIPO B-2021-D2',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'ACTIVO',
        ]);
        Vaccine::create([
            'vaccine_d'=>'CAMPYLOBACTERIOSIS TIPO A-2021-D1',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'ACTIVO',
        ]);
        Vaccine::create([
            'vaccine_d'=>'CAMPYLOBACTERIOSIS TIPO A-2021-D2',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'ACTIVO',
        ]);
        Vaccine::create([
            'vaccine_d'=>'CAMPYLOBACTERIOSIS TIPO AB-2021-D1',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'INACTIVO',
        ]);
        Vaccine::create([
            'vaccine_d'=>'CAMPYLOBACTERIOSIS TIPO AB-2021-D2',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'INACTIVO',
        ]);
    }
}
