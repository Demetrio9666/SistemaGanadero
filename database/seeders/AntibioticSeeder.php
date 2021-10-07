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
            'antibiotic_d'=>'AMOXICINA',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'ACTIVO',
        ]);
        Antibiotic::create([
            'antibiotic_d'=>'PENICILINA',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'ACTIVO',
        ]);
        Antibiotic::create([
            'antibiotic_d'=>'CEFALOSPORINAS',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'ACTIVO',
        ]);
        Antibiotic::create([
            'antibiotic_d'=>' CEFACLOR',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'ACTIVO',
        ]);
        Antibiotic::create([
            'antibiotic_d'=>'AZITROMICINA',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'ACTIVO',
        ]);
        Antibiotic::create([
            'antibiotic_d'=>'ERITROMICINA',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'ACTIVO',
        ]);
        Antibiotic::create([
            'antibiotic_d'=>' CEFALEXINA',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDYKAST',
            'actual_state'=>'INACTIVO',
        ]);
    }
}
