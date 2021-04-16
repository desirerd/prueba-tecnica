<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diagnostico;


class DiagnosticoController extends Controller
{
        public function show($id)
    {
    	$diagnostico = Diagnostico::find($id);

    	return view('diagnosticos.show')->with(compact('diagnostico'));

   
    }
}



