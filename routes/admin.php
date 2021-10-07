<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LogController;


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


use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\BusquedaController;


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
use App\Http\Controllers\Admin\ProfielController;


//Route::get('/perfil',[ProfielController::class,'index']);


Route::get('/dashboard',[DashboardController::class,'Dashboard']);
Route::get('/dashboard-reproduccion',[DashboardController::class,'DashboardReproduccion']);
Route::resource('/dashboard-busqueda',BusquedaController::class)->names('dashboard-busqueda');


Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
  return view('index');
})->name('index_admin');


Route::get('actividad-usuario',[logController::class,'index']);

//FICHA ANIMALES
Route::resource('inactivos/fichaAnimales',AnimalesInactivosController::class)->names('inactivos.fichaAnimales');
Route::get('descarga-pdf-fichaAnimal-Inactivos',[AnimalesInactivosController::class,'PDF'])->name('fichaAnimal-I.PDF');
Route::get('exportar-excel-fichaAnimal-Inactivos',[AnimalesInactivosController::class,'Excel']);

Route::resource('fichaAnimal',File_animaleController::class)->names('fichaAnimal');
Route::get('descarga-pdf-fichaAnimal',[File_animaleController::class,'PDF'])->name('fichaAnimal.PDF');
Route::get('exportar-excel-fichaAnimal',[File_animaleController::class,'Excel']);


//FICHA DE PARTOS
Route::resource('inactivos/fichaPartos',PartumInactivosController::class)->names('inactivos.fichaPartos');
Route::get('descarga-pdf-fichaPartos-Inactivos',[PartumInactivosController::class,'PDF'])->name('fichaPartos-I.PDF');
Route::get('exportar-excel-fichaPartos-Inactivos',[PartumInactivosController::class,'Excel']);

Route::resource('fichaParto',File_partumController::class)->names('fichaParto');
Route::get('descarga-pdf-fichaParto',[File_partumController::class,'PDF']);
Route::get('exportar-excel-fichaParto',[File_partumController::class,'Excel']);



//FICHA REPRODUCCION POR MONTA NATURAL INTERNA
Route::resource('inactivos/fichaReproduccionM',ReproductionMInactivosController::class)->names('inactivos.fichaReproduccionM');
Route::get('descarga-pdf-fichaReproduccionM-Inactivos',[ReproductionMInactivosController::class,'PDF'])->name('fichaReproduccionM-I.PDF');
Route::get('exportar-excel-fichaReproduccionM-Inactivos',[ReproductionMInactivosController::class,'Excel']);

Route::resource('fichaReproduccionM',File_reproductionMController::class)->names('fichaReproduccionM');
Route::get('descarga-pdf-fichaReproduccionM',[File_reproductionMController::class,'PDF']);
Route::get('exportar-excel-fichaReproduccionM',[File_reproductionMController::class,'Excel']);


//FICHA DE REPRODUCCION POR MONTA NATURAL EXTERNA
Route::resource('inactivos/fichaReproduccionEx',ReproductionMEInactivosController::class)->names('inactivos.fichaReproduccionEx');
Route::get('descarga-pdf-fichaReproduccionEx-Inactivos',[ReproductionMEInactivosController::class,'PDF'])->name('fichaReproduccionEx-I.PDF');
Route::get('exportar-excel-fichaReproduccionEx-Inactivos',[ReproductionMEInactivosController::class,'Excel']);

Route::resource('fichaReproduccionEx',External_mountController::class)->names('fichaReproduccionEx');
Route::get('descarga-pdf-fichaReproduccionEx',[External_mountController::class,'PDF']);
Route::get('exportar-excel-fichaReproduccionEx',[External_mountController::class,'Excel']);


//FICHA DE REPRODUCCION ARTIFICIAL
Route::resource('inactivos/fichaReproduccionA',ReproductionAInactivosController::class)->names('inactivos.fichaReproduccionA');
Route::get('descarga-pdf-fichaReproduccionA-Inactivos',[ReproductionAInactivosController::class,'PDF'])->name('fichaReproduccionA-I.PDF');
Route::get('exportar-excel-fichaReproduccionA-Inactivos',[ReproductionAInactivosController::class,'Excel']);

Route::resource('fichaReproduccionA',File_reproductionAController::class)->names('fichaReproduccionA');
Route::get('descarga-pdf-fichaReproduccionA',[File_reproductionAController::class,'PDF']);
Route::get('exportar-excel-fichaReproduccionA',[File_reproductionAController::class,'Excel']);


