<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    protected $primaryKey = 'CANCP_Codigo';
    protected $table      = 'cancion';
    protected $fillable   = ['CANCC_Titulo','CANCC_Letra','CANCC_Url'];
    public $timestamps    = false;

}
