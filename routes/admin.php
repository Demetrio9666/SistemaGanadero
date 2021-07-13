<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
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
  return view('admin.index');
})->name('index_admin');


Route::resource('/confAnimalExterno',External_mountController::class);

Route::resource('/fichaReproduccionM',File_reproductionMController::class);
Route::resource('/fichaReproduccionA',File_reproductionAController::class);

Route::resource('/fichaTratamiento',File_treatmentController::class);
Route::resource('/fichaParto',File_partumController::class);
Route::resource('/controlPrenes',Pregnancy_controlController::class);
Route::resource('/controlDesparasitacion',Deworming_controlController::class);
Route::resource('/controlPeso',Weigth_controlController::class);
Route::resource('/controlVacuna',Vaccine_controlController::class);
Route::resource('/fichaAnimal',File_animaleController::class);
Route::resource('/confUbicacion',LocationController::class);
Route::resource('/confRaza',RaceController::class);
Route::resource('/confVi',VitaminController::class);
Route::resource('/confDespa',DewormerController::class);
Route::resource('/confVacuna',VaccineController::class);
Route::resource('/confAnt',AntibioticController::class);
Route::resource('/confMate',ArtificialReproductionController::class);


//Route::get('/welcome',[HomeController::class,'welcome']);
