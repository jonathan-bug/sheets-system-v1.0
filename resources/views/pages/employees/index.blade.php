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
            @if(!session('month'))
                <div class='alert alert-warning'>
                    Debes agregar un mes o activa uno dandole al cheque en Meses
                </div>
            @else
                <h5 class='d-flex justify-content-end text-secondary mt-2 mb-4'>Mes Actual: {{session('month')->month}}/{{session('month')->year}}</h5>
            @endif
            
            @if(session('success') != null)
                @if(session('success'))
                    <div class='alert alert-success'>Cambios Hechos</div>
                @else
                    <div class='alert alert-danger'>Cambios no Hechos</div>
                @endif
            @endif
            
            <div class='col-6'>
                <h4>Empleados</h4>
            </div>
            <div class='col-6 d-flex justify-content-end'>
                <a class='btn btn-success' href='{{route('employees.insert')}}'>
                    <li class='fa fa-plus'></li>
                    Nuevo
                </a>
            </div>
            
            <div class='col-12 mt-4 table-responsive'>
                <table class='table table-striped table-bordered table-hover shadow'>
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
                        @forelse($employees as $employee)
                            <tr>
                                <td>{{$employee->dui}}</td>
                                <td>{{$employee->first_name}}</td>
                                <td>{{$employee->second_name}}</td>
                                <td>{{$employee->first_lastname}}</td>
                                <td>{{$employee->second_lastname}}</td>
                                <td>{{$employee->birth_date}}</td>
                                <td>{{$employee->entry_date}}</td>
                                <td>
                                    <div class='d-flex gap-2 justify-content-end'>
                                        <form method='post' action='{{route('api.employees.delete', $employee->dui)}}'>
                                            @csrf
                                            @method('delete')
                                            <button class='btn btn-danger'>
                                                <li class='fa fa-trash'></li>
                                            </button>
                                        </form>
                                        <a class='btn btn-warning' href='{{route('employees.update', $employee->dui)}}'>
                                            <li class='fa fa-edit'></li>
                                        </a>
                                        <a class='btn btn-success' href='{{route('salaries', $employee->dui)}}'>
                                            <li class='fa fa-dollar'></li>
                                        </a>
                                        <a class='btn btn-primary' href='{{route('hours', $employee->dui)}}'>
                                            <li class='fa fa-clock'></li>
                                        </a>
                                        <a class='btn btn-secondary' href='{{route('bonus', $employee->dui)}}'>
                                            <li class='fa fa-money-bill-trend-up'></li>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <div class='alert alert-primary'>Sin Registros</div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
