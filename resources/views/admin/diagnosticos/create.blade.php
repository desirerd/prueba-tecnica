@extends('layouts.app')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Alta Diagnostico</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ url('/admin/diagnosticos') }}">
                {{ csrf_field() }}

                

                <div class="row">
                    <div class="col-sm-6">
                         <div class="form-group label-floating">
                            <label class="control-label">Descripción</label>
                            <input type="text" class="form-control" name="description" value="{{ old('description') }}"> 
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Paciente</label>
                            <select class="form-control" name="paciente_id">
                                <option value="0">DNI Paciente</option>
                                @foreach ($pacientes as $paciente)
                                <option value="{{ $paciente->id }}">{{ $paciente->dni }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

            
                <button class="btn btn-primary">Guardar diagnostico</button>
                <a href="{{ url('/admin/diagnosticos') }}" class="btn btn-default">Cancelar</a>
            </form>
        </div>

    </div>
</div>

@include('includes.footer')
@endsection
