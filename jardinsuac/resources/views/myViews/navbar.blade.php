<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #071d49" id="navbar">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/">Jardins UAC</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route("admin.home") }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Taxas de porte
                    </a>
                    <div class="dropdown-menu navDropdown" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route("taxas.index") }}">Listar Taxas de Porte</a>
                    </div>
                </li>
                @if($user->admin_master == 1)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Administradores
                        </a>
                        <div class="dropdown-menu navDropdown" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route("criar_user") }}">Criar Administrador</a>
                            <a class="dropdown-item"  href="{{ route("listar_users") }}">Gerir Administradores</a>
                        </div>
                    </li>
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ $user->name }}
                    </a>
                    <div class="dropdown-menu navDropdown" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">{{ $user->name }}</a>
                        <a class="list-group-item list-group-item-action" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>

    </div>
</nav>

