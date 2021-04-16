<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
      public function diagnostico()
    {
    	return $this->belongsTo(Paciente::class);
    }

    public function getPacienteNameAttribute()
    {
        if ($this->paciente)
            return $this->paciente->name;

        return '-';
    }


	public function paciente(){
	     return $this->belongsTo('App\Paciente', 'paciente_id');
	}
	
}





