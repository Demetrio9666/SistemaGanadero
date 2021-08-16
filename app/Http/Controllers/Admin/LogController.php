<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{
    public function __construct(){
        $this->middleware('can:actividad.index')->only('index');
       
    }
   
    public function index()
    {
        $log = DB::table('activity_log')
        ->select('log_name',
                    'email',
                    'rol',
                    'description',
                    'view',
                    'data',
                    'created_at',
                    'updated_at' )
                    ->get();
        return view('log-activity.log',compact('log'));
    }

    
}