//FICHA DE TRATAMIENTOS
Route::resource('inactivos/fichaTratamientos',TreatmentInactivosController::class)->names('inactivos.fichaTratamientos');
Route::get('descarga-pdf-fichaTratamientos-Inactivos',[TreatmentInactivosController::class,'PDF'])->name('fichaTratamientos-I.PDF');
Route::get('exportar-excel-fichaTratamientos-Inactivos',[TreatmentInactivosController::class,'Excel']);

Route::resource('fichaTratamiento',File_treatmentController::class)->names('fichaTratamiento');
Route::get('descarga-pdf-fichaTratamiento',[File_treatmentController::class,'PDF']);
Route::get('exportar-excel-fichaTratamiento',[File_treatmentController::class,'Excel']);


//CONFI UBICACION
Route::resource('inactivos/Ubicaciones',LocationInactivosController::class)->names('inactivos.Ubicaciones');
Route::get('descarga-pdf-Ubicaciones-Inactivos',[LocationInactivosController::class,'PDF'])->name('Ubicaciones-I.PDF');
Route::get('exportar-excel-Ubicaciones-Inactivos',[LocationInactivosController::class,'Excel']);

Route::resource('confUbicacion',LocationController::class)->names('confUbicacion');
Route::get('descarga-pdf-confUbicacion',[LocationController::class,'PDF']);
Route::get('exportar-excel-confUbicacion',[LocationController::class,'Excel']);

//CONFI RAZAS
Route::resource('inactivos/Razas',RaceInactivosController::class)->names('inactivos.Razas');
Route::get('descarga-pdf-Razas-Inactivos',[RaceInactivosController::class,'PDF'])->name('Razas-I.PDF');
Route::get('exportar-excel-Razas-Inactivos',[RaceInactivosController::class,'Excel']);

Route::resource('confRaza',RaceController::class)->names('confRaza');
Route::get('descarga-pdf-confRaza',[RaceController::class,'PDF']);
Route::get('exportar-excel-confRaza',[RaceController::class,'Excel']);

//CONFI VITAMINAS
Route::resource('inactivos/Vitaminas',VitaminInactivosController::class)->names('inactivos.Vitaminas');
Route::get('descarga-pdf-Vitaminas-Inactivos',[VitaminInactivosController::class,'PDF'])->name('Vitaminas-I.PDF');
Route::get('exportar-excel-Vitaminas-Inactivos',[VitaminInactivosController::class,'Excel']);

Route::resource('confVi',VitaminController::class)->names('confVi');
Route::get('descarga-pdf-confVi',[VitaminController::class,'PDF']);
Route::get('exportar-excel-confVi',[VitaminController::class,'Excel']);

//CONFI DESPARACITANTES
Route::resource('inactivos/Desparasitantes',DewormerInactivosController::class)->names('inactivos.Desparasitantes');
Route::get('descarga-pdf-Desparasitantes-Inactivos',[DewormerInactivosController::class,'PDF'])->name('Desparasitantes-I.PDF');
Route::get('exportar-excel-Desparasitantes-Inactivos',[DewormerInactivosController::class,'Excel']);

Route::resource('confDespa',DewormerController::class)->names('confDespa');
Route::get('descarga-pdf-confDespa',[DewormerController::class,'PDF']);
Route::get('exportar-excel-confDespa',[DewormerController::class,'Excel']);

//CONFI DE VACUNAS
Route::resource('inactivos/Vacunas',VaccineInactivosController::class)->names('inactivos.Vacunas');
Route::get('descarga-pdf-Vacunas-Inactivos',[VaccineInactivosController::class,'PDF'])->name('Vacunas-I.PDF');
Route::get('exportar-excel-Vacunas-Inactivos',[VaccineInactivosController::class,'Excel']);

Route::resource('confVacuna',VaccineController::class)->names('confVacuna');
Route::get('descarga-pdf-confVacuna',[VaccineController::class,'PDF']);
Route::get('exportar-excel-confVacuna',[VaccineController::class,'Excel']);


