@extends('layouts.main')
@section('title', 'Empleados')
@section('content')
    @include('partials.navbar', ['active' => 'employees'])
    <div class='container pt-4'>
        @component('components.breadcrumb')
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{route('employees')}}">Empleados</a></li>
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
                <h4>Nuevo Empleado</h4>
            </div>
            <div class='col-6 d-flex justify-content-end'>
                <a class='btn btn-secondary' href='{{route('employees')}}'>Volver</a>
            </div>

            <div class='col-12'>
                <div class='row justify-content-center'>
                    <div class='col-12 col-sm-8 col-md-6 col-lg-5'>
                        @component('components.form', [
                            'title' => 'Información Empleado',
                            'action' => route('api.employees.post'),
                            'method' => 'post'
                        ])
                            @csrf
                            @method('post')
                            <div class='form-group mb-2'>
                                <label class='form-label' for='dui'>DUI</label>
                                @error('dui')
                                <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                                <input class='form-control' name='dui' type='text' value='{{old('dui')}}'/>
                            </div>
                            <div class='form-group mb-2'>
                                <label class='form-label' for='first_name'>Primer Nombre</label>
                                @error('first_name')
                                <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                                <input class='form-control' name='first_name' type='text' value='{{old('first_name')}}'/>
                            </div>
                            <div class='form-group mb-2'>
                                <label class='form-label' for='second_name'>Segundo Nombre</label>
                                @error('second_name')
                                <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                                <input class='form-control' name='second_name' type='text' value='{{old("second_name")}}'/>
                            </div>
                            <div class='form-group mb-2'>
                                <label class='form-label' for='first_lastname'>Primer Apellido</label>
                                @error('first_lastname')
                                <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                                <input class='form-control' name='first_lastname' type='text' value='{{old('first_lastname')}}'/>
                            </div>
                            <div class='form-group mb-2'>
                                <label class='form-label' for='second_lastname'>Segundo Apellido</label>
                                @error('second_lastname')
                                <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                                <input class='form-control' name='second_lastname' type='text' value='{{old('second_lastname')}}'/>
                            </div>
                            <div class='form-group mb-2'>
                                <label class='form-label' for='birth_date'>Fecha de Nacimiento</label>
                                @error('birth_date')
                                <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                                <input class='form-control' name='birth_date' type='date' value='{{old('birth_date')}}'/>
                            </div>
                            <div class='form-group'>
                                <label class='form-label' for='entry_date'>Fecha de Ingreso</label>
                                @error('entry_date')
                                <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                                <input class='form-control' name='entry_date' type='date' value='{{old('entry_date')}}'/>
                            </div>
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
