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
        $admin = Role::create(['name'=>'ADMIN']);
        $supervisor = Role::create(['name'=>'SUPERVISOR']);
        $invitado = Role::create(['name'=>'INVITADO']);


        Permission::create(['name'=>'Visualizar Ficha de Animales'])->syncRoles([$admin]);
        Permission::create(['name'=>'Crear      Ficha de Animales'])->syncRoles([$admin]);
        Permission::create(['name'=>'Editar     Ficha de Animales'])->syncRoles([$admin]);
        Permission::create(['name'=>'Eliminar   Ficha de Animales'])->syncRoles([$admin]);

        Permission::create(['name'=>'Visualizar Ficha de Parto'])->syncRoles([$admin]);
        Permission::create(['name'=>'Crear      Ficha de Parto'])->syncRoles([$admin]);
        Permission::create(['name'=>'Editar     Ficha de Parto'])->syncRoles([$admin]);
        Permission::create(['name'=>'Eliminar   Ficha de Parto'])->syncRoles([$admin]);

        Permission::create(['name'=>'Visualizar Ficha de Tratamiento'])->syncRoles([$admin]);
        Permission::create(['name'=>'Crear      Ficha de Tratamiento'])->syncRoles([$admin]);
        Permission::create(['name'=>'Editar     Ficha de Tratamiento'])->syncRoles([$admin]);
        Permission::create(['name'=>'Eliminar   Ficha de Tratamiento'])->syncRoles([$admin]);

        Permission::create(['name'=>'Visualizar Ficha Reproducción por Monta Interna'])->syncRoles([$admin]);
        Permission::create(['name'=>'Crear      Ficha Reproducción por Monta Interna'])->syncRoles([$admin]);
        Permission::create(['name'=>'Editar     Ficha Reproducción por Monta Interna'])->syncRoles([$admin]);
        Permission::create(['name'=>'Eliminar   Ficha Reproducción por Monta Interna'])->syncRoles([$admin]);

        Permission::create(['name'=>'Visualizar Ficha de Reproducción Artificial '])->syncRoles([$admin]);
        Permission::create(['name'=>'Crear      Ficha de Reproducción Artificial '])->syncRoles([$admin]);
        Permission::create(['name'=>'Editar     Ficha de Reproducción Artificial '])->syncRoles([$admin]);
        Permission::create(['name'=>'Eliminar   Ficha de Reproducción Artificial '])->syncRoles([$admin]);


        Permission::create(['name'=>'Visualizar Ficha Reproducción Externo '])->syncRoles([$admin]);
        Permission::create(['name'=>'Crear      Fcha Reproducción Externo '])->syncRoles([$admin]);
        Permission::create(['name'=>'Editar     Ficha Reproducción Externo '])->syncRoles([$admin]);
        Permission::create(['name'=>'Eliminar   Ficha Reproducción Exerno '])->syncRoles([$admin]);

      
        Permission::create(['name'=>'Visualizar Control de Vacunación'])->syncRoles([$admin]);
        Permission::create(['name'=>'Crear      Control de Vacunación'])->syncRoles([$admin]);
        Permission::create(['name'=>'Editar     Control de Vacunación'])->syncRoles([$admin]);
        Permission::create(['name'=>'Eliminar   Control de Vacunación'])->syncRoles([$admin]);
        
        Permission::create(['name'=>'Visualizar Control de Peso'])->syncRoles([$admin]);
        Permission::create(['name'=>'Crear      Control de Peso'])->syncRoles([$admin]);
        Permission::create(['name'=>'Editar     Control de Peso'])->syncRoles([$admin]);
        Permission::create(['name'=>'Eliminar   Control de Peso'])->syncRoles([$admin]);


        Permission::create(['name'=>'Visualizar Control de Desparasitación'])->syncRoles([$admin]);
        Permission::create(['name'=>'Crear      Control de Desparasitación'])->syncRoles([$admin]);
        Permission::create(['name'=>'Editar     Control de Desparasitación'])->syncRoles([$admin]);
        Permission::create(['name'=>'Eliminar   Control de Desparasitación'])->syncRoles([$admin]);


        Permission::create(['name'=>'Visualizar Control Preñez'])->syncRoles([$admin]);
        Permission::create(['name'=>'Crear      Control Preñez'])->syncRoles([$admin]);
        Permission::create(['name'=>'Editar     Control Preñez'])->syncRoles([$admin]);
        Permission::create(['name'=>'Eliminar   Control Preñez'])->syncRoles([$admin]);

       
        Permission::create(['name'=>'Visualizar Configuración de Desparacitante'])->syncRoles([$admin]);
        Permission::create(['name'=>'Crear      Configuración de Desparacitante'])->syncRoles([$admin]);
        Permission::create(['name'=>'Editar     Configuración de Desparacitante'])->syncRoles([$admin]);
        Permission::create(['name'=>'Eliminar   Configuración de Desparacitante'])->syncRoles([$admin]);
       
        Permission::create(['name'=>'Visualizar Configuración de Vacunas'])->syncRoles([$admin]);
        Permission::create(['name'=>'Crear      Configuración de Vacunas'])->syncRoles([$admin]);
        Permission::create(['name'=>'Editar     Configuración de Vacunas'])->syncRoles([$admin]);
        Permission::create(['name'=>'Eliminar   Configuración de Vacunas'])->syncRoles([$admin]);
      
        Permission::create(['name'=>'Visualizar Configuración de Vitaminas'])->syncRoles([$admin]);
        Permission::create(['name'=>'Crear      Configuración de Vitaminas'])->syncRoles([$admin]);
        Permission::create(['name'=>'Editar     Configuración de Vitaminas'])->syncRoles([$admin]);
        Permission::create(['name'=>'Eliminar   Configuración de Vitaminas'])->syncRoles([$admin]);
        

        Permission::create(['name'=>'Visualizar Configuración de antibióticos'])->syncRoles([$admin]);
        Permission::create(['name'=>'Crear      Configuración de antibióticos'])->syncRoles([$admin]);
        Permission::create(['name'=>'Editar     Configuración de antibióticos'])->syncRoles([$admin]);
        Permission::create(['name'=>'Eliminar   Configuración de antibióticos'])->syncRoles([$admin]);


        
        Permission::create(['name'=>'Visualizar Configuración de Material Genético'])->syncRoles([$admin]);
        Permission::create(['name'=>'Crear      Configuración de Material Genético'])->syncRoles([$admin]);
        Permission::create(['name'=>'Editar     Configuración de Material Genético'])->syncRoles([$admin]);
        Permission::create(['name'=>'Eliminar   Configuración de Material Genético'])->syncRoles([$admin]);



        Permission::create(['name'=>'Visualizar Configuración de Ubicación Interna'])->syncRoles([$admin]);
        Permission::create(['name'=>'Crear      Configuración de Ubicación Interna'])->syncRoles([$admin]);
        Permission::create(['name'=>'Editar     Configuración de Ubicación Interna'])->syncRoles([$admin]);
        Permission::create(['name'=>'Eliminar   Configuración de Ubicación Interna'])->syncRoles([$admin]);


        Permission::create(['name'=>'Visualizar Configuración de Razas'])->syncRoles([$admin]);
        Permission::create(['name'=>'Crear      Configuración de Razas'])->syncRoles([$admin]);
        Permission::create(['name'=>'Editar     Configuración de Razas'])->syncRoles([$admin]);
        Permission::create(['name'=>'Eliminar   Configuración de Razas'])->syncRoles([$admin]);


        
    }
}
