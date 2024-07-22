@extends('layouts.main')
@section('title', 'Empleados')

@section('content')
    @include('partials.navbar', ['active' => 'employees'])

    <div class='container pt-4'>
        @component('components.breadcrumb')
            <li class='breadcrumb-item'>
                <a href='{{route('dashboard')}}'>Inicio</a>
            </li>
            <li class='breadcrumb-item'>
                <a href='{{route('employees')}}'>Empleados</a>
            </li>
            <li class='breadcrumb-item'>
                <a href='{{route('salaries', $salary->employee_dui)}}'>Salarios</a>
            </li>
            <li class='breadcrumb-item active'>Nuevo</li>
        @endcomponent

        <div class='row'>
            <div class='col-6'>
                <h4>Cambiar Salario</h4>
            </div>
            <div class='col-6 d-flex justify-content-end gap-2'>
                <a class='btn btn-secondary' href='{{route('salaries', $salary->employee_dui)}}'>Volver</a>
            </div>
            
            <div class='col-12'>
                @component('components.form', [
                                                                                   'title' => 'Información Salario',
                                                                                   'action' => route('api.salaries.put'),
                                                                                   'method' => 'post'
                                                                                   ])

                    @csrf
                    @method('put')
                    <div class='form-group'>
                        <label class='form-label' for=''>Id</label>
                        <input class='form-control' name='id' type='text' value='{{$salary->id}}' readonly/>
                    </div>
                    <div class='form-group mt-2'>
                        @error('salary')
                        <div class='alert alert-danger'>
                            {{$message}}
                        </div>
                        @enderror
                        <label class='form-label' for=''>Cantidad</label>
                        <input class='form-control' name='salary' type='text' value='{{$salary->salary}}'/>
                    </div>
                    
                @endcomponent
            </div>
        </div>
    </div>
@endsection
