<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if($active == 'dashboard')
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Meses</a>
                    </li>
                @elseif($active == 'employees')
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Meses</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Empleados</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Meses</a>
                    </li>
                @endif
                
            </ul>
        </div>
    </div>
</nav>
