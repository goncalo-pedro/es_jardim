@extends('admin.master')

@section('content')
    <br>
    <br>
    <div class="container-fluid">
    <div class="row d-flex  justify-content-center">
        <div class="col-md-11 showBox" style="padding: 25px;">
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
                <label class="form-label" for="name">Nome:</label>
                <input class="form-control" type="text" id="name" name="name" value="{{old('name')}}">
            </div>
            <div>
                <label class="form-label"  for="email">Email:</label>
                <input class="form-control" type="email" id="email" name="email" value="{{old('email')}}">
            </div>
            <div>
                <label class="form-label" for="password">Password:</label>
                <input class="form-control" type="password" id="password" name="password">
            </div>
            <div>
                <label class="form-label" for="password_confirmation">Confirmar Password:</label>
                <input class="form-control" type="password" id="password_confirmation" name="password_confirmation">
            </div>
            <br>
            <div>
                <button class="btn" type="submit">Criar</button>
            </div>

        </div>
    </form>
@endsection
