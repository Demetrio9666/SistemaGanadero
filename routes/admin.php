<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\AnimalesInactivosController;

use App\Http\Controllers\RaceController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DewormerController;
use App\Http\Controllers\VitaminController;
use App\Http\Controllers\VaccineController;
use App\Http\Controllers\AntibioticController;
use App\Http\Controllers\ArtificialReproductionController;
use App\Http\Controllers\File_animaleController;
use App\Http\Controllers\Vaccine_controlController;
use App\Http\Controllers\Weigth_controlController;
use App\Http\Controllers\Deworming_controlController;
use App\Http\Controllers\Pregnancy_controlController;
use App\Http\Controllers\File_partumController;
use App\Http\Controllers\File_treatmentController;
use App\Http\Controllers\File_reproductionMController;  
use App\Http\Controllers\File_reproductionAController;  
use App\Http\Controllers\External_mountController;

Route::get('/dashboard',[HomeController::class,'Dashboard']);

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
  return view('index');
})->name('index_admin');


Route::resource('fichaReproduccionM',File_reproductionMController::class)->names('fichaReproduccionM');
Route::resource('fichaReproduccionEx',External_mountController::class)->names('fichaReproduccionEx');
Route::resource('fichaReproduccionA',File_reproductionAController::class)->names('fichaReproduccionA');
Route::resource('fichaTratamiento',File_treatmentController::class)->names('fichaTratamiento');
Route::resource('fichaParto',File_partumController::class)->names('fichaParto');
Route::resource('controlPrenes',Pregnancy_controlController::class)->names('controlPrenes');
Route::resource('controlDesparasitacion',Deworming_controlController::class)->names('controlDesparasitacion');
Route::resource('controlPeso',Weigth_controlController::class)->names('controlPeso');
Route::resource('controlVacuna',Vaccine_controlController::class)->names('controlVacuna');

Route::resource('fichaAnimal',File_animaleController::class)->names('fichaAnimal');
Route::resource('inactivos/fichaAnimales',AnimalesInactivosController::class)->names('inactivos.fichaAnimales');

Route::resource('confUbicacion',LocationController::class)->names('confUbicacion');
Route::resource('confRaza',RaceController::class)->names('confRaza');
Route::resource('confVi',VitaminController::class)->names('confVi');
Route::resource('confDespa',DewormerController::class)->names('confDespa');
Route::resource('confVacuna',VaccineController::class)->names('confVacuna');
Route::resource('confAnt',AntibioticController::class)->names('confAnt');
Route::resource('confMate',ArtificialReproductionController::class)->names('confMate');
Route::resource('rol',RoleController::class)->names('rol');

//Route::get('/welcome',[HomeController::class,'welcome']);
