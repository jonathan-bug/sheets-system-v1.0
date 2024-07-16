@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
    @include('partials.navbar', ['active' => 'dashboard'])
    <div class='container pt-4'>
        @component('components.breadcrumb')
            <li class="breadcrumb-item active" aria-current="page">Inicio</li>
        @endcomponent
        <div class='row'>
            
        </div>
    </div>
@endsection
