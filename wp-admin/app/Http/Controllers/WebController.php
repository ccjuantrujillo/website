<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
    	return view('web.lectura');
    }

    public function cancionero(){
    	return view('web.cancionero');
    }

    public function misas(){
    	return view('web.misas');
    }

}
