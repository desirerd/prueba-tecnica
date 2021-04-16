@extends('layouts.app')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Editar paciente seleccionado</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ url('/admin/pacientes/'.$paciente->id.'/edit') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre del paciente </label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $paciente->name) }}">
                        </div>
                    </div>

                     <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Apellidos del paciente</label>
                            <input type="text" class="form-control" name="surname" value="{{ old('surname', $paciente->surname)  }}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Dni</label>
                            <input type="text" class="form-control" name="dni" value="{{ old('dni', $paciente->dni)  }}">
                        </div>
                    </div>
                                       
                </div>

        

                <button class="btn btn-primary">Guardar cambios</button>
                <a href="{{ url('/admin/categories') }}" class="btn btn-default">Cancelar</a>
            </form>
        </div>

    </div>

</div>

@include('includes.footer')
@endsection
