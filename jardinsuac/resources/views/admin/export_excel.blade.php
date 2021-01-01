@extends('admin.master')

@section('content')
<div class="container-export">
    <br/>
    <h3 align="center">Download Ficheiro Excel</h3>
    <br/>
    <form action="{{ route('excel.export') }}" enctype="multipart/form-data" method="get" id="form-export">
        {{ csrf_field() }}
        <div class="form-group">
            <table class="table">
                <tr>
                    <td>
                        <br>
                        <button class="btn" id="button-download" name="download" value="Download" style="width:15%"><i class="fa fa-download"></i> Download</button>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>
@endsection
