@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
    @include('partials.navbar', ['active' => 'dashboard'])
    <div class='container pt-4'>
        @component('components.breadcrumb')
            <li class="breadcrumb-item active" aria-current="page">Inicio</li>
        @endcomponent
        <div class='row g-4'>
            <div class="col-12">
                <x-loader/>
            </div>

            @if($v_emp_afp != null)
                <div class="col-sm-12 col-md-6">
                    <div class="p-4 card shadow-sm" style="width: 100%">
                        <canvas id="canvas" width="100%" height="60%"></canvas>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="row g-4">
                        <div class="col-sm-6">
                            <x-card title="Empleados" value="{{$v_count}}"/>
                        </div>
                        <div class="col-sm-6">
                            <x-card title="Meses" value="{{$v_months_count}}"/>
                        </div>
                        <div class="col-sm-6">
                            <x-card title="Total Salarios" value="${{number_format($v_salary_total, 2)}}"/>
                        </div>
                        <div class="col-sm-6">
                            <x-card title="H.E. Diurnas" value="{{number_format($v_extra_day_hour, 2)}}"/>
                        </div>
                        <div class="col-sm-6">
                            <x-card title="H.E. Nocturnas" value="{{number_format($v_extra_night_hour, 2)}}"/>
                        </div>
                        <div class="col-sm-6">
                            <x-card title="H. Nocturnas" value="{{number_format($v_night_hour, 2)}}"/>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.0.0-release/chart.umd.js" integrity="sha512-besW4sz3Eyv7QNLOdg24e5cY6oHgebwy2ZGVCX8FaB82nPWUViMmjoKs/McU4QNkdJsajih3zj6XrwJiuzcjYQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    (async () => {
        // values
        const res = await fetch('/api/dashboard')
        const values = await res.json()

        // chart
        const canvas = document.getElementById('canvas')
        const config = {
            type: 'bar',
            data: {
                labels: ['AFP empleador', 'ISSS empleador', 'AFP empleado', 'ISSS empleado'],
                datasets: [{
                    label: 'Montos',
                    data: [
                        values.v_pat_afp,
                        values.v_pat_isss,
                        values.v_emp_afp,
                        values.v_emp_isss
                    ],
                    backgroundColor: '#db5461'
                }]
            }
        }
        
        const chart = new Chart(canvas, config, {
            responsive: true,
            maintainAspectRatio: false
        })
    })()
</script>
@endpush
