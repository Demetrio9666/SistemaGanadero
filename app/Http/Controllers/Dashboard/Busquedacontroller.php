<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\File_Animale;
use App\Models\Location;
use App\Models\Race;
use App\Models\File_reproduction_artificial;
use App\Models\Artificial_Reproduction;
use App\Models\File_reproduction_internal;
use App\Models\File_reproduction_external;

class Busquedacontroller extends Controller
{
    public function index()
    {
       
        return view('dashboard.busqueda');
    }

    public function store(Request $request){
        if($request->buscar == ""){
            return view('mensajes.buscar.buscar');
        }
        $buscar= $request->buscar;
                $animal = DB::table('file_animale')
                ->leftJoin('race','file_animale.race_id','=','race.id')
                ->leftJoin('location','file_animale.location_id','=','location.id')
                ->select('file_animale.id','file_animale.animalCode','file_animale.url','file_animale.date','race.race_d as raza',
                        'file_animale.sex','file_animale.stage','file_animale.source','file_animale.age_month',
                        'file_animale.health_condition','file_animale.gestation_state','file_animale.actual_state','location.location_d as ubicacion'
                        ,'file_animale.conceived')
                       
                ->get();
        $existe = DB::table('file_animale')
                ->select('animalCode')
                ->where('animalCode','=',$buscar)
                ->count();
        if($existe == 0){
            return view('mensajes.buscar.noExiste');
        }

                $par = DB::table('file_partum')
                    ->join('file_animale','file_partum.animalCode_id','=','file_animale.id')
                    ->select('file_partum.id',
                            'file_partum.date',
                            'file_animale.animalCode as animal',
                            'file_partum.male',
                            'file_partum.female',
                            'file_partum.dead',
                            'file_partum.mother_status',
                            'file_partum.partum_type',
                            'file_partum.actual_state'
                            )->where('animalCode','LIKE',$buscar)->count();

                $re_A_exitoso = DB::table('file_reproduction_artificial')
                ->join('file_animale','file_reproduction_artificial.animalCode_id_m','=','file_animale.id')
                ->select('file_reproduction_artificial.id',
                        'file_animale.animalCode as animalA',
                        'file_reproduction_artificial.reproduction_state',
                        'file_reproduction_artificial.actual_state'
                        )
                        ->where('file_reproduction_artificial.reproduction_state','=','EXITOSO')
                        ->where('animalCode','LIKE',$buscar)->count();
                $re_A_fallido = DB::table('file_reproduction_artificial')
                ->join('file_animale','file_reproduction_artificial.animalCode_id_m','=','file_animale.id')
                ->select('file_reproduction_artificial.id',
                        'file_animale.animalCode as animalA',
                        'file_reproduction_artificial.reproduction_state',
                        'file_reproduction_artificial.actual_state'
                        )
                        ->where('file_reproduction_artificial.reproduction_state','=','FALLIDO')
                        ->where('animalCode','LIKE',$buscar)->count();
                $re_A_espera = DB::table('file_reproduction_artificial')
                    ->join('file_animale','file_reproduction_artificial.animalCode_id_m','=','file_animale.id')
                    ->select('file_reproduction_artificial.id',
                            'file_animale.animalCode as animalA',
                            'file_reproduction_artificial.reproduction_state',
                            'file_reproduction_artificial.actual_state'
                            )
                            ->where('file_reproduction_artificial.reproduction_state','=','ESPERA')
                            ->where('animalCode','LIKE',$buscar)->count();
                        
                $data2 = [$re_A_exitoso,$re_A_fallido,$re_A_espera];

                $datas2  = json_encode($data2);


                $pajuela = DB::table('file_reproduction_artificial')
                    ->join('file_animale','file_reproduction_artificial.animalCode_id_m','=','file_animale.id')
                    ->leftJoin('artificial_reproduction','file_reproduction_artificial.artificial_id','=','artificial_reproduction.id')
                    ->leftJoin('race as f','file_animale.race_id','=','f.id')
                    ->leftJoin('race as a','artificial_reproduction.race_id','=','a.id')
                    ->select('file_reproduction_artificial.id',
                            'file_reproduction_artificial.date as fecha_A',
                            'file_animale.animalCode as animalA',
                            'f.race_d as raza_h',  
                            'artificial_reproduction.reproduccion as tipo', 
                            'a.race_d as raza_m',
                            'file_reproduction_artificial.reproduction_state',
                            'file_reproduction_artificial.actual_state'
                            )
                            ->where('reproduccion','=','PAJUELA')
                            ->where('animalCode','LIKE',$buscar)->count();
                

                $hembrional = DB::table('file_reproduction_artificial')
                    ->join('file_animale','file_reproduction_artificial.animalCode_id_m','=','file_animale.id')
                    ->leftJoin('artificial_reproduction','file_reproduction_artificial.artificial_id','=','artificial_reproduction.id')
                    ->leftJoin('race as f','file_animale.race_id','=','f.id')
                    ->leftJoin('race as a','artificial_reproduction.race_id','=','a.id')
                    ->select('file_reproduction_artificial.id',
                            'file_reproduction_artificial.date as fecha_A',
                            'file_animale.animalCode as animalA',
                            'f.race_d as raza_h',  
                            'artificial_reproduction.reproduccion as tipo', 
                            'a.race_d as raza_m',
                            'file_reproduction_artificial.reproduction_state',
                            'file_reproduction_artificial.actual_state'
                            )
                            ->where('reproduccion','=','HEMBRIONAL')
                            ->where('animalCode','LIKE',$buscar)->count();
                
                $data3 = [$pajuela,$hembrional];

                $datas3  = json_encode($data3);
            
            $re_MI_exitoso = DB::table('file_reproduction_internal')
                ->join('file_animale as M','file_reproduction_internal.animalCode_id_m','=','M.id')
                ->join('file_animale as P','file_reproduction_internal.animalCode_id_p','=','P.id')
                ->join('race as RM','M.race_id','=','RM.id')
                ->join('race as RP','P.race_id','=','RP.id')
                ->select('file_reproduction_internal.id',
                            'file_reproduction_internal.date as fecha_MI',
                            'M.animalCode as animal_h_MI',
                            'RM.race_d as raza_h_MI',
                            'M.sex as sexo_h',
                            'M.age_month as edad_h',
                            'P.animalCode as animal_m_MI',
                            'RP.race_d as raza_m_MI',
                            'P.sex as sexo_m',
                            'P.age_month as edad_m',
                            'file_reproduction_internal.reproduction_state',
                            'file_reproduction_internal.actual_state'
                        )->where('reproduction_state','=','EXITOSO')
                        ->where('M.animalCode','LIKE',$buscar)->count();
            
            $re_MI_espera = DB::table('file_reproduction_internal')
                ->join('file_animale as M','file_reproduction_internal.animalCode_id_m','=','M.id')
                ->join('file_animale as P','file_reproduction_internal.animalCode_id_p','=','P.id')
                ->join('race as RM','M.race_id','=','RM.id')
                ->join('race as RP','P.race_id','=','RP.id')
                ->select('file_reproduction_internal.id',
                            'file_reproduction_internal.date as fecha_MI',
                            'M.animalCode as animal_h_MI',
                            'RM.race_d as raza_h_MI',
                            'M.sex as sexo_h',
                            'M.age_month as edad_h',
                            'P.animalCode as animal_m_MI',
                            'RP.race_d as raza_m_MI',
                            'P.sex as sexo_m',
                            'P.age_month as edad_m',
                            'file_reproduction_internal.reproduction_state',
                            'file_reproduction_internal.actual_state'
                        )->where('reproduction_state','=','ESPERA')
                        ->where('M.animalCode','LIKE',$buscar)->count();

            $re_MI_fallido = DB::table('file_reproduction_internal')
                ->join('file_animale as M','file_reproduction_internal.animalCode_id_m','=','M.id')
                ->join('file_animale as P','file_reproduction_internal.animalCode_id_p','=','P.id')
                ->join('race as RM','M.race_id','=','RM.id')
                ->join('race as RP','P.race_id','=','RP.id')
                ->select('file_reproduction_internal.id',
                            'file_reproduction_internal.date as fecha_MI',
                            'M.animalCode as animal_h_MI',
                            'RM.race_d as raza_h_MI',
                            'M.sex as sexo_h',
                            'M.age_month as edad_h',
                            'P.animalCode as animal_m_MI',
                            'RP.race_d as raza_m_MI',
                            'P.sex as sexo_m',
                            'P.age_month as edad_m',
                            'file_reproduction_internal.reproduction_state',
                            'file_reproduction_internal.actual_state'
                        )->where('reproduction_state','=','FALLIDO')
                        ->where('M.animalCode','LIKE',$buscar)->count();
            
            $data4 = [$re_MI_exitoso,$re_MI_espera,$re_MI_fallido];

            $datas4  = json_encode($data4);
            
            $ext_exitoso =  DB::table('file_reproduction_external')
                ->join('file_animale','file_reproduction_external.animalCode_id','=','file_animale.id')
                ->leftJoin('race as R','file_animale.race_id','=','R.id')
                ->leftJoin('race','file_reproduction_external.race_id','=','race.id')
                ->select('file_reproduction_external.id',
                            'file_reproduction_external.date',
                            'file_animale.animalCode',
                            'R.race_d as raza',
                            'file_animale.age_month as edad',
                            'file_animale.sex as sexo',
                            'file_reproduction_external.animalCode_Exte',
                            'race.race_d',
                            'file_reproduction_external.age_month',
                            'file_reproduction_external.sex',
                            'file_reproduction_external.hacienda_name',
                            'file_reproduction_external.reproduction_state',
                            'file_reproduction_external.actual_state')
                            ->where('reproduction_state','=','EXITOSO')
                            ->where('file_animale.animalCode','LIKE',$buscar)->count();
                            
            $ext_fallido =  DB::table('file_reproduction_external')
                    ->join('file_animale','file_reproduction_external.animalCode_id','=','file_animale.id')
                    ->leftJoin('race as R','file_animale.race_id','=','R.id')
                    ->leftJoin('race','file_reproduction_external.race_id','=','race.id')
                    ->select('file_reproduction_external.id',
                                'file_reproduction_external.date',
                                'file_animale.animalCode',
                                'R.race_d as raza',
                                'file_animale.age_month as edad',
                                'file_animale.sex as sexo',
                                'file_reproduction_external.animalCode_Exte',
                                'race.race_d',
                                'file_reproduction_external.age_month',
                                'file_reproduction_external.sex',
                                'file_reproduction_external.hacienda_name',
                                'file_reproduction_external.reproduction_state',
                                'file_reproduction_external.actual_state')
                                ->where('reproduction_state','=','FALLIDO')
                                ->where('file_animale.animalCode','LIKE',$buscar)->count();
            $ext_espera =  DB::table('file_reproduction_external')
                    ->join('file_animale','file_reproduction_external.animalCode_id','=','file_animale.id')
                    ->leftJoin('race as R','file_animale.race_id','=','R.id')
                    ->leftJoin('race','file_reproduction_external.race_id','=','race.id')
                    ->select('file_reproduction_external.id',
                                'file_reproduction_external.date',
                                'file_animale.animalCode',
                                'R.race_d as raza',
                                'file_animale.age_month as edad',
                                'file_animale.sex as sexo',
                                'file_reproduction_external.animalCode_Exte',
                                'race.race_d',
                                'file_reproduction_external.age_month',
                                'file_reproduction_external.sex',
                                'file_reproduction_external.hacienda_name',
                                'file_reproduction_external.reproduction_state',
                                'file_reproduction_external.actual_state')
                                ->where('reproduction_state','=','ESPERA')
                                ->where('file_animale.animalCode','LIKE',$buscar)->count();
            $data5 = [$ext_exitoso,$ext_espera,$ext_fallido];

            $datas5  = json_encode($data5);      
                
            $vacunaC= DB::table('vaccine_control')
                        ->join('file_animale','vaccine_control.animalCode_id','=','file_animale.id')
                        ->leftJoin('vaccine','vaccine_control.vaccine_id','=','vaccine.id')
                        ->select('vaccine_control.id'
                                ,'vaccine_control.date'
                                ,'vaccine.vaccine_d as vacuna'
                                ,'file_animale.animalCode as animal',
                                'vaccine_control.date_r',
                                'vaccine_control.actual_state'
                                )->where('file_animale.animalCode','LIKE',$buscar)
                        ->get();
            
            $desC = DB::table('deworming_control')
            ->join('file_animale','deworming_control.animalCode_id','=','file_animale.id')
            ->leftJoin('dewormer','deworming_control.deworming_id','=','dewormer.id')
            ->select('deworming_control.id',
                    'deworming_control.date',
                    'file_animale.animalCode as animal',
                    'dewormer.dewormer_d as des',
                    'deworming_control.date_r',
                    'deworming_control.actual_state')
                    ->where('file_animale.animalCode','LIKE',$buscar)
            ->get();

        
        $pesoC = DB::table('weigth_control')
            ->join('file_animale','weigth_control.animalCode_id','=','file_animale.id')
            ->select('weigth_control.id'
            ,'weigth_control.date',
            'file_animale.animalCode as animal',
            'weigth_control.weigtht',
            'weigth_control.date_r',
            'weigth_control.actual_state')
            ->where('file_animale.animalCode','LIKE',$buscar)
            ->get();
                                         

        foreach($animal as $i){
            if($buscar == $i->animalCode ){
                $id = $i->id;
                $imagen = $i->url;
                $codigoA = $i->animalCode;
                $fecha = $i->date;
                $sexo= $i->sex;
                $raza = $i->raza;
                $etapa = $i->stage;
                $origen = $i->source;
                $edad = $i->age_month;
                $estado = $i->actual_state; 
                
            }
        }

        return view('dashboard.resultado',compact('codigoA','imagen','fecha','raza','sexo','etapa','origen','edad','estado','par','datas2',

        'datas3','datas4','datas5','vacunaC','desC','pesoC' ));
    }

  
  

   
}
