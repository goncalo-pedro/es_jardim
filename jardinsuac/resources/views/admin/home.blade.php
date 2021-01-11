@extends('admin.master')

@section('content')

    <div class="row" style="margin: 10px">
        @if($user->admin_master == 0)
        <div class="col-md-12">
        @else
        <div class="col-md-8">
        @endif
            <div class="card" style="box-shadow: 3px 2px 5px lightgrey">
                <div class="card-header">
                    Gerir Base de Dados
                </div>
                <div class="card-body">
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
                    <div class="custom-file">
                        <h4>Importar Base de Dados<br><small style="font-size: 13px;">Na importação da base de dados vai ser necessário um ficheiro com a extensão .xlsx.</small></h4>
                        <form action="{{ route('admin.importar') }}" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}

                                <input type="file" name="select_file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01"></label>
                                <button type="submit" class="btn">Importar Base de Dados </button>
                        </form>
                    </div>
                    <hr>
                    <div>
                        <h4>Exportar Base de Dados<br><small style="font-size: 13px;">Na exportação do ficheiro vai ser gerado um ficheiro com a extensão .xlsx.</small></h4>

                        <form action="{{ route('excel.export') }}" enctype="multipart/form-data" method="post" id="form-export">
                            {{ csrf_field() }}
                            <button  type="submit" class="btn">Exportar Base de Dados</button>
                        </form>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-hover table-sm" id="table-import">
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
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @if($user->admin_master == 1)
            <div class="col-md-4">
                <div class="card" style="box-shadow: 3px 2px 5px lightgrey">
                    <div class="card-header">
                        Gerir Administradores
                    </div>
                    <div class="card-body">
                        <a  href="{{ route("administradores.create") }}" class="btn">Resgistar novo Administrador</a>
                        <hr>
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
        @endif
    </div>
    <script type="text/javascript">
        asdfasdf
    </script>

@endsection
        <script>
            import Button from "@/Jetstream/Button";
            export default {
                components: {Button}
            }
        </script>
