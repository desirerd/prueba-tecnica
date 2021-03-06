@extends('layouts.app')

@section('title', 'Listado de pacientes')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/health.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">
        <form class="form-inline" method="get" action="{{ url('/search') }}">
                <input type="text" placeholder="¿Qué paciente buscas?" class="form-control" name="query" id="search">
                <button class="btn btn-primary btn-just-icon" type="submit">
                    <i class="material-icons">search</i>
                </button>
            </form>
        <div class="section text-center">
            <h2 class="title">Listado de pacientes</h2>


            <div class="team">
                <div class="row">
                    <a href="{{ url('/admin/pacientes/create') }}" class="btn btn-primary btn-round">Nuevo Paciente</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col-md-2 text-center">Nombre</th>
                                <th class="col-md-5 text-center">Apellidos</th>
                                <th class="col-md-2 text-center">Dni</th>
                                <th class="text-right">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pacientes as $key => $paciente)
                            <tr>
                                <td>{{ $paciente->name }}</td>
                                <td>{{ $paciente->surname }}</td>
                                 <td>{{ $paciente->dni }}</td>
                                
                                <td class="td-actions text-right">
                                    <form method="post" action="{{ url('/admin/pacientes/'.$paciente->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        
                                        <a href="{{ url('/pacientes/'.$paciente->id) }}" rel="tooltip" title="Ficha Paciente" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a href="{{ url('/admin/pacientes/'.$paciente->id.'/edit') }}" rel="tooltip" title="Editar paciente" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $pacientes->links() }}
                </div>
            </div>
        </div>
    </div>

</div>

@include('includes.footer')
@endsection
