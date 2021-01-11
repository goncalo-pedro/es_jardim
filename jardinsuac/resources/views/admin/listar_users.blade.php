@extends('admin.master')

@section('content')

    <br>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Administradores</h3>
        </div>
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
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table-import">
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Responsabilidades</th>
                        <td>Perfil</td>
                    </tr>
                    @foreach($users as $administrador)
                        <tr>
                            <td>{{$administrador->name}}</td>
                            <td>{{$administrador->email}}</td>
                            @if($administrador->admin_master == 1)
                                <td>Alto Nível</td>
                            @else
                                <td>Baixo Nível</td>
                            @endif
                            <td>
                                <form action='{{ route("administradores.show", $administrador->id) }}' enctype="multipart/form-data" method="post">
                                    {{ csrf_field() }}
                                    @method('GET')
                                    <button type="submit" class="btn">Perfil</button>
                                </form>
                                <form action="{{route("administradores.destroy", $administrador->id)}}" enctype="multipart/form-data" method="post">
                                    {{csrf_field()}}
                                    @method('DELETE')
                                    <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
@endsection
                    <script>
                        import Button from "@/Jetstream/Button";
                        export default {
                            components: {Button}
                        }
                    </script>
