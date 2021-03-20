<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $primaryKey = 'CATEGP_Codigo';

    protected $table = "categoria";
    
    protected $fillable = ["CATEGC_Descripcion","CATEGC_DescripcionCorta"];

    public $timestamps = false;    

}
