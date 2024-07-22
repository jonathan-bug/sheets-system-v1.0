@extends('layouts.main')
@section('title', 'Meses')
@section('content')

    
    @include('partials.navbar', ['active' => 'months'])

    
    <div class='container pt-4'>

        
        @component('components.breadcrumb')
            <li class='breadcrumb-item'><a href='{{route('dashboard')}}'>Inicio</a></li>
            <li class='breadcrumb-item active'>Meses</li>
        @endcomponent

        
        <div class='row'>
            @if(!session('month'))
                <div class='alert alert-warning'>
                    Debes agregar un mes o activa uno dandole al cheque en Meses
                </div>
            @endif
            @if(session('success') != null)
                @if(session('success'))
                    <div class='alert alert-success'>Cambios Hechos</div>
                @else
                    <div class='alert alert-danger'>Cambios no Hechos</div>
                @endif
            @endif
            
            <div class='col-6'>
                <h4>Meses</h4>
            </div>
            <div class='col-6 d-flex justify-content-end'>
                <a class='btn btn-success' href='{{route('months.insert')}}'>
                    <li class='fa fa-plus'></li>
                    Nuevo
                </a>
            </div>

            <div class='col-12 mt-4'>
                <table class='table table-striped table-bordered table-hover shadow'>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Mes</th>
                            <th>Año</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($months as $month)
                            <tr>
                                <td>{{$month->id}}</td>
                                <td>{{$month->month}}</td>
                                <td>{{$month->year}}</td>
                                <td class='d-flex justify-content-end gap-2'>
                                    <form
                                        method='post'
                                        action='{{route('api.months.delete', $month->id)}}'>
                                        @csrf
                                        @method('delete')
                                        <button class='btn btn-danger'>
                                            <li class='fa fa-trash'></li>
                                        </button>
                                    </form>
                                    <a class='btn btn-warning' href='{{route('months.update', $month->id)}}'>
                                        <li class='fa fa-edit'></li>
                                    </a>
                                    <a class='btn btn-success' href='{{route('months.current', $month->id)}}'>
                                        <li class='fa fa-check'></li>
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
