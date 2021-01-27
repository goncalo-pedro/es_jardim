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
            @if($memoria->foto_edificado == 1)
                <div class="col">
                    <h6>Nome</h6>
                        <p>{{$memoria->foto_edificado}}</p>
                    <br>
                </div>
            @endif
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->condicoes_partilha_campus}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->foto1_campus}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->foto2_campus}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->foto3_campus}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->foto4_campus}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->foto5_campus}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->foto6_campus}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                <p>{{$memoria->foto7_campus}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                <p>{{$memoria->foto8_campus}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                <p>{{$memoria->foto9_campus}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                <p>{{$memoria->foto10_campus}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->data_fotos_campus}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->testemunhos_fotos_campus}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->recordar_planta}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->nome_plantas_recordar}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->planta_existe}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->local_planta}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->planta_existe_removida}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->acontecimento_desaprecimento}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->fotografia_video_panta}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->condicoes_partilha_planta}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->foto1_planta}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->foto2_planta}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->foto3_planta}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->foto4_planta}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->foto5_planta}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->foto6_planta}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->foto7_planta}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->foto8_planta}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->foto9_planta}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->foto10_planta}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->data_fotos_planta}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Classificação</h6>
                    <p>{{$memoria->classificacao}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->opinião_jardim}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->outras_observacoes}}</p>
                <br>
            </div>
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->created_at}}</p>
                <br>
            </div>
    </div>
@endsection
