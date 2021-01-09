@extends('admin.master')

@section('content')

    <br>
    <br>

    <div class="row d-flex  justify-content-center">
        <div class="showBox col-md-4" style="padding: 25px">
            <form action="{{ route('admin.alterarDados') }}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                <div>
                    <h1> Dados Utilizador</h1>
                    <div id="errors">
                        @if($errors->any())
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li style="color: red">
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="u_name">Nome</label>
                        <input class="form-control" type="text" id="u_name" name="u_name" value="{{ $user->name }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="u_email">Email</label>
                        <input class="form-control" type="text" id="u_email" name="u_email" value="{{ $user->email }}">
                    </div>
                    @if($user->admin_master == 1)
                        <p>Acesso a conteúdo de alto nível</p>
                    @else
                        <p>Acesso a conteúdo de baixo nível</p>
                    @endif
                </div>
                <button class="btn" type="submit">Alterar Dados</button>
            </form>
        </div>
        <br>
        <div class="showBox col-md-4" style="padding: 25px">
            <form action="{{ route('admin.alterarPassword') }}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                <div>
                    <h1> Mudar Password</h1>
                    <div class="mb-3">
                        <label class="form-label" for="current_password">Password Atual:</label>
                        <input class="form-control" type="password" id="current_password" name="current_password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Nova Password:</label>
                        <input class="form-control" type="password" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password_confirmation">Verificar nova Password:</label>
                        <input class="form-control" type="password" id="password_confirmation" name="password_confirmation">
                    </div>
                </div>
                <button class="btn" type="submit">Alterar Password</button>
            </form>
        </div>
    </div>









@endsection
