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
                                                                  'title' => 'Nuevo Empleado',
                                                                  'action' => route('api.employees.put'),
                                                                  'method' => 'post'
                                                                  ])
                            @csrf
                            @method('put')
                            <div class='form-group mb-2'>
                                <label class='form-label' for='dui'>DUI</label>
                                @error('dui')
                                <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                                <input class='form-control' name='dui' type='text' value='{{$employee->dui}}'/>
                            </div>
                            <div class='form-group mb-2'>
                                <label class='form-label' for='first_name'>Primer Nombre</label>
                                @error('first_name')
                                <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                                <input class='form-control' name='first_name' type='text' value='{{$employee->first_name}}'/>
                            </div>
                            <div class='form-group mb-2'>
                                <label class='form-label' for='second_name'>Segundo Nombre</label>
                                @error('second_name')
                                <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                                <input class='form-control' name='second_name' type='text' value='{{$employee->second_name}}'/>
                            </div>
                            <div class='form-group mb-2'>
                                <label class='form-label' for='first_lastname'>Primer Apellido</label>
                                @error('first_lastname')
                                <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                                <input class='form-control' name='first_lastname' type='text' value='{{$employee->first_lastname}}'/>
                            </div>
                            <div class='form-group mb-2'>
                                <label class='form-label' for='second_lastname'>Segundo Apellido</label>
                                @error('second_lastname')
                                <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                                <input class='form-control' name='second_lastname' type='text' value='{{$employee->second_lastname}}'/>
                            </div>
                            <div class='form-group mb-2'>
                                <label class='form-label' for='birth_date'>Fecha de Nacimiento</label>
                                @error('birth_date')
                                <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                                <input class='form-control' name='birth_date' type='date' value='{{$employee->birth_date}}'/>
                            </div>
                            <div class='form-group'>
                                <label class='form-label' for='entry_date'>Fecha de Ingreso</label>
                                @error('entry_date')
                                <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                                <input class='form-control' name='entry_date' type='date' value='{{$employee->entry_date}}'/>
                            </div>
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
