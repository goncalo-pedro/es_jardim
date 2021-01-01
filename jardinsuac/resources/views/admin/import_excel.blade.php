@extends('admin.master')

@section('content')
    <br><br>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Inventário de Conteúdos Taxa</h3>
        </div>
        <div class="panel-body">
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
                                <button type="submit" class="btn">Perfil</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
