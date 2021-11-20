<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\File_Animale;
class Location extends Model
{
    use HasFactory;
    
    
    protected $table = "location";

    //protected $fillable='location_d';

    protected $fillable = [
        'location_d',
        'description',
        'actual_state'
    ];
    

}
