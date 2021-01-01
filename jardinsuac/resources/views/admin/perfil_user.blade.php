@extends('admin.master')

@section('content')
    <form action="{{ route('admin.alterarDados') }}" enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
        <div>
            <h1> Dados Utilizador</h1>
            <div>
                <label for="u_name">Nome</label><input type="text" id="u_name" name="u_name" value="{{ $user->name }}">
            </div>
            <div>
                <label for="u_email">Email</label><input type="text" id="u_email" name="u_email" value="{{ $user->email }}">
            </div>
            @if($user->admin_master == 1)
                <p>Acesso a conteúdo de alto nível</p>
            @else
                <p>Acesso a conteúdo de baixo nível</p>
            @endif
        </div>
        <button type="submit">Alterar Dados</button>
    </form>
    <form action="{{ route('admin.alterarPassword') }}" enctype="multipart/form-data" method="post">
        <div>
            <h1> Mudar Password</h1>
            <div>
                <label for="c_password">Current Password:</label><input type="password" id="c_password" name="c_password">
            </div>
            <div>
                <label for="n_password">Nova Password:</label><input type="password" id="n_password" name="n_password">
            </div>
            <div>
                <label for="vn_password">Verificar nova Password:</label><input type="password" id="vn_password" name="vn_password">
            </div>
        </div>
        <button type="submit">Alterar Password</button>
        <input type="hidden" value="{{ $user->id }}" id="user" name="user">

    </form>


@endsection
