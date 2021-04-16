<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;


class TestController extends Controller
{

    public function welcome()
    {
    	$pacientes = Paciente::has('diagnosticos')->get();
    	return view('welcome')->with(compact('pacientes'));
    }

}

