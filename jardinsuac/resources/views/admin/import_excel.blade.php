@extends('admin.master')

@section('content')
<div class="container-import">
    <br/>
    <h3 style='text-align: center'>Importar Ficheiro Excel</h3>
    <br/>


    <form action="{{ route('admin.importar') }}" enctype="multipart/form-data" method="post" id="form-import">
        {{ csrf_field() }}
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li style="color: red">
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        @endif

        <section class="section-preview">
            <div  class="input-group my-3">
                <div class="input-group-prepend">
                    <input type="submit" class="button" name="upload" value="Upload"/>
                </div>
                <div class="custom-file">
                    <input type="file" name="select_file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Selecionar ficheiro</label>
                </div>
            </div>
        </section>
    </form>


    <br/>
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
@endsection
