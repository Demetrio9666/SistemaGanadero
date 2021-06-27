<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArtificialReproduction;

class Race extends Model
{
    use HasFactory;
    //protected $fillable = ['id'];
    protected $table = "race";
    
    //relacion de uno a uno inversa
   // public function ArtificialReproduction(){

     //   return $this->belongsTo(ArtificialReproduction::class);
    //}


}
