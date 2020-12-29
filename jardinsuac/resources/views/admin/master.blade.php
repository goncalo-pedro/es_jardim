<!doctype html>
<html lang="PT">
<head>
    <meta charset="utf-8">

    <title>Jardins UAC</title>
</head>
<body>
    @include('myViews.navbar')
    @yield('content')

<style>
    body{
        background-color: #FAFAFA;
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
