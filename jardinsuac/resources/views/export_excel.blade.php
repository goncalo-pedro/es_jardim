<!DOCTYPE html>
<html lang="pt">
<head>
    <title>Download Ficheiro Excel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <br />
        <h3 align="center">Download Ficheiro Excel</h3>
        <br />

        <form action="{{ url('/export_excel') }}" enctype="multipart/form-data" method="get">
            {{ csrf_field() }}
            <div class="form-group">
                <table class="table">
                    <tr>
                        <td width="30%" align="left">
                            <input type="submit" name="download" class="btn btn-primary" value="Download">
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
</body>
</html>
