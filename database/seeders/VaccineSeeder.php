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
            'vaccine_d'=>'Brucelosis',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'AndyKas',
            'actual_state'=>'Disponible',
        ]);
        Vaccine::create([
            'vaccine_d'=>'Clostridiales',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'Viritis',
            'actual_state'=>'Disponible',
        ]);
        Vaccine::create([
            'vaccine_d'=>'IBR-BVD ',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ABC',
            'actual_state'=>'Disponible',
        ]);
        Vaccine::create([
            'vaccine_d'=>'Diarrea neonatal ',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'AndyKLA',
            'actual_state'=>'Disponible',
        ]);
        Vaccine::create([
            'vaccine_d'=>'Carbunclo bacteridiano ',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'AndyKas',
            'actual_state'=>'Disponible',
        ]);
        Vaccine::create([
            'vaccine_d'=>'IBR-BVD, Leptospirosis,
            Campylobacteriosis ',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'AndyKas',
            'actual_state'=>'Disponible',
        ]);
        Vaccine::create([
            'vaccine_d'=>'Campylobacteriosis',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'AndyKas',
            'actual_state'=>'Disponible',
        ]);
        Vaccine::create([
            'vaccine_d'=>'Campylobacteriosis',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'AndyKas',
            'actual_state'=>'Disponible',
        ]);
        Vaccine::create([
            'vaccine_d'=>'Campylobacteriosis',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'AndyKas',
            'actual_state'=>'Inactivo',
        ]);
    }
}
