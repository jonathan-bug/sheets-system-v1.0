@extends('layouts.main')
@section('content')
    @include('partials.navbar', ['active' => 'employees'])

    <div class='container pt-4'>
        @component('components.breadcrumb')
            @section('breadcrumb')
                <li class='breadcrumb-item'>
                    <a href='{{route('dashboard')}}'>Inicio</a>
                </li>
            @show
        @endcomponent
        @yield('main')
    </div>
@endsection
