<!-- Navbar -->
<nav class="navbar navbar-dark navbar-expand-lg bg-primary">
    <!-- Navbar content -->
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="">Home</a>
                </li>
                @if(Auth::user()->is_admin)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}">Usuarios</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('goods.index') }}">Articulos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('equipments.index') }}">Equipos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('orders.index') }}">Ordenes</a>
                </li>
            </ul>
            <div class="d-flex justify-content-start justify-content-lg-end w-100">
                <span class="text-white">{{ Auth::user()->name }}</span>
            </div>
        </div>
    </div>
</nav>