<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vitamin;
class VitaminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vitamin::create([
            'vitamin_d'=>'VITAMINA ABC',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDKAST',
            'actual_state'=>'ACTIVO',
        ]);
        Vitamin::create([
            'vitamin_d'=>'VITAMINA C',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDKAST',
            'actual_state'=>'ACTIVO',
        ]);
        Vitamin::create([
            'vitamin_d'=>'VITAMINA D',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDKAST',
            'actual_state'=>'ACTIVO',
        ]);
        Vitamin::create([
            'vitamin_d'=>'VITAMINA E',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDKAST',
            'actual_state'=>'ACTIVO',
        ]);
        Vitamin::create([
            'vitamin_d'=>'VITAMINA K',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDKAST',
            'actual_state'=>'ACTIVO',
        ]);
        Vitamin::create([
            'vitamin_d'=>'VITAMINA K12',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDKAST',
            'actual_state'=>'INACTIVO',
        ]);
        Vitamin::create([
            'vitamin_d'=>'COMPLEJO B',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'ANDKAST',
            'actual_state'=>'ACTIVO',
        ]);
    }
}
