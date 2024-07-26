<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
