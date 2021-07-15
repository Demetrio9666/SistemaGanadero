<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name'=>'admin']);
        $supervisor = Role::create(['name'=>'supervisor']);
        $invitado = Role::create(['name'=>'invitado']);


        Permission::create(['name'=>'fichaReproduccionEx.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'fichaReproduccionEx.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'fichaReproduccionEx.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'fichaReproduccionEx.destroy'])->syncRoles([$admin]);

        Permission::create(['name'=>'fichaReproduccionM.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'fichaReproduccionM.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'fichaReproduccionM.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'fichaReproduccionM.destroy'])->syncRoles([$admin]);

        Permission::create(['name'=>'fichaReproduccionA.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'fichaReproduccionA.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'fichaReproduccionA.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'fichaReproduccionA.destroy'])->syncRoles([$admin]);

        Permission::create(['name'=>'fichaTratamiento.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'fichaTratamiento.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'fichaTratamiento.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'fichaTratamiento.destroy'])->syncRoles([$admin]);

        Permission::create(['name'=>'fichaParto.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'fichaParto.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'fichaParto.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'fichaParto.destroy'])->syncRoles([$admin]);

        Permission::create(['name'=>'controlPrenes.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'controlPrenes.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'controlPrenes.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'controlPrenes.destroy'])->syncRoles([$admin]);

        Permission::create(['name'=>'controlDesparasitacion.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'controlDesparasitacion.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'controlDesparasitacion.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'controlDesparasitacion.destroy'])->syncRoles([$admin]);

        Permission::create(['name'=>'controlPeso.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'controlPeso.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'controlPeso.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'controlPeso.destroy'])->syncRoles([$admin]);

        Permission::create(['name'=>'controlVacuna.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'controlVacuna.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'controlVacuna.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'controlVacuna.destroy'])->syncRoles([$admin]);

        Permission::create(['name'=>'fichaAnimal.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'fichaAnimal.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'fichaAnimal.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'fichaAnimal.destroy'])->syncRoles([$admin]);


        Permission::create(['name'=>'confUbicacion.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'confUbicacion.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'confUbicacion.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'confUbicacion.destroy'])->syncRoles([$admin]);


        Permission::create(['name'=>'confRaza.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'confRaza.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'confRaza.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'confRaza.destroy'])->syncRoles([$admin]);


        Permission::create(['name'=>'confVi.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'confVi.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'confVi.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'confVi.destroy'])->syncRoles([$admin]);


        Permission::create(['name'=>'confDespa.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'confDespa.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'confDespa.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'confDespa.destroy'])->syncRoles([$admin]);


        Permission::create(['name'=>'confVacuna.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'confVacuna.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'confVacuna.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'confVacuna.destroy'])->syncRoles([$admin]);


        Permission::create(['name'=>'confAnt.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'confAnt.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'confAnt.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'confAnt.destroy'])->syncRoles([$admin]);


        Permission::create(['name'=>'confMate.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'confMate.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'confMate.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'confMate.destroy'])->syncRoles([$admin]);

        
    }
}
