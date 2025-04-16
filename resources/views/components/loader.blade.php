@if(!session('month'))
    <div class='alert alert-warning'>
        Debes agregar un mes o activa uno dandole al cheque en Meses
    </div>
@else
    <h5 class='d-flex justify-content-end text-secondary'>
        Periodo de {{session('month')->month}} {{session('month')->year}}
    </h5>
    <hr/>
@endif
