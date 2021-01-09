<!doctype html>
<html lang="PT">
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <title>Jardins UAC</title>
</head>
<body>
    @include('myViews.navbar')
    @yield('content')

    <style>
        .showBox{
            border-radius:5px;
            box-shadow: 0px 0px 15px lightgrey;
            padding: 10px;
            margin-left:5%;
            margin-right: 5%;
        }
        body{
            background-color: #FAFAFA;
        }
        .navbar{
            background-color: #102146;
        }
        .btn{
            border-color: #102146;
        }

        .btn:hover{
            background-color: #102146;
            color:white;
        }
        #button-download{
            background-color: DodgerBlue;
            border: none;
            color: white;
            padding: 12px 30px;
            cursor: pointer;
            font-size: 20px;
        }

        #button-download:hover{
            background-color: RoyalBlue;
        }

        #form-import{
            padding-bottom: 5%;
            width:40%;
            margin:auto;
        }

        .panel-heading{
            text-align: center;
            padding-bottom:3%;
        }

        #table-import{
            margin:auto;
            width:75%;
        }

        .container-import{padding-top: 8%;}
        .container-export{padding-top: 8%;}

        #navbar{
            box-shadow: 2px 2px 20px rgba(0,0,0,0.30);
        }

        #carousel-container{
            width: 100%;
        }

        #carousel-inner{
            width:100%;
            max-height: 200px;
        }

</style>
</body>
</html>
