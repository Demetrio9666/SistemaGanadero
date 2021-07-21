<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dewormer;
class DewormerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dewormer::create([
            'dewormer_d'=>'Benzimidazoles',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'AndyKas',
            'actual_state'=>'Disponible',
        ]);
        Dewormer::create([
            'dewormer_d'=>'ECTOSIN',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'AndyKas',
            'actual_state'=>'Disponible',
        ]);
        Dewormer::create([
            'dewormer_d'=>'MAGAP',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'AndyKas',
            'actual_state'=>'Disponible',
        ]);
        Dewormer::create([
            'dewormer_d'=>'Benzimi',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'AndyKas',
            'actual_state'=>'Disponible',
        ]);
        Dewormer::create([
            'dewormer_d'=>'Dazoles',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'AndyKas',
            'actual_state'=>'Inactivo',
        ]);
        Dewormer::create([
            'dewormer_d'=>'Zimidazoles',
            'date_e'=> '2021-07-01',
            'date_c'=> '2024-07-19',
            'supplier'=>'AndyKas',
            'actual_state'=>'Disponible',
        ]);
    }
}
