@extends('admin.master')

@section('content')

    <br>
    <br>
    <div class="row showBox">
        <form action="{{ route('taxas.update', $id) }}" enctype="multipart/form-data" method="post">
            {{csrf_field()}}
            @method('PATCH')
            <div class="row">
                <div class="col-md-4 offset-md-2">
                    <h4>Imagem da Taxa de porte</h4>
                    <input type="file" class="custom-file-input" id="ficheiro_taxa" name="ficheiro_taxa">
                    <label class="custom-file-label" for="validatedCustomFile" name="ficheiro_taxa"></label>
                </div>
                <div class="col-md-4">
                    <h4>Imagem da Taxa de porte enquadrada</h4>
                    <input type="file" class="custom-file-input" id="ficheiro_enquadramento" name="ficheiro_enquadramento">
                    <label class="custom-file-label" for="validatedCustomFile" name="ficheiro_enquadramento"></label>
                </div>
            </div>
            <button type="submit" class="btn">Adicionar Imagens</button>
        </form>
        <br><br><br><br>
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
