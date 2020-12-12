@extends('master')

@section('content')
<div class="container-import">
    <br/>
    <h3 align="center">Importar Ficheiro Excel</h3>
    <br/>

    <form action="{{ url('/import_excel/import') }}" enctype="multipart/form-data" method="post" id="form-import">
        {{ csrf_field() }}
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
                        <th>NativeDistribution</th>
                        <th>ConservationStatus</th>
                        <th>StatusAzores</th>
                        <th>ShortDescription</th>
                        <th>LastUpdated</th>
                    </tr>
                    @foreach($rows as $row)
                    <tr>
                        <td>{{ $row->NumControlo }}</td>
                        <td>{{ $row->Group }}</td>
                        <td>{{ $row->Division }}</td>
                        <td>{{ $row->Family }}</td>
                        <td>{{ $row->ScientificName }}</td>
                        <td>{{ $row->CommonName }}</td>
                        <td>{{ $row->NativeDistribution }}</td>
                        <td>{{ $row->ConservationStatus }}</td>
                        <td>{{ $row->StatusAzores }}</td>
                        <td>{{ $row->ShortDescription }}</td>
                        <td>{{ $row->LastUpdated }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
