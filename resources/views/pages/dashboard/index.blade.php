@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
    @include('partials.navbar', ['active' => 'dashboard'])
    <div class='container pt-4'>
        @component('components.breadcrumb')
            <li class="breadcrumb-item active" aria-current="page">Inicio</li>
        @endcomponent
        <div class='row'>
            @if(!session('month'))
                <div class='alert alert-warning'>
                    Debes agregar un mes o activa uno dandole al cheque en Meses
                </div>
            @endif
        </div>
    </div>
@endsection
