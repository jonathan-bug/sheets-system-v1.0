@extends('layouts.main')
@section('title', 'Empleados')
@section('content')
    
    @include('partials.navbar', ['active' => 'months'])

    <div class='container pt-4'>
        
        @component('components.breadcrumb')
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{route('months')}}">Meses</a></li>
            <li class='breadcrumb-item active'>Nuevo</li>
        @endcomponent
        
        <div class='row'>
            @if(!session('month'))
                <div class='alert alert-warning'>
                    Debes agregar un mes o activa uno dandole al cheque en Meses
                </div>
            @else
                <h5 class='d-flex justify-content-end text-secondary mt-2 mb-4'>Mes Actual: {{session('month')->month}}/{{session('month')->year}}</h5>
            @endif
            
            <div class='col-6'>
                <h4>Nuevo Mes</h4>
            </div>
            <div class='col-6 d-flex justify-content-end'>
                <a class='btn btn-secondary' href='{{route('months')}}'>Volver</a>
            </div>

            <div class='col-12'>
                <div class='row justify-content-center'>
                    <div class='col-12 col-sm-8 col-md-6 col-lg-5'>
                        @component('components.form', ['title' => 'Información Mes',
                                                                  'action' => route('api.months.post'),
                                                                  'method' => 'post'
                                                                  ])
                            @csrf
                            @method('post')
                            <div class='form-group mb-2'>
                                <label class='form-label' for='month'>Mes</label>
                                @error('month')
                                <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                                <select class='form-select' id='' name='month'>
                                    @foreach($months as $month_)
                                        <option value='{{$month_}}'>{{$month_}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class='form-group mb-2'>
                                <label class='form-label' for='year'>Año</label>
                                @error('year')
                                <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                                <input class='form-control' name='year' type='text' value='{{old("year")}}'/>
                            </div>
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
