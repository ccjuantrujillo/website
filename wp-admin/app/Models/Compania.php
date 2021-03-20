<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compania extends Model
{
    protected $primaryKey = 'COMPP_Codigo';
    protected $table      = 'compania';
    protected $fillable   = ['COMPC_Descripcion'];
    public $timestamps    = false;
    
    
}
