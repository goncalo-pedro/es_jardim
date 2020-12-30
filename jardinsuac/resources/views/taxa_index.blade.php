@extends('master')

@section('content')
    <h1 style="text-align: center">TAXAS DE PORTE</h1>
    <br>
    <br>
    <div>
        <div style="width: 30%; height:100%; float: left">
            <h4>FILTROS</h4>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                @foreach(array_keys($paramLista) as $key)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading{{str_replace(' ', '', $key)}}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{str_replace(' ', '', $key)}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                {{$key}}
                            </button>
                        </h2>
                        <div id="flush-collapse{{str_replace(' ', '', $key)}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{str_replace(' ', '', $key)}}" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                @foreach($paramLista[$key] as $param)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{$param}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div id="listTaxas" class="row .row-cols-md-2" style="margin-left:28%">
            @foreach($taxas as $taxa)
                <div class="card mb-3" style="margin: 5px">
                    <div class="row g-0">
                        <div class="card-body">
                            <h5 class="card-title">{{$taxa->Nome_comum}}</h5>
                            <h6 class="card-subtitle">{{$taxa->ScientificName}}</h6>
                            <p class="card-text">{{$taxa->Breve_descricao}}</p>
                            <button type="button" class="btn" >Saber Mais</button>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endsection
    </div>
