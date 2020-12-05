<!DOCTYPE html>
<html lang="pt">
    <head>
    <title>Importar Ficheiro Excel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
<body>
    <div class="container">
        <br />

        <h3 align="center">Importar Ficheiro Excel</h3>
        <br />
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                Upload Validation Error<br><br>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <form action="{{ url('/import_excel/import') }}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <table class="table">
                    <tr>
                        <td width="40%" align="right">
                            <label>Select File for Upload</label>
                        </td>
                        <td width="30%">
                            <input type="file" name="select_file"/>
                        </td>
                        <td width="30%" align="left">
                            <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                        </td>
                    </tr>
                    <tr>
                        <td width="40%" align="right"></td>
                        <td width="30$">
                            <span class="text-muted">.xls, .xslx</span>
                        </td>
                        <td width="30%" align=left"></td>
                    </tr>
                </table>
            </div>
        </form>

        <br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Customer Data</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Customer Name</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>City</th>
                        </tr>
                        @foreach($data as $row)
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
</body>
</html>
