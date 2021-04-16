@extends('layouts.app')

@section('title', 'Listado de diagnósticos')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/health.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Listado de diagnosticos</h2>

            <div class="team">
                <div class="row">
                    <a href="{{ url('/admin/diagnosticos/create') }}" class="btn btn-primary btn-round">Nuevo diagnostico</a>

                    <table class="table">
                        <thead>
                            <tr>
                                
                                <th class="col-md-4 text-center">Descripción</th>
                                <th class="text-center">DNI - Paciente</th>
                                <th class="col-md-2 text-center">Fecha alta</th>
                                <th class="col-md-2 text-center">Última modificación</th>


                                <th class="text-right">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($diagnosticos as $diagnostico)
                            <tr>
                               
                                <td>{{ $diagnostico->description }}</td>
                                <td>  <h6>{{ $diagnostico->paciente->dni}}</h6></td>
                                 <td>  <h6>{{ $diagnostico->created_at->format('d-m-Y H:i:s')}}</h6></td>
                                  <td>  <h6>{{ $diagnostico->updated_at->format('d-m-Y H:i:s')}}</h6></td>
                                 
                                <td class="td-actions text-right">
                                    <form method="post" action="{{ url('/admin/diagnosticos/'.$diagnostico->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        
                                        <a href="{{ url('/diagnosticos/'.$diagnostico->id) }}" rel="tooltip" title="Ver diagnostico" class="btn btn-info btn-simple btn-xs" target="_blank">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a href="{{ url('/admin/diagnosticos/'.$diagnostico->id.'/edit') }}" rel="tooltip" title="Editar diagnostico" class="btn btn-success btn-simple btn-xs">
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

                    {{ $diagnosticos->links() }}
                </div>
            </div>
        </div>
    </div>

</div>

@include('includes.footer')
@endsection
