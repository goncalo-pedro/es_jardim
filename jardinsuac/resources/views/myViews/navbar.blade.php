<nav class="navbar navbar-expand-lg navbar-dark bg-success" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="/">Jardins UAC</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item dropdown navDropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Importar/Download
                    </a>
                    <div class="dropdown-menu navDropdown" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route("taxas.index") }}">Importar Excel</a>
                        <a class="dropdown-item"  href="{{ route("excel.export_file") }}">Download Excel</a>
                    </div>
                </li>
                <li class="nav-item dropdown navDropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Administradores
                    </a>
                    <div class="dropdown-menu navDropdown" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route("criar_user") }}">Criar Administrador</a>
                        <a class="dropdown-item"  href="{{ route("listar_users") }}">Gerir Administradores</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="list-group-item list-group-item-action" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>

    </div>
</nav>