//CONFI DE ANTIBIOTICOS
Route::resource('inactivos/Antibioticos',AntibioticInactivosController::class)->names('inactivos.Antibioticos');
Route::get('descarga-pdf-Antibioticos-Inactivos',[AntibioticInactivosController::class,'PDF'])->name('Antibioticos-I.PDF');
Route::get('exportar-excel-Antibioticos-Inactivos',[AntibioticInactivosController::class,'Excel']);

Route::resource('confAnt',AntibioticController::class)->names('confAnt');
Route::get('descarga-pdf-confAnt',[AntibioticController::class,'PDF']);
Route::get('exportar-excel-confAnt',[AntibioticController::class,'Excel']);


//CONFI DE MATERIALES GENETICOS
Route::resource('inactivos/Materiales',ArtificialInactivosController::class)->names('inactivos.Materiales');
Route::get('descarga-pdf-Materiales-Inactivos',[ArtificialInactivosController::class,'PDF'])->name('Materiales-I.PDF');
Route::get('exportar-excel-Materiales-Inactivos',[ArtificialInactivosController::class,'Excel']);

Route::resource('confMate',ArtificialReproductionController::class)->names('confMate');
Route::get('descarga-pdf-confMate',[ArtificialReproductionController::class,'PDF']);
Route::get('exportar-excel-confMate',[ArtificialReproductionController::class,'Excel']);

//CONTROL DE PREÑES
Route::resource('inactivos/controlPrenes',PregnancyControlInactivosController::class)->names('inactivos.controlPrenes');
Route::get('descarga-pdf-controlPrenes-Inactivos',[PregnancyControlInactivosController::class,'PDF'])->name('controlPrenes-I.PDF');
Route::get('exportar-excel-controlPrenes-Inactivos',[PregnancyControlInactivosController::class,'Excel']);

Route::resource('controlPrenes',Pregnancy_controlController::class)->names('controlPrenes');
Route::get('descarga-pdf-controlPrenes',[Pregnancy_controlController::class,'PDF']);
Route::get('exportar-excel-controlPrenes',[Pregnancy_controlController::class,'Excel']);


//CONTROL DE DESPARACITACION
Route::resource('inactivos/controlDesparasitaciones',DewormingControlInactivosController::class)->names('inactivos.controlDesparasitaciones');
Route::get('descarga-pdf-controlDesparasitaciones-Inactivos',[DewormingControlInactivosController::class,'PDF'])->name('controlDesparasitaciones-I.PDF');
Route::get('exportar-excel-controlDesparasitaciones-Inactivos',[DewormingControlInactivosController::class,'Excel']);

Route::resource('controlDesparasitacion',Deworming_controlController::class)->names('controlDesparasitacion');
Route::get('descarga-pdf-controlDesparasitacion',[Deworming_controlController::class,'PDF']);
Route::get('exportar-excel-controlDesparasitacion',[Deworming_controlController::class,'Excel']);


//CONTROL DE PESO
Route::resource('inactivos/controlPesos',WeigthInactivosController::class)->names('inactivos.controlPesos');
Route::get('descarga-pdf-controlPesos-Inactivos',[WeigthInactivosController::class,'PDF'])->name('controlPesos-I.PDF');
Route::get('exportar-excel-controlPesos-Inactivos',[WeigthInactivosController::class,'Excel']);

Route::resource('controlPeso',Weigth_controlController::class)->names('controlPeso');
Route::get('descarga-pdf-controlPeso',[Weigth_controlController::class,'PDF']);
Route::get('exportar-excel-controlPeso',[Weigth_controlController::class,'Excel']);

//CONTROL DE VACUNAS
Route::resource('inactivos/controlVacunas',VaccineControlInactivosController::class)->names('inactivos.controlVacunas');
Route::get('descarga-pdf-controlVacunas-Inactivos',[VaccineControlInactivosController::class,'PDF'])->name('controlVacunas-I.PDF');
Route::get('exportar-excel-controlVacunas-Inactivos',[VaccineControlInactivosController::class,'Excel']);


Route::resource('controlVacuna',Vaccine_controlController::class)->names('controlVacuna');
Route::get('descarga-pdf-controlVacuna',[Vaccine_controlController::class,'PDF']);
Route::get('exportar-excel-controlVacuna',[Vaccine_controlController::class,'Excel']);
Route::post('buscar-animal',[Vaccine_controlController::class,'Buscar'])->name('buscar-animal');

//SEGURIDAD
Route::resource('rol',RoleController::class)->names('rol');
Route::resource('usuarios',UserController::class)->names('usuarios');




