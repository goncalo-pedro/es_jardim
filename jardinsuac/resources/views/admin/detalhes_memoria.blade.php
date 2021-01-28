@extends('admin.master')

@section('content')
    <div class="row showBox">
        <div class="row">
            <h4>Testemunho</h4>
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
                    <h6>Possui alguma fotografia ou vídeo do atual campus universitário que deseje partilhar?</h6>
                        <p>Sim</p>
                    <br>
                </div>
                @if($memoria->condicoes_partilha_campus != "")
                    <div class="col">
                        <h6>Fotos do Espaço e Eventos</h6>
                        <img style="max-width: 100%" src="{{ asset($memoria->foto1_campus) }}">
                        <br>
                    </div>
                @endif
                @if($memoria->foto1_campus != "")
                    <div class="col">
                        <h6>Fotos do Espaço e Eventos</h6>
                            <img style="max-width: 100%" src="{{ asset($memoria->foto1_campus) }}">
                        <br>
                    </div>
                @endif
                @if($memoria->foto2_campus != "")
                    <div class="col">
                        <h6></h6>
                            <img style="max-width: 100%" src="{{ asset($memoria->foto2_campus) }}">
                        <br>
                    </div>
                @endif
                @if($memoria->foto3_campus != "")
                    <div class="col">
                        <h6></h6>
                            <img style="max-width: 100%" src="{{ asset($memoria->foto3_campus) }}">
                        <br>
                    </div>
                @endif
                @if($memoria->foto4_campus != "")
                    <div class="col">
                        <h6></h6>
                            <img style="max-width: 100%" src="{{ asset($memoria->foto4_campus) }}">
                        <br>
                    </div>
                @endif
                @if($memoria->foto5_campus != "")
                    <div class="col">
                        <h6></h6>
                            <img style="max-width: 100%" src="{{ asset($memoria->foto5_campus) }}">
                        <br>
                    </div>
                @endif
                @if($memoria->foto6_campus != "")
                    <div class="col">
                        <h6></h6>
                            <img style="max-width: 100%" src="{{ asset($memoria->foto6_campus) }}">
                        <br>
                    </div>
                @endif
                @if($memoria->foto7_campus != "")
                    <div class="col">
                        <h6></h6>
                            <img style="max-width: 100%" src="{{ asset($memoria->foto7_campus) }}">
                        <br>
                    </div>
                @endif
                @if($memoria->foto8_campus != "")
                    <div class="col">
                        <h6></h6>
                            <img style="max-width: 100%" src="{{ asset($memoria->foto8_campus) }}">
                        <br>
                    </div>
                @endif
                @if($memoria->foto9_campus != "")
                    <div class="col">
                        <h6></h6>
                            <img style="max-width: 100%" src="{{ asset($memoria->foto9_campus) }}">
                        <br>
                    </div>
                @endif
                @if($memoria->foto10_campus != "")
                    <div class="col">
                        <h6></h6>
                            <img style="max-width: 100%" src="{{ asset($memoria->foto10_campus) }}">
                        <br>
                    </div>
                @endif
                @if($memoria->data_fotos_campus != "")
                    <div class="col">
                        <h6>Data quando as fotos foram tiradas</h6>
                            <p>{{$memoria->data_fotos_campus}}</p>
                        <br>
                    </div>
                @endif
                @if($memoria->testemunho_fotos_campus != "")
                    <div class="col">
                        <h6>Gostaria de adicionar algum testemunho?</h6>
                            <p>{{$memoria->testemunho_fotos_campus}}</p>
                        <br>
                    </div>
                @endif
            @endif
            @if($memoria->recordar_planta == 1)
                <div class="col">
                    <h6>Recorda alguma planta?</h6>
                        <p>Sim</p>
                    <br>
                </div>
                @if($memoria->nome_plantas_recordar != "")
                <div class="col">
                    <h6>qual/quais?</h6>
                    <p>{{$memoria->nome_plantas_recordar}}</p>
                    <br>
                </div>
                @endif
                @if($memoria->planta_existe == 1)
                    <div class="col">
                        <h6>A Planta ainda existe no Jardim?</h6>
                            <p>Sim</p>
                        <br>
                    </div>
                @endif
                @if($memoria->local_planta != "")
                <div class="col">
                    <h6>Onde se encontra a planta?</h6>
                        <p>{{$memoria->local_planta}}</p>
                    <br>
                </div>
                @endif
                @if($memoria->planta_existe_removida != "")
                    <div class="col">
                        <h6>Em que ano essa planta foi plantada ou já existia no jardim?</h6>
                            <p>{{$memoria->planta_existe_removida}}</p>
                        <br>
                    </div>
                @endif
                @if($memoria->acontecimento_desaprecimento != "")
                    <div class="col">
                        <h6>Se a planta já não existe no jardim, recorda-se da causa do seu desaparecimento?</h6>
                            <p>{{$memoria->acontecimento_desaprecimento}}</p>
                        <br>
                    </div>
                @endif
                @if($memoria->fotografia_video_planta == 1)
                    <div class="col">
                        <h6>Tem alguma foto ou vídeo da planta?</h6>
                            <p>Sim</p>
                        <br>
                    </div>
                    @if($memoria->condicoes_partilha_planta != "")
                        <div class="col">
                            <h6>Condições de partilho</h6>
                            <p>{{$memoria->condicoes_partilha_planta}}</p>
                            <br>
                        </div>
                    @endif
                    @if($memoria->foto1_planta != "")
                    <div class="col">
                        <h6>Fotos da planta</h6>
                            <img style="max-width: 100%" src="{{ asset($memoria->foto1_planta) }}">
                        <br>
                    </div>
                    @endif
                    @if($memoria->foto2_planta != "")
                        <div class="col">
                            <h6></h6>
                                <img style="max-width: 100%" src="{{ asset($memoria->foto2_planta) }}">
                            <br>
                        </div>
                    @endif
                    @if($memoria->foto3_planta != "")
                        <div class="col">
                            <h6></h6>
                                <img style="max-width: 100%" src="{{ asset($memoria->foto3_planta) }}">
                            <br>
                        </div>
                    @endif
                    @if($memoria->foto4_planta != "")
                        <div class="col">
                            <h6></h6>
                                <img style="max-width: 100%" src="{{ asset($memoria->foto4_planta) }}">
                            <br>
                        </div>
                    @endif
                    @if($memoria->foto5_planta != "")
                        <div class="col">
                            <h6></h6>
                                <img style="max-width: 100%" src="{{ asset($memoria->foto5_planta) }}">
                            <br>
                        </div>
                    @endif
                    @if($memoria->foto6_planta != "")
                        <div class="col">
                            <h6></h6>
                                <img style="max-width: 100%" src="{{ asset($memoria->foto6_planta) }}">
                            <br>
                        </div>
                    @endif
                    @if($memoria->foto7_planta != "")
                        <div class="col">
                            <h6></h6>
                                <img style="max-width: 100%" src="{{ asset($memoria->foto7_planta) }}">
                            <br>
                        </div>
                    @endif
                    @if($memoria->foto8_planta != "")
                        <div class="col">
                            <h6></h6>
                                <img style="max-width: 100%" src="{{ asset($memoria->foto8_planta) }}">
                            <br>
                        </div>
                    @endif
                    @if($memoria->foto9_planta != "")
                        <div class="col">
                            <h6></h6>
                                <img style="max-width: 100%" src="{{ asset($memoria->foto9_planta) }}">
                            <br>
                        </div>
                    @endif
                    @if($memoria->foto10_planta != "")
                        <div class="col">
                            <h6></h6>
                                <img style="max-width: 100%" src="{{ asset($memoria->foto10_planta) }}">
                            <br>
                        </div>
                    @endif
                    @if($memoria->data_fotos_planta != "")
                        <div class="col">
                            <h6>Data das fotos</h6>
                            <p>{{$memoria->data_fotos_planta}}</p>
                            <br>
                        </div>
                    @endif
                    @if($memoria->testemunho_fotos_planta != "")
                        <div class="col">
                            <h6>Testemunho</h6>
                            <p>{{$memoria->testemunho_fotos_planta}}</p>
                            <br>
                        </div>
                    @endif
                @endif
            @endif
            <div class="col">
                <h6>Classificação</h6>
                    <p>{{$memoria->classificacao}}</p>
                <br>
            </div>
            @if($memoria->opinião_jardim != "")
            <div class="col">
                <h6>O que mudava no jardim?</h6>
                    <p>{{$memoria->opinião_jardim}}</p>
                <br>
            </div>
            @endif
            @if($memoria->outras_observacoes != '')
            <div class="col">
                <h6>Outras observações</h6>
                    <p>{{$memoria->outras_observacoes}}</p>
                <br>
            </div>
            @endif
            <div class="col">
                <h6>Nome</h6>
                    <p>{{$memoria->created_at}}</p>
                <br>
            </div>
    </div>
@endsection
