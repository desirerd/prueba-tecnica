<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Paciente;


class PacienteController extends Controller
{
	public function index()
    {
    	$pacientes = Paciente::orderBy('name')->paginate(10);
    	return view('admin.pacientes.index')->with(compact('pacientes')); // listado
    }

    public function create()
    {
    	return view('admin.pacientes.create'); // formulario de registro
    }

    public function store(Request $request)
    {
        $this->validate($request, Paciente::$rules, Paciente::$messages);

        $paciente = Paciente::create($request->only('name', 'surname', 'dni'));

       
        return redirect('/admin/pacientes');
    }

    public function edit(Paciente $paciente)
    {
        return view('admin.pacientes.edit')->with(compact('paciente')); // form de edición
    }

    public function update(Request $request, Paciente $paciente)
    {
        $this->validate($request, Paciente::$rules, Paciente::$messages);

        $paciente->update($request->only('name', 'surname','dni'));

             

        return redirect('/admin/pacientes');
    }

    public function destroy(Paciente $paciente)
    {
        $paciente->delete(); // DELETE
        return back();
    }
}
