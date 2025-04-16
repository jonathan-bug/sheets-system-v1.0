@extends('layouts.crud')
@section('title', 'Bonus')

@section('breadcrumb')
    @parent
    <li class='breadcrumb-item'>
        <a href='{{route('employees')}}'>Empleados</a>
    </li>
    <li class='breadcrumb-item active'>Bonos y Descuentos</li>
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
        
        @if(session('success') != null)
            @if(session('success'))
                <div class='alert alert-success'>Cambios Hechos</div>
            @else
                <div class='alert alert-danger'>Cambios no Hechos</div>
            @endif
        @endif
        
        <div class='col-6'>
            <h4>Bonos y Descuentos</h4>
        </div>
        <div class='col-6 d-flex justify-content-end gap-2'>
            <a class='btn btn-success' href='{{route('bonus.insert', $dui)}}'>
                <li class='fa fa-plus'></li>
                Nuevo
            </a>
            <a class='btn btn-secondary' href='{{route('employees')}}'>Volver</a>
        </div>

        <div class='col-12 mt-4'>
            <table class='table table-striped table-bordered table-hover shadow'>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Monto</th>
                        <th>Motivo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bonuses as $bonus)
                        <tr>
                            <td>{{$bonus->id}}</td>
                            <td>${{$bonus->mont}}</td>
                            <td>{{$bonus->reason}}</td>
                            <td class='d-flex justify-content-end gap-2'>
                                <form
                                    action='{{route('api.bonus.delete', $bonus->id)}}'
                                    method='post'>
                                    @csrf
                                    @method('delete')
                                    <button class='btn btn-danger'>
                                        <li class='fa fa-trash'></li>
                                    </button>
                                </form>
                                <a class='btn btn-warning' href='{{route('bonus.update', $bonus->id)}}'>
                                    <li class='fa fa-edit'></li>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <div class='alert alert-primary'>
                            Sin Registros
                        </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
