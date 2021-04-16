<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Paciente;

class PacienteController extends Controller
{
     public function show(Paciente $paciente)
    {
    	$diagnosticos = $paciente->diagnosticos()->paginate(10);
    	return view('pacientes.show')->with(compact('paciente', 'diagnosticos'));
    }
}

