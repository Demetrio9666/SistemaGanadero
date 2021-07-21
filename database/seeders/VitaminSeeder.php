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
            'vitamin_d'=>'Vitamina ABC',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'AndyKas',
            'actual_state'=>'Disponible',
        ]);
        Vitamin::create([
            'vitamin_d'=>'Vitamina C',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'Avas',
            'actual_state'=>'Disponible',
        ]);
        Vitamin::create([
            'vitamin_d'=>'Vitamina D',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'Tores',
            'actual_state'=>'Disponible',
        ]);
        Vitamin::create([
            'vitamin_d'=>'Vitamina E',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'K',
            'actual_state'=>'Disponible',
        ]);
        Vitamin::create([
            'vitamin_d'=>'Vitamina K',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'Andyvast',
            'actual_state'=>'Disponible',
        ]);
        Vitamin::create([
            'vitamin_d'=>'Vitamina K',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'Jproveedor',
            'actual_state'=>'Inactivo',
        ]);
        Vitamin::create([
            'vitamin_d'=>'Complejo B',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'AndyPest',
            'actual_state'=>'Disponible',
        ]);
    }
}
