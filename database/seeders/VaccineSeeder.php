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
            'vaccine_d'=>'BRUCELOSIS',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'DISPONIBLE',
        ]);
        Vaccine::create([
            'vaccine_d'=>'CLOSTRIDIALES',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'DISPONIBLE',
        ]);
        Vaccine::create([
            'vaccine_d'=>'IBR-BVD ',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ABC',
            'actual_state'=>'DISPONIBLE',
        ]);
        Vaccine::create([
            'vaccine_d'=>'DIARREA NEONATAL',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'DISPONIBLE',
        ]);
        Vaccine::create([
            'vaccine_d'=>'CARBUNCLO BACTERIAL ',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'DISPONIBLE',
        ]);
        Vaccine::create([
            'vaccine_d'=>'IBR-BVD',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'DISPONIBLE',
        ]);
        Vaccine::create([
            'vaccine_d'=>'CAMPYLOBACTERIOSIS',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'DISPONIBLE',
        ]);
        Vaccine::create([
            'vaccine_d'=>'CAMPYLOBACTERIOSIS TIPO B',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'DISPONIBLE',
        ]);
        Vaccine::create([
            'vaccine_d'=>'CAMPYLOBACTERIOSIS TIPO A',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'DISPONIBLE',
        ]);
        Vaccine::create([
            'vaccine_d'=>'CAMPYLOBACTERIOSIS TIPO AB',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'INACTIVO',
        ]);
    }
}
