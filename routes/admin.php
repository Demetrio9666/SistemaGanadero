<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;


use App\Http\Controllers\Inactivo\AnimalesInactivosController;
use App\Http\Controllers\Inactivo\ReproductionMInactivosController;
use App\Http\Controllers\Inactivo\ReproductionMEInactivosController;
use App\Http\Controllers\Inactivo\ReproductionAInactivosController;
use App\Http\Controllers\Inactivo\TreatmentInactivosController;
use App\Http\Controllers\Inactivo\PartumInactivosController;
use App\Http\Controllers\Inactivo\LocationInactivosController;
use App\Http\Controllers\Inactivo\RaceInactivosController;
use App\Http\Controllers\Inactivo\VitaminInactivosController;
use App\Http\Controllers\Inactivo\DewormerInactivosController;
use App\Http\Controllers\Inactivo\VaccineInactivosController;
use App\Http\Controllers\Inactivo\AntibioticInactivosController;
use App\Http\Controllers\Inactivo\ArtificialInactivosController;
use App\Http\Controllers\Inactivo\PregnancyControlInactivosController;
use App\Http\Controllers\Inactivo\DewormingControlInactivosController;
use App\Http\Controllers\Inactivo\WeigthInactivosController;
use App\Http\Controllers\Inactivo\VaccineControlInactivosController;


use App\Http\Controllers\PDF\PDFController;



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


Route::resource('fichaAnimal',File_animaleController::class)->names('fichaAnimal');
Route::resource('inactivos/fichaAnimales',AnimalesInactivosController::class)->names('inactivos.fichaAnimales');
Route::get('descarga-pdf',[File_animaleController::class,'PDF']);
Route::get('exportar-excel',[File_animaleController::class,'Excel']);





Route::resource('fichaReproduccionM',File_reproductionMController::class)->names('fichaReproduccionM');
Route::resource('inactivos/fichaReproduccionM',ReproductionMInactivosController::class)->names('inactivos.fichaReproduccionM');

Route::resource('fichaReproduccionEx',External_mountController::class)->names('fichaReproduccionEx');
Route::resource('inactivos/fichaReproduccionEx',ReproductionMEInactivosController::class)->names('inactivos.fichaReproduccionEx');

Route::resource('fichaReproduccionA',File_reproductionAController::class)->names('fichaReproduccionA');
Route::resource('inactivos/fichaReproduccionA',ReproductionAInactivosController::class)->names('inactivos.fichaReproduccionA');

Route::resource('fichaTratamiento',File_treatmentController::class)->names('fichaTratamiento');
Route::resource('inactivos/fichaTratamientos',TreatmentInactivosController::class)->names('inactivos.fichaTratamientos');

Route::resource('fichaParto',File_partumController::class)->names('fichaParto');
Route::resource('inactivos/fichaPartos',PartumInactivosController::class)->names('inactivos.fichaPartos');


Route::resource('confUbicacion',LocationController::class)->names('confUbicacion');
Route::resource('inactivos/Ubicaciones',LocationInactivosController::class)->names('inactivos.Ubicaciones');


Route::resource('confRaza',RaceController::class)->names('confRaza');
Route::resource('inactivos/Razas',RaceInactivosController::class)->names('inactivos.Razas');

Route::resource('confVi',VitaminController::class)->names('confVi');
Route::resource('inactivos/Vitaminas',VitaminInactivosController::class)->names('inactivos.Vitaminas');

Route::resource('confDespa',DewormerController::class)->names('confDespa');
Route::resource('inactivos/Desparasitantes',DewormerInactivosController::class)->names('inactivos.Desparasitantes');


Route::resource('confVacuna',VaccineController::class)->names('confVacuna');
Route::resource('inactivos/Vacunas',VaccineInactivosController::class)->names('inactivos.Vacunas');


Route::resource('confAnt',AntibioticController::class)->names('confAnt');
Route::resource('inactivos/Antibioticos',AntibioticInactivosController::class)->names('inactivos.Antibioticos');


Route::resource('confMate',ArtificialReproductionController::class)->names('confMate');
Route::resource('inactivos/Materiales',ArtificialInactivosController::class)->names('inactivos.Materiales');


Route::resource('controlPrenes',Pregnancy_controlController::class)->names('controlPrenes');
Route::resource('inactivos/controlPrenes',PregnancyControlInactivosController::class)->names('inactivos.controlPrenes');

Route::resource('controlDesparasitacion',Deworming_controlController::class)->names('controlDesparasitacion');
Route::resource('inactivos/controlDesparasitaciones',DewormingControlInactivosController::class)->names('inactivos.controlDesparasitaciones');

Route::resource('controlPeso',Weigth_controlController::class)->names('controlPeso');
Route::resource('inactivos/controlPesos',WeigthInactivosController::class)->names('inactivos.controlPesos');

Route::resource('controlVacuna',Vaccine_controlController::class)->names('controlVacuna');
Route::resource('inactivos/controlVacunas',VaccineControlInactivosController::class)->names('inactivos.controlVacunas');



Route::resource('rol',RoleController::class)->names('rol');
Route::resource('usuarios',UserController::class)->names('usuarios');


//Route::get('/welcome',[HomeController::class,'welcome']);
