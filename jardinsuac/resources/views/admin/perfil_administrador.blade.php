@extends('admin.master')

@section('content')
    <form action='{{ route("administradores.edit", $administrador->id) }}' enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
        @method('GET')
        <p>{{ $administrador->name }}</p>
        <p>{{ $administrador->email }}</p>
        <label> Nível de acesso:
            <select id="n_acesso" name="n_acesso">
                @if($administrador->admin_master == 1)
                    <option value="0">0</option>
                    <option value="1" selected>1</option>
                @else
                    <option value="0" selected>0</option>
                    <option value="1">1</option>
                @endif

            </select>
        </label>
        <div>
            <button type="submit">Alterar</button>
        </div>
    </form>


@endsection
