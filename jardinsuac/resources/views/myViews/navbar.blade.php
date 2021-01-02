<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #071d49" id="navbar">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/">Jardins UAC</a>


        <div class="collapse navbar-collapse w-100 order-1 dual-collapse2 order-md-0" id="navbarTogglerDemo01" >
            <div class="navbar-nav mr-auto">

                <div id="Home" class="nav-item " style="">
                    <a class="nav-link" href="{{ route("admin.home") }}">Home</a>
                </div>

                <div id="Taxas" class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Taxas de porte
                    </a>
                    <div class="dropdown-menu navDropdown" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route("taxas.index") }}">Listar Taxas de Porte</a>
                    </div>
                </div>

                @if($user->admin_master == 1)
                    <div class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Administradores
                        </a>
                        <div class="dropdown-menu navDropdown" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route("criar_user") }}">Criar Administrador</a>
                            <a class="dropdown-item"  href="{{ route("administradores.index") }}">Gerir Administradores</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="collapse navbar-collapse w-100 order-3 dual-collapse2 justify-content-md-end" id="navbarTogglerDemo01">
            <div class="navbar-nav ml-auto">

                <div id="dropPerfil" class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ $user->name }}
                    </a>
                    <div class="dropdown-menu navDropdown" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('admin.perfil') }}">Perfil</a>
                        <a class="list-group-item list-group-item-action" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
     </div>

</nav>

