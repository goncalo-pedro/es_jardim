@extends('admin.master')

@section('content')

    <br>
    <br>

    <div class="row d-flex  justify-content-center text-center">
        <div class="showBox col-md-4" style="padding: 25px">
            <h3>Dados Administrador</h3>
            <br>
            <form action='{{ route("administradores.edit", $administrador->id) }}' enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                @method('GET')
                <p><b>Nome:</b> {{ $administrador->name }}</p>
                <p><b>Email:</b> {{ $administrador->email }}</p>
                <div class="mb-3">
                    <label class="form-label"> <b>Nível de acesso:</b>
                        <select class="form-control" id="n_acesso" name="n_acesso">
                            @if($administrador->admin_master == 1)
                                <option value="0">Baixo Nível</option>
                                <option value="1" selected>Alto Nível</option>
                            @else
                                <option value="0" selected>Baixo Nível</option>
                                <option value="1">Alto Nível</option>
                            @endif

                        </select>
                    </label>
                </div>
                <div>
                    <button type="submit" class="btn">Alterar</button>
                </div>
            </form>
        </div>
    </div>


@endsection
