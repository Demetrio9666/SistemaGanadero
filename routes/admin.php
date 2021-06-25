<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DewormerController;
use App\Http\Controllers\VitaminController;
use App\Http\Controllers\VaccineController;
use App\Http\Controllers\AntibioticController;

//Route::get('/',[HomeController::class,'welcome']);



Route::get('/dashboard',[HomeController::class,'Dashboard']);

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
  return view('admin.index');
})->name('index_admin');

Route::get('/fichaAnimal',[HomeController::class,'Registro_Animal']);
Route::get('/fichaParto',[HomeController::class,'Registro_Parto']);
Route::get('/fichaTratamiento',[HomeController::class,'Registro_Tratamiento']);
Route::get('/fichaReproduccion',[HomeController::class,'Registro_Reproduccion']);


Route::get('/controlDesparasitacion',[HomeController::class,'Control_Despara']);
Route::get('/controlPeso',[HomeController::class,'Control_Peso']);
Route::get('/controlPrenes',[HomeController::class,'Control_Prenes']);
Route::get('/controlVacuna',[HomeController::class,'Control_Vacuna']);


Route::get('/confVacuna',[HomeController::class,'Conf_Vacuna']);
//Route::get('/confUbicacion',[HomeController::class,'Conf_Ubicacion']);
//Route::get('/confDespa',[HomeController::class,'Conf_Desparacitante']);
//Route::get('/confVi',[HomeController::class,'Conf_Vitamina']);
Route::get('/confMate',[HomeController::class,'Conf_Pajuela']);
Route::get('/confAnt',[HomeController::class,'Conf_Antibiotico']);




Route::resource('/confUbicacion',LocationController::class);
Route::resource('/confRaza',RaceController::class);
Route::resource('/confVi',VitaminController::class);
Route::resource('/confDespa',DewormerController::class);
//Route::resource('/confVi',VaccineController::class);
//Route::resource('/confAnt',AntibioticController::class);




//Route::get('/confRaza',[RazaController::class,'index'])->name('vista_principal');
//Route::get('/confRaza/create',[RazaController::class,'create'])->name('formulario');
//Route::post('/confRaza', [RazaController::class,'store'])->name('Raza_store'); //enviar datos bd
//Route::get('/confRaza/{id}',[RazaController::class,'show'])->name('Raza_show');
//Route::get('/confRaza/{raza}/edit',[RazaController::class,'edit'])->name('Raza_edit');
//Route::put('/confRaza/{id}',[RazaController::class,'edit'])->name('Raza_edit');

//Route::resource('/confRaza', [RaceController::class]);


//Route::get('/confRaza',[RaceController::class,'index'])->name('vista_principal');
//Route::get('/confRaza/create',[RaceController::class,'create'])->name('formulario');
//Route::post('/confRaza', [RaceController::class,'store'])->name('Raza_store'); //enviar datos bd
//Route::get('/confRaza/{id}',[RaceController::class,'show'])->name('Raza_show');
//Route::get('/confRaza/{raza}/edit',[RaceController::class,'edit'])->name('Raza_edit');




//Route::get('/tabla_',[HomeController::class,'Tabla_Parto_R']);

//Route::get('/welcome',[HomeController::class,'welcome']);
