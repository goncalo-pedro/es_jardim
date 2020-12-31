@extends('master')

@section('content')

    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <img class="img-fluid"  src="{{asset('images/jardim1.jpg')}}" style="border-radius: 8px;">
            </div>
            <div class="col-md-7">
                <div class="row">
                    <h1>{{$taxa->Nome_comum}}</h1>
                </div>
                <div class="row">
                    <h4><i>{{$taxa->ScientificName}}</i></h4>
                </div>
                <div class="row">
                    <p>{{$taxa->Breve_descricao}}</p>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
        </div>
    </div>




@endsection
