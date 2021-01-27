@extends('admin.master')

@section('content')
    <div class="row showBox">
        <div class="row">
            <h4>Ficha de Exemplar</h4>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->nome_visitante}}</p>
                <br>
            </div>

            <div class="col">
                <h6>Faixa etária</h6>
                    <p>{{$memoria->faixa_etaria}}</p>
                <br>
            </div>

            <div class="col">
                <h6>Estatuto</h6>
                    <p>{{$memoria->estatuto}}</p>
                <br>
            </div>

            <div class="col">
                <h6>Classificação</h6>
                    <p>{{$memoria->classificacao}}</p>
                <br>
            </div>
    </div>
@endsection
