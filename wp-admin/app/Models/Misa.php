<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Misa extends Model
{
    protected $primaryKey = 'MISAP_Codigo';

    protected $table = "misa";
    
    protected $fillable = ["MISAC_Descripcion","MISAC_Fecha"];

    public $timestamps = false;    

}
