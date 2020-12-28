@extends('admin.master')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <h1 style="text-align: center">TAXAS DE PORTE</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4" style="max-width: 60%; position: absolute; right:5%">
    @foreach($taxas as $taxa)
            <div class="col">
            <div class="card" style="max-width: 500px;">
                <div class="card-img-top">
                    <img class="card-img" src="https://www.ofitexto.com.br/wp-content/uploads/2019/11/images-3.jpg" alt="Suresh Dasari Card">
                </div>

                <div class="card-body" style="display:flex; flex-direction:column">
                    <h5 class="card-title">{{$taxa->CommonName}}</h5>
                    <h6 class="card-title">{{$taxa->ScientificName}}</h6>
                    <a style="margin-top: auto;" href="#" class="btn btn-primary align-self-end">Saber Mais</a>
                </div>
            </div>
            </div>
            <br>
    @endforeach
    </div>
@endsection

