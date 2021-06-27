<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Race;

class Artificial_Reproduction extends Model
{
    use HasFactory;
    //protected $fillable = ['id'];
    protected $table ="artificial_reproduction";

    public function race(){
        return $this->hasOne(Race::class);
    }
}
