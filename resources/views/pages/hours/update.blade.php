@extends('layouts.crud')
@section('title', 'Horas Extras')

@section('breadcrumb')
    @parent
    <li class='breadcrumb-item'>
        <a href='{{route('employees')}}'>Empleados</a>
    </li>
    <li class='breadcrumb-item'>
        <a href='{{route('hours', $hour->employee_dui)}}'>Horas Extras</a>
    </li>
    <li class='breadcrumb-item active'>Cambiar Hora Extra</li>
@endsection

@section('main')
    <div class='row'>
        <div class='col-6'>
            <h4>Cambiar Hora Extra</h4>
        </div>
        <div class='col-6 d-flex justify-content-end'>
            <a class='btn btn-secondary' href='{{route('hours', $hour->employee_dui)}}'>Volver</a>
        </div>

        <div class='col-12'>
            <div class='row justify-content-center'>
                <div class='col-12 col-sm-8 col-md-6 col-lg-5'>
                    @component('components.form', [
                                  'action' => route('api.hours.put'),
                                  'title' => 'Información Hora Extra',
                                  'method' => 'post'
                                  ])                        
                        @csrf
                        @method('put')
                        <div class='form-group'>
                            @error('month_id')
                            <div class='alert alert-danger'>
                                {{$message}}
                            </div>
                            @enderror
                            <label class='form-label' for=''>Mes Id: {{session('month')->month}} - {{session('month')->year}}</label>
                            <input class='form-control' name='month_id' type='text' value='{{session('month')->id}}' readonly/>
                        </div>
                        <input class='d-none' name='id' type='text' value='{{$hour->id}}'/>
                        <input class='d-none' name='employee_dui' type='text' value='{{$hour->employee_dui}}'/>
                        <div class='form-group mt-2'>
                            @error('hour')
                            <div class='alert alert-danger'>
                                {{$message}}
                            </div>
                            @enderror
                            <label class='form-label' for=''>Horas</label>
                            <input class='form-control' name='hour' type='text' value='{{$hour->hour}}'/>
                        </div>
                        
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection
