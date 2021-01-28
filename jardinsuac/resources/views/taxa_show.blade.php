@extends('master')

@section('content')

    <br>
    <br>
    <div class="container-fluid">
        <div class="row showBox">
            <div class="row">
                <div class="col-md-4 offset-md-1" style="">
                    <h4 class="text-center">Taxa</h4>
                    <img class="img-fluid"  src="{{asset($taxa->imagemTaxa)}}">
                </div>
                <div class="col-md-4 offset-md-2" style="">
                    <h4 class="text-center">Enquadramento</h4>
                    <img class="img-fluid"  src="{{asset($taxa->imagemEnquadramento)}}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <h1>{{$taxa->Nome_comum}}</h1>
                </div>
                <div class="row">
                    <h4><i>{{$taxa->ScientificName}}</i></h4>
                </div>
                <div class="row">
                    <p>{{$taxa->Breve_descricao}}</p>
                </div>
                <div class="row">
                    <a href="{{$taxa->Scientific_name_Link}}" target="_blank" class="btn">Visitar Plant List</a>
                </div>
            </div>
        </div>

        <br>

        <div class="row showBox">
            <div class="row">
                <h4>Caracteristicas</h4>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                @foreach(array_keys($caracteristicas) as $cr)
                <div class="col">
                    <h6>{{$cr}}</h6>
                    <p>{{$caracteristicas[$cr]}}</p>
                    <br>
                </div>
                @endforeach
            </div>
        </div>
        <br>
        <br>
    </div>

@endsection
<script>
    import Button from "@/Jetstream/Button";
    export default {
        components: {Button}
    }
</script>
