<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Misa;
use Illuminate\Http\Request;
use Redirect;

class MisaController extends Controller
{

    public function index(){
        $misas = Misa::all();
        return view('admin.misa.index')->with('misas',$misas);
    }

    public function create(){
        return view('admin.misa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
            'fecha' => 'required'
        ]);
        $misa = new Misa;
        $misa->MISAC_Descripcion = $request->descripcion;
        $misa->MISAC_Fecha = $request->fecha;
        //$misa->COMPP_Codigo = 3;
        $misa->save();

        return Redirect::to("/misa");
    }

    public function edit($id){
        $misa = Misa::findOrFail($id);
        return view("admin.misa.edit", ['misa' => $misa]);
    }

    public function update(Request $request, $id)
    {
        $misa = Misa::findOrFail($id);
        $misa->MISAC_Descripcion = $request->descripcion;
        $misa->MISAC_Fecha = $request->fecha;
        $misa->save();
        return Redirect::to("/misa");
    }

    public function destroy($id)
    {
        Misa::destroy($id);
        return Redirect::to("/misa");
    }

}
?>