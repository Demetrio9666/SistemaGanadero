<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\File_Animale;
use App\Models\Dewormer;
class Deworming_control extends Model
{
    use HasFactory;
    protected $table = "deworming_control";



    public function file_animale(){
        return $this->hasOne(File_Animale::class);
    }

    public function dewormer(){
        return $this->hasOne(Dewormer::class);
    }
}

