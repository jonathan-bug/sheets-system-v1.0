@extends('layouts.crud')
@section('title', 'Bonus')

@section('breadcrumb')
    @parent
    <li class='breadcrumb-item'>
        <a href='{{route('employees')}}'>Empleados</a>
    </li>
    <li class='breadcrumb-item'>
        <a href='{{route('bonus', $bonus->employee_dui)}}'>Bonos y Descuentos</a>
    </li>
    <li class='breadcrumb-item active'>Nuevo</li>
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
            <h4>Cambiar Bono o Descuento</h4>
        </div>
        <div class='col-6 d-flex justify-content-end'>
            <a class='btn btn-secondary' href='{{route('bonus', $bonus->employee_dui)}}'>Volver</a>
        </div>

        <div class='col-12 mt-4'>
            @component('components.form', [
                                                               'title' => 'Información Bono o Descuento',
                                                               'action' => route('api.bonus.put'),
                                                               'method' => 'post'
                                                               ])
                @csrf
                @method('put')
                <div class='form-group'>
                    <label class='form-label' for=''>Mes Id: {{session('month')->month}} - {{session('month')->year}}</label>
                    <input class='form-control' name='month_id' type='text' value='{{session('month')->id}}' readonly/>
                </div>
                <div class='form-group mt-2'>
                    @error('mont')
                    <div class='alert alert-danger'>{{$message}}</div>
                    @enderror
                    <label class='form-label' for=''>Monto</label>
                    <input class='form-control' name='mont' type='text' value='{{$bonus->mont}}'/>
                </div>
                <div class='form-group mt-2'>
                    @error('reason')
                    <div class='alert alert-danger'>{{$message}}</div>
                    @enderror
                    <label class='form-label' for=''>Motivo</label>
                    <input class='form-control' name='reason' type='text' value='{{$bonus->reason}}'/>
                </div>
                <input class='d-none' name='employee_dui' type='text' value='{{$bonus->employee_dui}}'/>
                <input class='d-none' name='id' type='text' value='{{$bonus->id}}'/>
            @endcomponent
        </div>
    </div>
@endsection
