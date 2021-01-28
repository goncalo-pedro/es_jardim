@extends('admin.master')

@section('content')

    <br>
    <br>
    <div class="row showBox">
        <div class="row">
            <a href="{{ route("taxas.edit", $id) }}" class="btn">Editar</a>
        </div>
        <br>
        <div class="row">
            <br>
            <div class="col-md-4 offset-md-1">
                <h6 class="text-center">Imagem Enquandramento</h6>
                @if($row->imagemEnquadramento != "")
                    <img style="max-width: 100%" src="{{ asset($row->imagemEnquadramento) }}" alt="">
                @endif
            </div>
            <div class="col-md-4 offset-md-1">
                <h6 class="text-center">Imagem Taxa</h6>
                @if($row->imagemTaxa != "")
                    <img style="max-width: 100%" src="{{ asset($row->imagemTaxa) }}" alt="">
                @endif
            </div>
        </div>
        <hr>
        <div class="row">
            <h4>Ficha de Exemplar (Inglês)</h4>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
            <div class="col">
                <h6>Common Name</h6>
                @foreach($nomes as $nome)
                    <p>{{$nome->common_name}}</p>
                @endforeach
                <br>
            </div>

            <div class="col">
                <h6>Common Name References</h6>
                @foreach($commonNames as $commonName)
                    <p>{{$commonName->common_name_reference}}</p>
                @endforeach
                <br>
            </div>

            <div class="col">
                <h6>Common Name Links</h6>
                @foreach($commonNames as $commonName)
                    <p>{{$commonName->common_name_link}}</p>
                @endforeach
                <br>
            </div>

            <div class="col">
                <h6>Conservations Status</h6>
                @foreach($conservations as $conservation)
                    <p>{{$conservation->conservation_status}}</p>
                @endforeach
                <br>
            </div>

            <div class="col">
                <h6>Conservation Status References</h6>
                @foreach($conservationsStatus as $conservationStatus)
                    <p>{{$conservationStatus->conservation_status_reference}}</p>
                @endforeach
                <br>
            </div>

            <div class="col">
                <h6>Conservation Status Links</h6>
                @foreach($conservationsStatus as $conservationStatus)
                    <p>{{$conservationStatus->conservation_status_link}}</p>
                @endforeach
                <br>
            </div>


            @foreach(array_keys($caractIng) as $cr)
                <div class="col">
                    <h6>{{$cr}}</h6>
                    <p>{{$caractIng[$cr]}}</p>
                    <br>
                </div>
            @endforeach
        </div>
    </div>
    <br>
    <div class="row showBox">
        <div class="row">
            <h4>Ficha de Exemplar (Português)</h4>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
            @foreach(array_keys($caractPt) as $cr)
                <div class="col">
                    <h6>{{$cr}}</h6>
                    <p>{{$caractPt[$cr]}}</p>
                    <br>
                </div>
            @endforeach
        </div>
    </div>
    <br>
    <div class="row showBox">
        <div class="row">
            <h4>Pesquisa/Search</h4>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
            @foreach(array_keys($search) as $cr)
                <div class="col">
                    <h6>{{$cr}}</h6>
                    <p>{{$search[$cr]}}</p>
                    <br>
                </div>
            @endforeach
        </div>
    </div>
    <br>
    <div class="row showBox">
        <div class="row">
            <h4>Links</h4>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
            @foreach(array_keys($hyper) as $cr)
                <div class="col">
                    <h6>{{$cr}}</h6>
                    <p>{{$hyper[$cr]}}</p>
                    <br>
                </div>
            @endforeach
        </div>
    </div>
    <br>
@endsection
