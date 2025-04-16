@extends('layouts.crud')
@section('title', 'Horas Extras')

@section('breadcrumb')
    @parent
    <li class='breadcrumb-item'>
        <a href='{{route('employees')}}'>Empleados</a>
    </li>
    <li class='breadcrumb-item'>
        <a href='{{route('hours', $hour->employee_dui)}}'>Horas</a>
    </li>
    <li class='breadcrumb-item active'>Cambiar Hora</li>
@endsection

@section('main')
    <div class='row'>
        @if(!session('month'))
            <div class='alert alert-warning'>
                Debes agregar un mes o activa uno dandole al cheque en Meses
            </div>
        @else
            <h5 class='d-flex justify-content-end text-secondary mt-2 mb-4'>Periodo de {{session('month')->month}} {{session('month')->year}}</h5>
        @endif
        <div class='col-6'>
            <h4>Cambiar Hora</h4>
        </div>
        <div class='col-6 d-flex justify-content-end'>
            <a class='btn btn-secondary' href='{{route('hours', $hour->employee_dui)}}'>Volver</a>
        </div>

        <div class='col-12'>
            <div class='row justify-content-center'>
                <div class='col-12 col-sm-8 col-md-6 col-lg-5'>
                    @component('components.form', [
                                  'action' => route('api.hours.put'),
                                  'title' => 'Información Hora',
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
                            <label class='form-label' for=''>Horas</label>
                            @error('hour')
                            <div class='alert alert-danger'>
                                {{$message}}
                            </div>
                            @enderror
                            <input class='form-control' name='hour' type='text' value='{{$hour->hour}}'/>
                        </div>
                        <div class='form-group mt-2'>
                            <label class='form-label' for=''>Equivale</label>
                            @error('ty')
                            <div class='alert alert-danger'>
                                {{$message}}
                            </div>
                            @enderror
                            <select class='form-select' id='' name='ty'>
                                @if($hour->ty == 1)
                                    <option value='1' selected>Hora Extra Diurna</option>
                                    <option value='2'>Hora Extra Nocturna</option>
                                    <option value='3'>Nocturnidad</option>
                                @elseif($hour->ty = 2)
                                    <option value='1'>Hora Extra Diurna</option>
                                    <option value='2' selected>Hora Extra Nocturna</option>
                                    <option value='3'>Nocturnidad</option>
                                @else
                                    <option value='1'>Hora Extra Diurna</option>
                                    <option value='2'>Hora Extra Nocturna</option>
                                    <option value='3' selected>Nocturnidad</option>
                                @endif
                            </select>
                        </div>
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection
