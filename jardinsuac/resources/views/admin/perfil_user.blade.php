@extends('admin.master')

@section('content')
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
        {{ csrf_field() }}
        <div>
            <h1> Mudar Password</h1>
            <div>
                <label for="current_password">Current Password:</label><input type="password" id="current_password" name="current_password">
            </div>
            <div>
                <label for="password">Nova Password:</label><input type="password" id="password" name="password">
            </div>
            <div>
                <label for="password_confirmation">Verificar nova Password:</label><input type="password" id="password_confirmation" name="password_confirmation">
            </div>
        </div>
        <button type="submit">Alterar Password</button>
    </form>


@endsection
