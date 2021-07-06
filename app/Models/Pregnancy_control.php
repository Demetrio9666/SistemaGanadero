<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vitamin;
class Pregnancy_control extends Model
{
    use HasFactory;
    protected $table = "pregnancy_control";


    public function vitaminas(){
        return $this->hasMany(Vitamin::class);
    }
}
