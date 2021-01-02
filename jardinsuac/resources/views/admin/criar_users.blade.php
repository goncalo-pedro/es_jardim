@extends('admin.master')

@section('content')
    <form action="{{ route('administradores.store') }}" enctype="multipart/form-data" method="post">
        {{csrf_field()}}
        <div>
            <h1>Criar Administrador</h1>
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
                <label for="name">Nome:</label><input type="text" id="name" name="name" value="{{old('name')}}">
            </div>
            <div>
                <label for="email">Email:</label><input type="email" id="email" name="email" value="{{old('email')}}">
            </div>
            <div>
                <label for="password">Password:</label><input type="password" id="password" name="password">
            </div>
            <div>
                <label for="password_confirmation">Confirmar Password:</label><input type="password" id="password_confirmation" name="password_confirmation">
            </div>
            <div>
                <button type="submit">Criar</button>
            </div>

        </div>
    </form>
@endsection
