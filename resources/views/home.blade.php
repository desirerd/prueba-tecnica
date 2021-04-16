@extends('layouts.app')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/health.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">


             

            <h2 class="title text-center">API - GESTIÓN</h2>

            @if (session('notification'))
                <div class="alert alert-success">
                    {{ session('notification') }}
                </div>
            @endif

            <ul class="nav nav-pills nav-pills-primary" role="tablist">
                <li class="active">
                    <a href="{{ url('/admin/pacientes') }}" >
                        <i class="material-icons">dashboard</i>
                        Gestión de pacientes
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/diagnosticos') }}">
                        <i class="material-icons">list</i>
                        Gestión de diagnósticos
                    </a>
                </li>
            </ul>
        
            <hr>
          
            
        
        </div>

    </div>
</div>

@include('includes.footer')
@endsection
