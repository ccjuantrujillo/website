<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $primaryKey = 'MENU_Codigo';
    protected $table      = 'menu';
    protected $fillable   = [
                'MENU_Codigo_Padre',
                'MENU_Titulo',
                'MENU_Url',
                'MENU_AccesoRapido',
                'MENU_OrderBy'
            ];
    public $timestamps    = false;
}
