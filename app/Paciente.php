<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    public static $messages = [
        'name.required' => 'Es necesario ingresar un nombre para el paciente.',
        'surname.required' => 'Es necesario ingresar unos apellidos para el paciente.',
        'dni.required' => 'Es necesario ingresar un dni.',
        'name.min' => 'El nombre del paciente debe tener al menos 3 caracteres.',
        'surname.min' => 'Los apellidos del paciente deben tener al menos 3 caracteres.',
        
    ];
    public static $rules = [
        'name' => 'required|min:3'    
    ];

	protected $fillable = ['name', 'surname','dni'];

    // $category->products
    public function diagnosticos()
    {
    	return $this->hasMany(Diagnostico::class);
    }

}
