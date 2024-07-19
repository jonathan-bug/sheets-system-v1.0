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
            <div class='col-6'>
                <h4>Nuevo Mes</h4>
            </div>
            <div class='col-6 d-flex justify-content-end'>
                <a class='btn btn-secondary' href='{{route('months')}}'>Volver</a>
            </div>

            <div class='col-12'>
                <div class='row justify-content-center'>
                    <div class='col-12 col-sm-8 col-md-6 col-lg-5'>
                        @component('components.form', [
                                                                  'title' => 'Nuevo Mes',
                                                                  'action' => route('api.months.put'),
                                                                  'method' => 'post'
                                                                  ])
                            @csrf
                            @method('put')
                            <div class='form-group mb-2'>
                                <label class='form-label' for='id'>Id</label>
                                @error('id')
                                <div class='alert alert-danger'>{{$message}}></div>
                                @enderror
                                <input class='form-control' name='id' type='text' value='{{2|old('id')}}'/>
                            </div>
                            <div class='form-group mb-2'>
                                <label class='form-label' for='month'>Mes</label>
                                @error('month')
                                <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                                <input class='form-control' name='month' type='text' value='{{old('month')}}'/>
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
