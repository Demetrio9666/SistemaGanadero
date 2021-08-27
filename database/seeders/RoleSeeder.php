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
        $admin = Role::create(['rol'=>'ADMINISTRADOR']);
        $supervisor = Role::create(['rol'=>'SUPERVISOR']);
        $invitado = Role::create(['rol'=>'INVITADO']);


       
        Permission::create(['name'=>'fichaAnimal.index',
                           'description'=>'Visualizar Ficha de Animales'])->syncRoles([$admin]);

        Permission::create(['name'=>'fichaAnimal.create',
                           'description'=>'Crear Ficha de Animales'])->syncRoles([$admin]);
     
        Permission::create(['name'=>'fichaAnimal.edit',
                           'description'=>'Editar Ficha de Animales'])->syncRoles([$admin]);
      
        Permission::create(['name'=>'fichaAnimal.destroy',
                           'description'=>'Eliminar Ficha de Animales'])->syncRoles([$admin]);
        
       
        //////////////////////////////////////////////////////////////////////////////
        Permission::create(['name'=>'fichaParto.index',
                           'description'=>'Visualizar Ficha de Parto'])->syncRoles([$admin]);
        
        Permission::create(['name'=>'fichaParto.create',
                           'description'=>'Crear Ficha de Parto'])->syncRoles([$admin]);
        
        Permission::create(['name'=>'fichaParto.edit',
                           'description'=>'Editar Ficha de Parto'])->syncRoles([$admin]);
        
        Permission::create(['name'=>'fichaParto.destroy',
                           'description'=>'Eliminar Ficha de Parto'])->syncRoles([$admin]);
    
        //////////////////////////////////////////////////////////////////////////////

        Permission::create(['name'=>'fichaTratamiento.index',
                           'description'=>'Visualizar Ficha de Tratamiento'])->syncRoles([$admin,$supervisor]);
    
        Permission::create(['name'=>'fichaTratamiento.create',
                           'description'=>'Crear Ficha de Tratamiento'])->syncRoles([$admin,$supervisor]);
        
        Permission::create(['name'=>'fichaTratamiento.edit',
                           'description'=>'Editar Ficha de Tratamiento'])->syncRoles([$admin,$supervisor]);
        

        Permission::create(['name'=>'fichaTratamiento.destroy',
                           'description'=>'Eliminar Ficha de Tratamiento'])->syncRoles([$admin,$supervisor]);
        
        //////////////////////////////////////////////////////////////////////////////

        
        Permission::create(['name'=>'fichaReproduccionM.index',
                           'description'=>'Visualizar Ficha Reproducción por Monta Interna'])->syncRoles([$admin,$supervisor,$invitado]);
    

        Permission::create(['name'=>'fichaReproduccionM.create',
                           'description'=>'Crear Ficha Reproducción por Monta Interna'])->syncRoles([$admin,$supervisor,$invitado]);
        

        Permission::create(['name'=>'fichaReproduccionM.edit',
                           'description'=>'Editar Ficha Reproducción por Monta Interna'])->syncRoles([$admin,$supervisor,$invitado]);
        

        Permission::create(['name'=>'fichaReproduccionM.destroy',
                           'description'=>'Eliminar Ficha Reproducción por Monta Interna'])->syncRoles([$admin,$supervisor,$invitado]);
        


        ///////////////////////////////////////////////////////////////////////////////

        Permission::create(['name'=>'fichaReproduccionA.index',
                           'description'=>'Visualizar Ficha de Reproducción Artificial'])->syncRoles([$admin,$supervisor,$invitado]);

        Permission::create(['name'=>'fichaReproduccionA.create',
                           'description'=>'Crear Ficha de Reproducción Artificial'])->syncRoles([$admin,$supervisor,$invitado]);

        Permission::create(['name'=>'fichaReproduccionA.edit',
                           'description'=>'Editar Ficha de Reproducción Artificial'])->syncRoles([$admin,$supervisor,$invitado]);

        Permission::create(['name'=>'fichaReproduccionA.destroy',
                           'description'=>'Eliminar Ficha de Reproducción Artificial'])->syncRoles([$admin,$supervisor,]);
       /////////////////////////////////////////////////////////////////////////////////

        Permission::create(['name'=>'fichaReproduccionEx.index',
                           'description'=>'Visualizar Ficha Reproducción Externo'])->syncRoles([$admin,$supervisor,$invitado]);
        

        Permission::create(['name'=>'fichaReproduccionEx.create',
                           'description'=>'Crear Ficha Reproducción Externo'])->syncRoles([$admin,$supervisor,$invitado]);
        

        Permission::create(['name'=>'fichaReproduccionEx.edit',
                           'description'=>'Editar Ficha Reproducción Externo'])->syncRoles([$admin,$supervisor,$invitado]);
        

        Permission::create(['name'=>'fichaReproduccionEx.destroy',
                           'description'=>'Eliminar Ficha Reproducción Exerno'])->syncRoles([$admin,$supervisor]);
        
        ////////////////////////////////////////////////////////////////////////////////
      
        Permission::create(['name'=>'controlVacuna.index',
                           'description'=>'Visualizar Control de Vacunación'])->syncRoles([$admin,$supervisor]);
        

        Permission::create(['name'=>'controlVacuna.create',
                           'description'=>'Crear Control de Vacunación'])->syncRoles([$admin,$supervisor]);
        

        Permission::create(['name'=>'controlVacuna.edit',
                           'description'=>'Editar Control de Vacunación'])->syncRoles([$admin,$supervisor]);
        

        Permission::create(['name'=>'controlVacuna.destroy',
                           'description'=>'Eliminar Control de Vacunación'])->syncRoles([$admin,$supervisor]);
        


        ////////////////////////////////////////////////////////////////////////////////
        Permission::create(['name'=>'controlPeso.index',
                            'description'=>'Visualizar Control de Peso'])->syncRoles([$admin,$supervisor,$invitado]);

        Permission::create(['name'=>'controlPeso.create',
                            'description'=>'Crear Control de Peso'])->syncRoles([$admin,$supervisor,$invitado]);

        Permission::create(['name'=>'controlPeso.edit',
                            'description'=>'Editar Control de Peso'])->syncRoles([$admin,$supervisor,$invitado]);

        Permission::create(['name'=>'controlPeso.destroy',
                            'description'=>'Eliminar Control de Peso'])->syncRoles([$admin,$supervisor,$invitado]);

        ////////////////////////////////////////////////////////////////////////////////
        Permission::create(['name'=>'controlDesparasitacion.index',
                            'description'=>'Visualizar Control de Desparasitación'])->syncRoles([$admin,$supervisor]);

        Permission::create(['name'=>'controlDesparasitacion.create',
                            'description'=>'Crear Control de Desparasitación'])->syncRoles([$admin,$supervisor]);

        Permission::create(['name'=>'controlDesparasitacion.edit',
                            'description'=>'Editar Control de Desparasitación'])->syncRoles([$admin,$supervisor]);

        Permission::create(['name'=>'controlDesparasitacion.destroy',
                            'description'=>'Eliminar Control de Desparasitación'])->syncRoles([$admin,$supervisor]);
        ///////////////////////////////////////////////////////////////////////////////


        Permission::create(['name'=>'controlPrenes.index',
                            'description'=>'Visualizar Control Preñez'])->syncRoles([$admin,$supervisor]);

        Permission::create(['name'=>'controlPrenes.create',
                            'description'=>'Crear Control Preñez'])->syncRoles([$admin,$supervisor]);

        Permission::create(['name'=>'controlPrenes.edit',
                            'description'=>'Editar Control Preñez'])->syncRoles([$admin,$supervisor]);

        Permission::create(['name'=>'controlPrenes.destroy',
                            'description'=>'Eliminar Control Preñez'])->syncRoles([$admin,$supervisor]);

       /////////////////////////////////////////////////////////////////////////////////

        Permission::create(['name'=>'confDespa.index',
                            'description'=>'Visualizar Configuración de Desparacitante'])->syncRoles([$admin,$supervisor]);

        Permission::create(['name'=>'confDespa.create',
                            'description'=>'Crear Configuración de Desparacitante'])->syncRoles([$admin,$supervisor]);

        Permission::create(['name'=>'confDespa.edit',
                            'description'=>'Editar Configuración de Desparacitante'])->syncRoles([$admin,$supervisor]);

        Permission::create(['name'=>'confDespa.destroy',
                            'description'=>'Eliminar Configuración de Desparacitante'])->syncRoles([$admin,$supervisor]);
        /////////////////////////////////////////////////////////////////////////////////

        Permission::create(['name'=>'confVacuna.index',
                            'description'=>'Visualizar Configuración de Vacunas'])->syncRoles([$admin,$supervisor]);

        Permission::create(['name'=>'confVacuna.create',
                            'description'=>'Crear Configuración de Vacunas'])->syncRoles([$admin,$supervisor]);

        Permission::create(['name'=>'confVacuna.edit',
                            'description'=>'Editar Configuración de Vacunas'])->syncRoles([$admin,$supervisor]);

        Permission::create(['name'=>'confVacuna.destroy',
                            'description'=>'Eliminar Configuración de Vacunas'])->syncRoles([$admin,$supervisor]);
        ///////////////////////////////////////////////////////////////////////////////////

        Permission::create(['name'=>'confVi.index',
                            'description'=>'Visualizar Configuración de Vitaminas'])->syncRoles([$admin,$supervisor]);

        Permission::create(['name'=>'confVi.create',
                            'description'=>'Crear Configuración de Vitaminas'])->syncRoles([$admin,$supervisor]);

        Permission::create(['name'=>'confVi.edit',
                            'description'=>'Editar Configuración de Vitaminas'])->syncRoles([$admin,$supervisor]);

        Permission::create(['name'=>'confVi.destroy',
                            'description'=>'Eliminar Configuración de Vitaminas'])->syncRoles([$admin,$supervisor]);
        
        //////////////////////////////////////////////////////////////////////////////////
        Permission::create(['name'=>'confAnt.index',
                            'description'=>'Visualizar Configuración de antibióticos'])->syncRoles([$admin,$supervisor]);

        Permission::create(['name'=>'confAnt.create',
                            'description'=>'Crear Configuración de antibióticos'])->syncRoles([$admin,$supervisor]);

        Permission::create(['name'=>'confAnt.edit',
                            'description'=>'Editar Configuración de antibióticos'])->syncRoles([$admin,$supervisor]);

        Permission::create(['name'=>'confAnt.destroy',
                            'description'=>'Eliminar Configuración de antibióticos'])->syncRoles([$admin,$supervisor]);

        //////////////////////////////////////////////////////////////////////////////////
        
        Permission::create(['name'=>'confMate.index',
                            'description'=>'Visualizar Configuración de Material Genético'])->syncRoles([$admin,$supervisor]);

        Permission::create(['name'=>'confMate.create',
                            'description'=>'Crear Configuración de Material Genético'])->syncRoles([$admin,$supervisor]);

        Permission::create(['name'=>'confMate.edit',
                            'description'=>'Editar Configuración de Material Genético'])->syncRoles([$admin,$supervisor]);

        Permission::create(['name'=>'confMate.destroy',
                            'description'=>'Eliminar Configuración de Material Genético'])->syncRoles([$admin,$supervisor]);


        ///////////////////////////////////////////////////////////////////////////////////
        Permission::create(['name'=>'confUbicacion.index',
                            'description'=>'Visualizar Configuración de Ubicación Interna'])->syncRoles([$admin]);

        Permission::create(['name'=>'confUbicacion.create',
                            'description'=>'Crear Configuración de Ubicación Interna'])->syncRoles([$admin]);

        Permission::create(['name'=>'confUbicacion.edit',
                            'description'=>'Editar Configuración de Ubicación Interna'])->syncRoles([$admin]);

        Permission::create(['name'=>'confUbicacion.destroy',
                            'description'=>'Eliminar Configuración de Ubicación Interna'])->syncRoles([$admin]);

        /////////////////////////////////////////////////////////////////////////////////////
        Permission::create(['name'=>'confRaza.index',
                            'description'=>'Visualizar Configuración de Razas'])->syncRoles([$admin]);

        Permission::create(['name'=>'confRaza.create',
                            'description'=>'Crear Configuración de Razas'])->syncRoles([$admin]);

        Permission::create(['name'=>'confRaza.edit',
                            'description'=>'Editar Configuración de Razas'])->syncRoles([$admin]);

        Permission::create(['name'=>'confRaza.destroy',
                            'description'=>'Eliminar Configuración de Razas'])->syncRoles([$admin]);

        ///////////////////////////////////////////////////////////////////////////////////

        Permission::create(['name'=>'dashboard.index',
                            'description'=>'Visualizar Dashboards'])->syncRoles([$admin,$supervisor]);
        //////////////////////////////////////////////////////////////////////////////////


        ////////////////////////////////////////////////////////////////////////// 
        Permission::create(['name'=>'rol.index',
                            'description'=>'Visualizar Roles'])->syncRoles([$admin]);

        Permission::create(['name'=>'rol.create',
                            'description'=>'Crear Roles'])->syncRoles([$admin]);

        Permission::create(['name'=>'rol.edit',
                            'description'=>'Editar Roles'])->syncRoles([$admin]);

        Permission::create(['name'=>'rol.destroy',
                            'description'=>'Eliminar Roles'])->syncRoles([$admin]);

        Permission::create(['name'=>'rol.usuario.edit',
                            'description'=>'Editar Asignación de Roles a Usuarios'])->syncRoles([$admin]);

        
        Permission::create(['name'=>'usuarios.index',
                            'description'=>'Visualizar Usuarios'])->syncRoles([$admin]);

        Permission::create(['name'=>'usuarios.create',
                            'description'=>'Crear Usuarios'])->syncRoles([$admin]);

        Permission::create(['name'=>'usuarios.edit',
                            'description'=>'Editar Usuarios'])->syncRoles([$admin]);

        Permission::create(['name'=>'usuarios.destroy',
                            'description'=>'Eliminar Usuarios'])->syncRoles([$admin]);

        Permission::create(['name'=>'actividad.index',
                            'description'=>'Visualizar Actividad de Usuario'])->syncRoles([$admin]);

       
        
    }
}
