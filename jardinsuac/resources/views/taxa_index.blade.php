@extends('master')

@section('content')

    <div class="container">
        <div class="row">
            <h1>Taxas de Porte</h1>
        </div>
        <div class="row justify-content-between">
            <div class="col-md-3">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Filtros
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
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
                                                        @if($param != null)
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="{{str_replace(' ', '', $key)}}{{str_replace(' ', '', $param)}}">
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    {{$param}}
                                                                </label>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            </div>
            <div class="col-md-8">
                <div id="listTaxas" class="row row-cols-1 row-cols-md-1">
                    @foreach($taxas as $taxa)
                        <div class="col">
                            <div class="card mb-3 " style="margin: 5px">
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
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
