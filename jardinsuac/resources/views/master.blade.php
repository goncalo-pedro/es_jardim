<!doctype html>
<html lang="PT">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset("style.css")}}">

    <title>Jardins UAC</title>
</head>
<body>
    @include('myViews.navbar1')
    @yield('content')

<style>
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
