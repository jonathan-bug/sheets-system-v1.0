@extends('layouts.main')
@section('title', 'Hojas')

@section('content')
    @include('partials.navbar', ['active' => 'sheets'])
    <div class='container pt-4'>
        @component('components.breadcrumb')
            <li class='breadcrumb-item'>
                <a href='{{route('dashboard')}}'>Inicio</a>
            </li>
            <li class='breadcrumb-item active'>Hojas</li>
        @endcomponent
        <div class='row'>
            @if(!session('month'))
                <div class='alert alert-warning'>
                    Debes agregar un mes o activa uno dandole al cheque en Meses
                </div>
            @else
                <h5 class='d-flex justify-content-end text-secondary mt-2 mb-4'>Periodo de {{session('month')->month}} {{session('month')->year}}</h5>
            @endif

            <div class='col-6'>
                <h4>Hojas</h4>
            </div>
            <div class='col-6 d-flex justify-content-end'>
                <a class='btn btn-success' href='{{route('export')}}' target='_blank'>Exportar</a>
            </div>

            <div class='col-12 pt-4 table-responsive'>
                <table class='table table-striped table-bordered table-hover shadow'>
                    <thead>
                        <tr>
                            <th>DUI</th>
                            <th>Primer Nombre</th>
                            <th>Primer Apellido</th>
                            <th>Salario</th>
                            <th>H.E. Diurna</th>
                            <th>H.E. Nocturna</th>
                            <th>H. Nocturna</th>
                            <th>Vacaciones</th>
                            <th>Aguinaldo</th>
                            <th>T. Bonos</th>
                            <th>T. Descuentos</th>
                            <th>AFP Empleado</th>
                            <th>ISSS Empleado</th>
                            <th>AFP Patrono</th>
                            <th>ISSS Patrono</th>
                            <th>T. Empleado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sheets as $sheet)
                            <tr>
                                <td>{{$sheet->dui}}</td>
                                <td>{{$sheet->first_name}}</td>
                                <td>{{$sheet->first_lastname}}</td>
                                <td>${{number_format($sheet->salary, 2)}}</td>
                                <td>${{number_format($sheet->v_extra_day_hour, 2)}}</td>
                                <td>${{number_format($sheet->v_extra_night_hour, 2)}}</td>
                                <td>${{number_format($sheet->v_night_hour, 2)}}</td>
                                <td>${{number_format($sheet->v_vacation, 2)}}</td>
                                <td>${{number_format($sheet->v_aguinald, 2)}}</td>
                                <td>${{number_format($sheet->bonuses, 2)}}</td>
                                <td>${{number_format($sheet->no_bonuses, 2)}}</td>
                                <td>${{number_format($sheet->v_emp_afp, 2)}}</td>
                                <td>${{number_format($sheet->v_emp_isss, 2)}}</td>
                                <td>${{number_format($sheet->v_pat_afp, 2)}}</td>
                                <td>${{number_format($sheet->v_pat_isss, 2)}}</td>
                                <td>${{number_format($sheet->v_employee_total, 2)}}</td>
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
