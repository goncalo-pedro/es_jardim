@extends('admin.master')

@section('content')

    <div class="row" style="margin: 10px">
        <div class="col-md-8">
            <div class="card" style="box-shadow: 3px 2px 5px lightgrey">
                <div class="card-header">
                    GERIR BASE DE DADOS
                </div>
                <div class="card-body">
                    <p class="card-text">Importe e exporte ficheiro excel</p>
                    <a  href="{{ route("taxas.index")}}" class="btn">Importar Base de Dados</a>
                    <a  href="{{ route("excel.export_file")}}" class="btn">Exportar Base de Dados</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="box-shadow: 3px 2px 5px lightgrey">
                <div class="card-header">
                    Gerir Administradores
                </div>
                <div class="card-body">
                    <a  href="{{ route("criar_user") }}" class="btn">Resgistar novo Administrador</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin: 10px">
        <div class="col-md-8">

            <div class="card" style="box-shadow: 3px 2px 5px lightgrey">
                <div class="card-header">
                    Inventário de Conteúdos Taxa
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="table-import">
                            <tr>
                                <th>NumControlo</th>
                                <th>Group</th>
                                <th>Division</th>
                                <th>Family</th>
                                <th>ScientificName</th>
                                <th>CommonName</th>
                            </tr>
                            @foreach($rows as $row)
                                <tr>
                                    <td>{{ $row->NumControlo }}</td>
                                    <td>{{ $row->Group }}</td>
                                    <td>{{ $row->Division }}</td>
                                    <td>{{ $row->Family }}</td>
                                    <td>{{ $row->ScientificName }}</td>
                                    <td>{{ $row->CommonName }}</td>
                                    <td>
                                        <form action='{{ route("taxas.show", $row->id) }}' enctype="multipart/form-data" method="post">
                                            {{ csrf_field() }}
                                            @method('GET')
                                            <button type="submit">Perfil</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="card" style="box-shadow: 3px 2px 5px lightgrey">
                <div class="card-header">
                    Lista de Administradores
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="table-import">
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                            </tr>
                            @foreach($admins as $admin)
                                <tr>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                </tr>
                            @endforeach
                        </table>
                </div>
            </div>
        </div>
    </div>

@endsection
