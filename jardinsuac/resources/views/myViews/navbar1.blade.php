<nav class="navbar navbar-expand-lg navbar-dark" id="navbar">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/">Jardins UAC</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">


            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("taxa.index") }}">Taxas Listagem</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("historia") }}">Historia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("geologia") }}">Geologia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("home.memoria") }}">Testemunhos</a>
                </li>
            </ul>


        </div>
    </div>
</nav>
