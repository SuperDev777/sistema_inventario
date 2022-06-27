<header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    <!--<div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>-->
    <div>
        <a href="{{ route('users.show', Auth::user()->id) }}">
            {{ Auth::user()->name }}
        </a>
    </div>
</header>

<!-- Navbar -->
<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="#" class="nav_logo">
                <i class='bx bx-layer nav_logo-icon'></i>
                <span class="nav_logo-name">ALMACÉN</span>
            </a>
            <div class="nav_list">
                <a href="{{ route('home') }}" class="nav_link active">
                    <i class='bx bx-grid-alt nav_icon'></i>
                    <span class="nav_name">Dashboard</span>
                </a>
                <a href="{{ route('campus.index') }}" class="nav_link">
                    <i class='bx bx-buildings nav_icon'></i>
                    <span class="nav_name">Sedes</span>
                </a>
                @if(Auth::user()->is_admin)
                <a href="{{ route('users.index') }}" class="nav_link">
                    <i class='bx bx-user nav_icon'></i>
                    <span class="nav_name">Usuarios</span>
                </a>
                @endif
                <a href="{{ route('goods.index') }}" class="nav_link">
                    <i class='bx bx-message-square-detail nav_icon'></i>
                    <span class="nav_name">Articulos</span>
                </a>
                <a href="{{ route('equipments.index') }}" class="nav_link">
                    <i class='bx bx-bookmark nav_icon'></i>
                    <span class="nav_name">Equipos</span>
                </a>
                <a href="{{ route('orders.index') }}" class="nav_link">
                    <i class='bx bx-folder nav_icon'></i>
                    <span class="nav_name">Ordenes</span>
                </a>
                <a href="{{ route('receives.index') }}" class="nav_link">
                    <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                    <span class="nav_name">Recepciones</span>
                </a>
            </div>
        </div>
        <a href="#" class="nav_link" onclick="document.querySelector('form').submit();">
            <i class='bx bx-log-out nav_icon'></i>
            <span class="nav_name">SignOut</span>
        </a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    </nav>
</div>