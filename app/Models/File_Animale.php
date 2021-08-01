<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Race;
use App\Models\Location;

class File_Animale extends Model
{
    use HasFactory;
    protected $table = "file_animale";
    protected $fillable =['url'];
    public function race(){
        return $this->hasOne(Race::class);
    }


    public function location(){
        return $this->hasOne(Location::class);
    }
}
