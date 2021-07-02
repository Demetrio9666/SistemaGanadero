<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\File_Animale;
use App\Models\Vaccine;

class Vaccine_control extends Model
{
    use HasFactory;
    protected $table = "vaccine_control";

    public function file_animale(){
        return $this->hasOne(File_Animale::class);
    }

    public function vaccine(){
        return $this->hasOne(Vaccine::class);
    }
}
