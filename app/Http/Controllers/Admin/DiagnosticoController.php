<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Diagnostico;
use App\Paciente;

class DiagnosticoController extends Controller
{
    public function index()
    {
    	$diagnosticos = Diagnostico::paginate(10);
    	return view('admin.diagnosticos.index')->with(compact('diagnosticos')); // listado
    }

    public function create()
    {
        $pacientes = Paciente::orderBy('name')->get();
    	return view('admin.diagnosticos.create')->with(compact('pacientes')); // formulario de registro
    }

    public function store(Request $request)
    {
        // validar
        $messages = [
            
            'description.required' => 'La descripción es un campo obligatorio.',
            'description.max' => 'La descripción solo admite hasta 500 caracteres.',
            
        ];
        $rules = [
            
            'description' => 'required|max:500',
            
        ];
        $this->validate($request, $rules, $messages);

    	// registrar el nuevo producto en la bd
        $diagnostico = new Diagnostico();
        $diagnostico->description = $request->input('description');
        $diagnostico->paciente_id = $request->paciente_id == 0 ? null : $request->paciente_id;
        $diagnostico->save(); // INSERT

        return redirect('/admin/diagnosticos');
    }

    public function edit($id)
    {
        $pacientes = Paciente::orderBy('name')->get();
        $diagnostico = Diagnostico::find($id);
        return view('admin.diagnosticos.edit')->with(compact('diagnostico', 'pacientes')); // form de edición
    }

    public function update(Request $request, $id)
    {
        $messages = [
            
            'description.required' => 'La descripción es un campo obligatorio.',
            'description.max' => 'La descripción solo admite hasta 500 caracteres.'
        ];
        $rules = [
            
            'description' => 'required|max:500'
 
        ];
        $this->validate($request, $rules, $messages);
        // dd($request->all());
        $diagnostico = Diagnostico::find($id);
        $diagnostico->description = $request->input('description');
        $diagnostico->paciente_id = $request->paciente_id == 0 ? null : $request->paciente_id;

        $diagnostico->save(); // UPDATE

        return redirect('/admin/diagnosticos');
    }

    public function destroy($id)
    {
        
        $diagnostico = Diagnostico::find($id);
        $diagnostico->delete(); // DELETE

        return back();
    }

}
