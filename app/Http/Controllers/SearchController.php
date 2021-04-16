<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;

class SearchController extends Controller
{
    public function show(Request $request)
    {	
    	$query = $request->input('query');
    	$pacientes = Paciente::where('surname', 'like', "%$query%")->paginate(5);

        $pacientes2 = Paciente::where('name', 'like', "%$query%")->paginate(5);
    	
    	if ($pacientes->count() == 1) {
    		$id = $pacientes->first()->id;
    		return redirect("pacientes/$id"); // 'products/'.$id

            return view('search.show')->with(compact('pacientes', 'query'));
    	}

    	


        if ($pacientes2->count() == 1) {
            $id2 = $pacientes2->first()->id;
            return redirect("pacientes/$id2"); // 'products/'.$id

            return view('search.show')->with(compact('pacientes2', 'query'));
        }

        
    }

    public function data()
    {
    	$products = Product::pluck('name');
    	return $pacientes;
    }
}

