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
                <table class='table table-striped table-hover shadow-md'>
                    <thead>
                        <tr>
                            <th>DUI</th>
                            <th>Primer Nombre</th>
                            <th>Segundo Nombre</th>
                            <th>Primer Apellido</th>
                            <th>Segundo Apellido</th>
                            <th>Edad</th>
                            <th>Fecha de Ingreso</th>
                            <th>~</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>u</td>
                        </tr>
                        <tr>
                            <td>u</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
