<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Demetrio Gonzalez',
            'email'=>'demetrio2014gonzalez@gmail.com',
            'password'=> bcrypt('Demetrio96@')
        ])->assignRole('ADMINISTRADOR');
          

        User::create([
            'name'=>'Melanie Yagual',
            'email'=>'melanie@gmail.com',
            'password'=> bcrypt('Demetrio96@')
        ])->assignRole('SUPERVISOR');

        User::create([
            'name'=>'Oswaldo Gonzalez',
            'email'=>'oswaldo2014gonzalez@gmail.com',
            'password'=> bcrypt('Demetrio96@')
        ])->assignRole('INVITADO');
    }
}
