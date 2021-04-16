@extends('layouts.app')

@section('body-class', 'profile-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/health.jpg') }}');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                    <div class="avatar">
                       <img src="{{asset('img/diagnostico.png')}}" alt="Circle Image" class="img-circle img-responsive img-raised">
                    </div>

                    <div class="name">
                        <h3 class="title"> Datos Diagnóstico</h3>
                      
                        <h6>Paciente asociado: {{ $diagnostico->paciente->name }} {{ $diagnostico->paciente->surname}}</h6>
DNI : {{ $diagnostico->paciente->dni}}
                    </div>

                    
                    @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="description text-center">
                <p>Descripción : {{ $diagnostico->description}}</p>
               
            </div>

            

            

        </div>
    </div>
</div>

     

@include('includes.footer')
@endsection
