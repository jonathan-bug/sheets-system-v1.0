@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
    @include('partials.navbar', ['active' => 'dashboard'])
    <div class='container pt-4'>
        @component('components.breadcrumb')
            <li class="breadcrumb-item active" aria-current="page">Inicio</li>
        @endcomponent
        <div class='row g-4 mt-2'>
            @if(!session('month'))
                <div class='alert alert-warning'>
                    Debes agregar un mes o activa uno dandole al cheque en Meses
                </div>
            @else
                <h5 class='d-flex justify-content-end text-secondary mt-2 mb-4'>
                  Periodo de {{session('month')->month}} {{session('month')->year}}
                </h5>
            @endif

            @if($v_emp_afp != null)
                <div class="col-sm-12 col-md-6">
                    <div class="p-4 card shadow-sm" style="width: 100%">
                        <canvas id="canvas" width="100%" height="60%"></canvas>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="row g-4">
                        <div class="col-sm-6">
                            <div class="p-4 card shadow-sm">
                                <h5 class="card-subtitle text-muted">Empleados</h5>
                                <hr/>
                                <h2 class="card-title text-center fw-bold text-secondary">{{$v_count}}</h2>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-4 card shadow-sm">
                                <h5 class="card-subtitle text-muted">Meses</h5>
                                <hr/>
                                <h2 class="card-title text-center fw-bold text-secondary">{{$v_months_count}}</h2>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-4 card shadow-sm">
                                <h5 class="card-subtitle text-muted">Total Salarios</h5>
                                <hr/>
                                <h2 class="card-title text-center fw-bold text-secondary">${{number_format($v_salary_total, 2)}}</h2>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-4 card shadow-sm">
                                <h5 class="card-subtitle text-muted">H.E. Diurnas</h5>
                                <hr/>
                                <h2 class="card-title text-center fw-bold text-secondary">{{number_format($v_extra_day_hour, 2)}}</h2>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-4 card shadow-sm">
                                <h5 class="card-subtitle text-muted">H.E. Nocturnas</h5>
                                <hr/>
                                <h2 class="card-title text-center fw-bold text-secondary">{{number_format($v_extra_night_hour, 2)}}</h2>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-4 card shadow-sm">
                                <h5 class="card-subtitle text-muted">H. Nocturnas</h5>
                                <hr/>
                                <h2 class="card-title text-center fw-bold text-secondary">{{number_format($v_night_hour, 2)}}</h2>
                            </div>
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
