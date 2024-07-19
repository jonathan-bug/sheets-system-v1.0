@extends('layouts.main')
@section('title', 'Meses')
@section('content')

    
    @include('partials.navbar', ['active' => 'months'])

    
    <div class='container pt-4'>

        
        @component('components.breadcrumb')
            <li class='breadcrumb-item'><a href='{{route('dashboard')}}'>Inicio</a></li>
            <li class='breadcrumb-item active'>Meses</li>
        @endcomponent

        
        <div class='row'>
            <div class='col-6'>
                <h4>Meses</h4>
            </div>
            <div class='col-6 d-flex justify-content-end'>
                <a class='btn btn-success' href='{{route('months.insert')}}'>
                    <li class='fa fa-plus'></li>
                    Nuevo
                </a>
            </div>
        </div>
    </div>

    
@endsection
