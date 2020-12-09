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
            <h3 class="panel-title">Customer Data</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table-import">
                    <tr>
                        <th>Customer Name</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>City</th>
                    </tr>
                    @foreach($rows as $row)
                    <tr>
                        <td>{{ $row->CustomerName }}</td>
                        <td>{{ $row->Gender }}</td>
                        <td>{{ $row->Address }}</td>
                        <td>{{ $row->City }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
