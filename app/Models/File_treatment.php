<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vitamin;
use App\Models\Antibiotic;
use App\Models\File_Animale;

class File_treatment extends Model
{
    use HasFactory;
    protected $table = "file_treatment";


    public function vitamina(){
        return $this->hasOne(Vitamin::class);
    }

    public function anti(){
        return $this->hasOne(Antibiotic::class);
    }
    public function file_animale(){
        return $this->hasOne(File_Animale::class);
    }
}
