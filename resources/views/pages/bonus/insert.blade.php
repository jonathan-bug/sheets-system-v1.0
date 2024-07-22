@extends('layouts.crud')
@section('title', 'Bonus')

@section('breadcrumb')
    @parent
    <li class='breadcrumb-item'>
        <a href='{{route('employees')}}'>Empleados</a>
    </li>
    <li class='breadcrumb-item'>
        <a href='{{route('bonus', $dui)}}'>Bonos y Descuentos</a>
    </li>
    <li class='breadcrumb-item active'>Nuevo</li>
@endsection

@section('main')
    <div class='row'>
        <div class='col-6'>
            <h4>Nuevo Bono o Descuento</h4>
        </div>
        <div class='col-6 d-flex justify-content-end'>
            <a class='btn btn-secondary' href='{{route('bonus', $dui)}}'>Volver</a>
        </div>

        <div class='col-12 mt-4'>
            @component('components.form', [
                'title' => 'Información Bono o Descuento',
                'action' => route('api.bonus.post'),
                'method' => 'post'
            ])
                @csrf
                @method('post')
                <div class='form-group'>
                    <label class='form-label' for=''>Mes Id: {{session('month')->month}} - {{session('month')->year}}</label>
                    <input class='form-control' name='month_id' type='text' value='{{session('month')->id}}' readonly/>
                </div>
                <div class='form-group mt-2'>
                    <label class='form-label' for=''>Monto</label>
                    @error('mont')
                    <div class='alert alert-danger'>{{$message}}</div>
                    @enderror
                    <input class='form-control' name='mont' type='text' value=''/>
                </div>
                <div class='form-group mt-2'>
                    <label class='form-label' for=''>Motivo</label>
                    @error('reason')
                    <div class='alert alert-danger'>{{$message}}</div>
                    @enderror
                    <input class='form-control' name='reason' type='text' value=''/>
                </div>
                <input class='d-none' name='employee_dui' type='text' value='{{$dui}}'/>
            @endcomponent
        </div>
    </div>
@endsection
