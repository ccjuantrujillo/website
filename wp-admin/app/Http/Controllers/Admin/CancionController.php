<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cancion;
use Illuminate\Http\Request;

class CancionController extends Controller
{
    public function index(){
        $canciones = Cancion::get();
        return view('admin.cancion.index',compact('canciones'));
    }

    /* DataTable */
    public function dataTable()
    {
        $canciones = Cancion::get(); 
        return view('admin.cancion.index',compact('canciones'));
    }    
    
    public function create(){
        return view('admin.categoria.create');
    }
}
