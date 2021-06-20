<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Redirect;

class CategoriaController extends Controller
{
    public function index(){
        $categorias = Categoria::all();
        return view('admin.categoria.index')->with('categorias',$categorias);
    }

    public function create(){
        return view('admin.categoria.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);
        $categoria = new Categoria;
        $categoria->CATEGC_Descripcion = $request->nombre;
        $categoria->CATEGC_DescripcionCorta = "";
        $categoria->COMPP_Codigo = 3;
        $categoria->save();

        return Redirect::to("/categoria");
    }

    public function edit($id){
        $categoria = Categoria::findOrFail($id);
        return view("admin.categoria.edit", ['categoria' => $categoria]);
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->CATEGC_Descripcion = $request->nombre;
        $categoria->CATEGC_DescripcionCorta = "";
        $categoria->save();
        return Redirect::to("/categoria");
    }

    public function destroy($id)
    {
        Categoria::destroy($id);
        return Redirect::to("/categoria");
    }
}
