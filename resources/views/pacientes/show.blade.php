@extends('layouts.app')

@section('body-class', 'profile-page')

@section('styles')
    <style>
        .team {
            padding-bottom: 50px;
        }
        .team .row .col-md-4 {
            margin-bottom: 5em;
        }
        .team .row {
          display: -webkit-box;
          display: -webkit-flex;
          display: -ms-flexbox;
          display:         flex;
          flex-wrap: wrap;
        }
        .team .row > [class*='col-'] {
          display: flex;
          flex-direction: column;
        }
        .no-margin {
            margin: 0;
        }
        .team .team-player .title {
            margin-bottom: 0.5em;
        }
    </style>
@endsection

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/health.jpg') }}');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                    

                    <div class="name">
                        <h2 class="title">Diagnósticos asociados al paciente : <br></h2><h3> {{ $paciente->name }}
                        {{ $paciente->surname }}</h3>
                    </div>

                    
                    @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="description text-center">
                <p>  DNI :{{ $paciente->dni }}</p>
            </div>




<table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Id Diagnóstico</th>  
                                <th class="col-md-5 text-center">Descripción</th>
                                <th class="col-md-5 text-center">Fecha</th>
                                

                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($diagnosticos as $diagnostico)
                            <tr>
                                <td class="text-center">{{ $diagnostico->id }}</td>
                                <td class="col-md-5 text-center">{{ $diagnostico->description }}</td>
                                <td class="col-md-5 text-center">{{ $diagnostico->created_at }}</td>
                               
                           
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $diagnosticos->links() }}





           <!-- <div class="team text-center">
                <div class="row">

                    @foreach ($diagnosticos as $diagnostico)
                    <div class="col-md-4">
                        <div class="team-player">
                         <img src="{{asset('assets/diagnostico.png')}}" alt="Thumbnail Image" class="img-raised img-circle">
                            <h4 class="title">
                                <a href="{{ url('/diagnosticos/'.$diagnostico->id) }}">{{ $diagnostico->id }}</a>
                            </h4>
                           <!-- <p class="no-margin">$ {{ $diagnostico->id }}</p> 
                            <p class="description">{{ $diagnostico->description }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="text-center">
                    {{ $diagnosticos->links() }}
                </div>
            </div> -->

        </div>
    </div>
</div>





@include('includes.footer')
@endsection
