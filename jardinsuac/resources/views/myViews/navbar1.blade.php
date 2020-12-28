<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top" id="navbar">
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
                        <a class="dropdown-item" href="/excel">Importar Excel</a>
                        <a class="dropdown-item"  href="/export/">Download Excel</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/taxa">Taxas Listagem</a>
                </li>
                <li class="nav-item">
                    @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                                @endif
                            @endauth
                    @endif
                </li>
            </ul>
        </div>

    </div>
</nav>
