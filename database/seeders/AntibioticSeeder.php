<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Antibiotic;
class AntibioticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Antibiotic::create([
            'antibiotic_d'=>'Amoxicilina',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'AndyKas',
            'actual_state'=>'Disponible',
        ]);
        Antibiotic::create([
            'antibiotic_d'=>'Penicilina',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'AndyKas',
            'actual_state'=>'Disponible',
        ]);
        Antibiotic::create([
            'antibiotic_d'=>'Cefalosporinas',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'AndyKas',
            'actual_state'=>'Disponible',
        ]);
        Antibiotic::create([
            'antibiotic_d'=>'Cefaclor',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'AndyKas',
            'actual_state'=>'Disponible',
        ]);
        Antibiotic::create([
            'antibiotic_d'=>'Azitromicina',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'AndyKas',
            'actual_state'=>'Disponible',
        ]);
        Antibiotic::create([
            'antibiotic_d'=>'Eritromicina',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'AndyKas',
            'actual_state'=>'Disponible',
        ]);
        Antibiotic::create([
            'antibiotic_d'=>'Cefalexina',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'AndyKas',
            'actual_state'=>'Inactivo',
        ]);
    }
}
