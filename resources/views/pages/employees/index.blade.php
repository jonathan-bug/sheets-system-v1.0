@extends('layouts.main')
@section('title', 'Empleados')
@section('content')
    @include('partials.navbar', ['active' => 'employees'])
    <div class='container pt-4'>
        @component('components.breadcrumb')
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
            <li class='breadcrumb-item active'>Empleados</li>
        @endcomponent

        <div class='row'>
            <div class='col-6'>
                <h4>Empleados</h4>
            </div>
            <div class='col-6 d-flex justify-content-end'>
                <a class='btn btn-success' href='#'>
                    <li class='fa fa-plus'></li>
                    Nuevo
                </a>
            </div>
            <div class='col-12 mt-4'>
                <table class='table table-striped table-bordered table-hover shadow-md'>
                    <thead>
                        <tr>
                            <th>DUI</th>
                            <th>Primer Nombre</th>
                            <th>Segundo Nombre</th>
                            <th>Primer Apellido</th>
                            <th>Segundo Apellido</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Fecha de Ingreso</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{$employee->dui}}</td>
                                <td>{{$employee->first_name}}</td>
                                <td>{{$employee->second_name}}</td>
                                <td>{{$employee->first_lastname}}</td>
                                <td>{{$employee->second_lastname}}</td>
                                <td>{{$employee->birth_date}}</td>
                                <td>{{$employee->entry_date}}</td>
                                <td class='d-flex gap-2 justify-content-end'>
                                    <form method='post' action=''>
                                        @csrf
                                        <button class='btn btn-danger'>
                                            <li class='fa fa-trash'></li>
                                        </button>
                                    </form>
                                    <a class='btn btn-warning' href=''>
                                        <li class='fa fa-edit'></li>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
