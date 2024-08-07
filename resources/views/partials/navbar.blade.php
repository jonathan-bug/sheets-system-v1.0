<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Nombre de Empresa</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @if($active == 'dashboard')
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('employees')}}">Empleados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('months')}}">Meses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('sheets')}}">Hojas</a>
                </li>
            @elseif($active == 'employees')
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('employees')}}">Empleados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('months')}}">Meses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('sheets')}}">Hojas</a>
                </li>
            @elseif($active == 'months')
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('employees')}}">Empleados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('months')}}">Meses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('sheets')}}">Hojas</a>
                </li>
            @elseif($active == 'sheets')
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('employees')}}">Empleados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('months')}}">Meses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('sheets')}}">Hojas</a>
                </li>
            @endif
        </ul>
    </div>
  </div>
</nav>
