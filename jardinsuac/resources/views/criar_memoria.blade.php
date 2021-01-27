@extends('master')

@section('content')

    <div class="container-fluid">

        <div class="row d-flex  justify-content-center">

            <div class="col-md-11 showBox" style="padding: 25px;">
                <form action="{{ route('testemunhos.store') }}" enctype="multipart/form-data" method="post">
                    {{csrf_field()}}
                    <div>
                        <h1>Criar Memória</h1>
                        <small>Este formulário destina-se a recolher contributos para a construção de uma memória
                        digital coletiva sobre a história do jardim e edificado do Campus Universitário de Ponta Delgada
                        da Universidade dos Açores (UAc). O texto, as imagens e os vídeos recolhidos neste formulário
                        serão arquivados no servidor Web da UAc e tratados de acordo com as autorizações cedidas pelos
                        seus proprietários.</small>
                        <div id="errors">
                            @if($errors->any())
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li style="color: red">
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <br>
                        <hr>
                        <h3>Informação Pessoal</h3>
                        <div class="form-control ">
                            <h6><label class="form-label" for="name">Nome:</label></h6>
                            <input class="form-control" type="text" id="name" name="nome" value="{{old('name')}}">
                        </div>
                        <br>
                        <div class="form-control ">
                            <h6>Idade</h6>
                            <input class="form-check-input" type="radio" id="jovem" name="idade" value="Jovem">
                            <label>Jovem (até 15 anos)</label><br>
                            <input class="form-check-input" type="radio" id="adulto" name="idade" value="Adulto">
                            <label>Jovem (16 - 64 anos)</label><br>
                            <input class="form-check-input" type="radio" id="idoso" name="idade" value="Idoso">
                            <label>Idoso (65 anos e em diante)</label><br>
                        </div>
                        <br>
                        <div class="form-control ">
                            <h6>Estatuto</h6>
                            <input class="form-check-input" type="radio" id="aluno" name="estatuto" value="Aluno">
                            <label>Aluno</label><br>
                            <input class="form-check-input" type="radio" id="exaluno" name="estatuto" value="ex-aluno">
                            <label>Ex-aluno</label><br>
                            <input class="form-check-input" type="radio" id="docente" name="estatuto" value="docente">
                            <label>Docente</label><br>
                            <input class="form-check-input" type="radio" id="exdocente" name="estatuto" value="exdocente">
                            <label>Ex-docente</label><br>
                            <input class="form-check-input" type="radio" id="funcionario" name="estatuto" value="funcionario">
                            <label>Funcionário</label><br>
                            <input class="form-check-input" type="radio" id="exfuncionario" name="estatuto" value="exfuncionario">
                            <label>Ex-funcionário</label><br>
                            <input class="form-check-input" type="radio" id="residente" name="estatuto" value="residente">
                            <label>Residente nos Açores</label><br>
                            <input class="form-check-input" type="radio" id="naoresidente" name="estatuto" value="naoresidente">
                            <label>Visitante não residente nos Açores</label><br>
                        </div>
                        <br>
                        <hr>

                        <h3>Memória do Espaço e de Eventos</h3>
                        <div class="form-control ">
                            <h6>Possui alguma fotografia ou vídeo do atual campus universitário que deseje partilhar?</h6>
                            <input class="form-check-input" type="radio" id="sim" name="foto_edificado" value="sim" onclick="showNotShowEdificado(true)">
                            <label>Sim</label><br>
                            <input class="form-check-input" type="radio" id="nao" name="foto_edificado" value="nao" onclick="showNotShowEdificado(false)">
                            <label>Não</label><br>
                        </div>
                        <br>
                        <div id="permissao" style="display:none" class="form-control ">
                            <h6>Se sim, em que condições aceita partilhar a fotografia/video?</h6>
                            <input class="form-check-input" type="radio" id="sim" name="permissao_edificado" value="Como documento de estudo guardado em arquivo como prova, com acesso restrito e não publicável">
                            <label>Como documento de estudo guardado em arquivo como prova, com acesso restrito e não publicável</label><br>
                            <input class="form-check-input" type="radio" id="nao" name="permissao_edificado" value="Como documento de estudo guardado em arquivo como prova, com acesso restrito e não publicável">
                            <label>Como documento de estudo, com acesso restrito a investigadores e publicável apenas em trabalhos científicos</label><br>
                            <input class="form-check-input" type="radio" id="sim" name="permissao_edificado" value="Como documento de estudo, com acesso restrito a investigadores e publicável apenas em trabalhos científicos">
                            <label>Como documento de estudo e divulgação publicável em trabalhos científicos e na página eletrónica da Universidade dos Açores</label><br>
                            <input class="form-check-input" type="radio" id="nao" name="permissao_edificado" value="Como documento de estudo e divulgação publicável em trabalhos científicos e na página eletrónica da Universidade dos Açores">
                            <label>Como documento de estudo e divulgação publicável e com indicação de utilização livre desde que devidamente referenciada</label><br>
                        </div>
                        <br>
                        <div id="ficheiro_edificado" class="custom-file" style="display:none" class="form-control ">
                            <h6>Fotos do Espaço e Eventos (Ex: vistia, cerimónia académica, sessão fotográfica de noivos, convívio diário, aulas)</h6>
                            <div id="ficheiros_edificado">
                                <input type="file" class="custom-file-input" name="ficheiro_edificado1" id="ficheiro_edificado1">
                                <label class="custom-file-label" for="ficheiro_edificado1"></label>
                                <br>
                                <br>
                            </div>
                            <br>
                            <a onclick="addSubmeterFicheiroEdificado()" class="btn" id="addEdificado">+</a>
                        </div>
                        <br>
                        <div id="data_edifi" style="display:none" class="form-control ">
                            <h6><label class="form-label" for="data_edificado">Data em que as fotos/vídeos foram tiradas (Exemplo: 24/03/2003 ou 2010-2012)</label></h6>
                            <input class="form-control" type="text" id="data_edificado" value="{{old('data_edificado')}}">
                        </div>
                        <br>
                        <div id="testemunho_id" style="display:none" class="form-control ">
                            <h6><label for="testemunho_edificado">Gostaria de adicionar um testemunho escrito à(s) memória(s) adicionada(s)?</label></h6>
                            <textarea class="form-control" id="testemunho_edificado" rows="4"></textarea>
                        </div>
                        <hr>
                        <h3>Memória das Plantas</h3>
                        <div class="form-control ">
                            <h6>Recorda-se de alguma planta em particular?</h6>
                            <input class="form-check-input" type="radio" id="sim" name="planta_recordar" value="sim" onclick="showNotShowPlanta(true)">
                            <label>Sim</label><br>
                            <input class="form-check-input" type="radio" id="nao" name="planta_recordar" value="nao" onclick="showNotShowPlanta(false)">
                            <label>Não</label><br>
                        </div>
                        <br>
                        <div id="planta_quais" style="display:none" class="form-control ">
                            <h6><label for="planta_qual">Se sim, qual/quais?</label></h6>
                            <textarea class="form-control" id="planta_qual" rows="4"></textarea>
                        </div>
                        <br>
                        <div id="planta_existe" style="display:none" class="form-control ">
                            <h6>A Planta ainda existe no Jardim?</h6>
                            <input class="form-check-input" type="radio" id="sim" name="planta_exist" value="sim">
                            <label>Sim</label><br>
                            <input class="form-check-input" type="radio" id="nao" name="planta_exist" value="nao">
                            <label>Não</label><br>
                        </div>
                        <br>
                        <div id="plant_local" style="display:none" class="form-control ">
                            <h6><label for="planta_local">Em que local do jardim estava a planta</label></h6>
                            <textarea class="form-control" id="planta_local" name="planta_local" rows="4"></textarea>
                        </div>
                        <br>
                        <div id="ano_plant" style="display:none" class="form-control ">
                            <h6><label class="form-label" for="ano_planta">Em que ano essa planta foi plantada ou já existia no jardim? Em que ano morreu ou foi removida?</label></h6>
                            <input class="form-control" type="text" id="ano_planta" name="ano_planta" value="{{old('ano_planta')}}">
                        </div>
                        <br>
                        <div id="planta_razao" style="display:none" class="form-control ">
                            <h6><label for="planta_razao_remocao">Se a planta já não existe no jardim, recorda-se da causa do seu desaparecimento? (Exemplos: Dano por tempestado, praga, doença, morte natural, osbtrução de entrada/estrada)</label></h6>
                            <textarea class="form-control" id="planta_razao_remocao" name="planta_razao_remocao" rows="4"></textarea>
                        </div>
                        <br>
                        <div id="plant_foto" style="display:none" class="form-control ">
                            <h6>Possui alguma fotografia ou vídeo em que seja visível a planta?</h6>
                            <input class="form-check-input" type="radio" id="sim" name="planta_foto" value="sim" onclick="showNotShowFotoPlanta(true)">
                            <label>Sim</label><br>
                            <input class="form-check-input" type="radio" id="nao" name="planta_foto" value="nao" onclick="showNotShowFotoPlanta(false)">
                            <label>Não</label><br>
                        </div>
                        <br>
                        <div id="permissao_plant" style="display:none" class="form-control ">
                            <h6>Se si, em que condições aceita partilhar a fotografia/video=</h6>
                            <input class="form-check-input" type="radio" id="sim" name="permissao_planta">
                            <label>Como documento de estudo guardado em arquivo como prova, com acesso restrito e não publicável</label><br>
                            <input class="form-check-input" type="radio" id="nao" name="permissao_planta">
                            <label>Como documento de estudo, com acesso restrito a investigadores e publicável apenas em trabalhos científicos</label><br>
                            <input class="form-check-input" type="radio" id="sim" name="permissao_planta">
                            <label>Como documento de estudo e divulgação publicável em trabalhos científicos e na página eletrónica da Universidade dos Açores</label><br>
                            <input class="form-check-input" type="radio" id="nao" name="permissao_planta">
                            <label>Como documento de estudo e divulgação publicável e com indicação de utilização livre desde que devidamente referenciada</label><br>
                        </div>
                        <br>
                        <div id="ficheiro_planta" style="display:none" class="form-control ">
                            <h6>Fotos das plantas</h6>
                            <div id="ficheiros_planta">
                                <input type="file" class="custom-file-input" id="ficheiro_plantas1" name="ficheiro_plantas1">
                                <label class="custom-file-label" for="validatedCustomFile" name="ficheiro_plantas1"></label>
                                <br><br>
                            </div>
                            <br>
                            <a onclick="addSubmeterFicheiroPlantas()" class="btn" id="addPlantas">+</a>
                        </div>
                        <br>
                        <div class="custom-file" id="data_plant" style="display:none" class="form-control">
                            <h6><label class="form-label" for="data_edificado">Data em que as fotos/vídeos foram tiradas (Exemplo: 24/03/2003 ou 2010-2012)</label></h6>
                            <input class="form-control" type="text" id="data_planta" name="data_planta" value="{{old('data_edificado')}}">
                            <br>
                        </div>
                        <br>
                        <div id="testemunho_plant" style="display:none" class="form-control ">
                            <h6><label for="testemunho_planta">Gostaria de adicionar um testemunho escrito à(s) memória(s) adicionada(s)?</label></h6>
                            <textarea class="form-control" id="testemunho_planta" name="testemunho_planta" rows="4"></textarea>
                        </div>
                        <hr>
                        <h3>Notas/Observações</h3>
                        <br>
                        <div class="form-control ">
                            <h6>Gosta do jardim?</h6>
                            <label class="control-label" for="rating">
                                <span class="field-label-header">How would you rate your ability to use the computer and access internet?*</span><br>
                                <span class="field-label-info"></span>
                                <input type="hidden" id="selected_rating" name="selected_rating" value="" required="required">
                            </label>
                            <h2 class="bold rating-header" style="">
                                <span class="selected-rating">0</span><small> / 5</small>
                            </h2>
                            <button type="button" class="btnrating btn btn-default btn-lg" data-attr="1" id="rating-star-1">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btnrating btn btn-default btn-lg" data-attr="2" id="rating-star-2">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btnrating btn btn-default btn-lg" data-attr="3" id="rating-star-3">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btnrating btn btn-default btn-lg" data-attr="4" id="rating-star-4">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btnrating btn btn-default btn-lg" data-attr="5" id="rating-star-5">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </button>
                        </div>
                        <br>
                        <div class="form-control">
                            <div>
                                <h6><label for="mudar_jardim">O que acha que se pode mudar no jardim?</label></h6>
                                <textarea class="form-control" id="mudar_jardim" name="mudar_jardim" rows="4"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-control ">
                            <div>
                                <h6><label for="observacoes">Outras observações</label></h6>
                                <textarea class="form-control" id="observacoes" name="observacoes" rows="4"></textarea>
                            </div>
                        </div>
                        <br>
                        <div>
                            <button class="btn" type="submit">Criar</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        let edificados = 1;
        let plantas = 1;

        function showNotShowEdificado(value) {
            if(value) {
                document.getElementById("permissao").style.display = "block";
                document.getElementById("ficheiro_edificado").style.display = "block";
                document.getElementById("data_edifi").style.display = "block";
                document.getElementById("testemunho_id").style.display = "block";
            } else{
                document.getElementById("permissao").style.display = "none";
                document.getElementById("ficheiro_edificado").style.display = "none";
                document.getElementById("data_edifi").style.display = "none";
                document.getElementById("testemunho_id").style.display = "none";
            }
        }

        function showNotShowPlanta(value) {
            if(value) {
                document.getElementById("planta_quais").style.display = "block";
                document.getElementById("planta_existe").style.display = "block";
                document.getElementById("plant_local").style.display = "block";
                document.getElementById("ano_plant").style.display = "block";
                document.getElementById("planta_razao").style.display = "block";
                document.getElementById("plant_foto").style.display = "block";
            } else {
                document.getElementById("planta_quais").style.display = "none";
                document.getElementById("planta_existe").style.display = "none";
                document.getElementById("plant_local").style.display = "none";
                document.getElementById("ano_plant").style.display = "none";
                document.getElementById("planta_razao").style.display = "none";
                document.getElementById("plant_foto").style.display = "none";
                document.getElementById("permissao_plant").style.display = "none";
                document.getElementById("ficheiro_planta").style.display = "none";
                document.getElementById("data_plant").style.display = "none";
                document.getElementById("testemunho_plant").style.display = "none";
            }
        }

        function showNotShowFotoPlanta(value) {
            if(value) {
                document.getElementById("permissao_plant").style.display = "block";
                document.getElementById("ficheiro_planta").style.display = "block";
                document.getElementById("data_plant").style.display = "block";
                document.getElementById("testemunho_plant").style.display = "block";
            } else {
                document.getElementById("permissao_plant").style.display = "none";
                document.getElementById("ficheiro_planta").style.display = "none";
                document.getElementById("data_plant").style.display = "none";
                document.getElementById("testemunho_plant").style.display = "none";
            }
        }

        function addSubmeterFicheiroEdificado() {
            if(edificados <= 10) {
                edificados++;
                let div = document.getElementById("ficheiros_edificado");

                let input = document.createElement("input");
                input.type="file";
                input.className = "custom-file-input";
                input.name = "ficheiro_edificado" + edificados;
                input.id = "ficheiro_edificado1" + edificados;

                div.appendChild(input);

                let label = document.createElement("label");
                label.className = "custom-file-label";
                label.for = "ficheiro_edificado" + edificados;

                div.appendChild(label);

                let br = document.createElement("br");
                div.appendChild(br);

                let br2 = document.createElement("br");
                div.appendChild(br2);
            } else {
                document.getElementById('addEdificado').style.display = "none";
            }
        }

        function addSubmeterFicheiroPlantas() {
            if(plantas <= 10) {
                plantas++;
                let div = document.getElementById("ficheiros_planta");

                let input = document.createElement("input");
                input.type="file";
                input.className = "custom-file-input";
                input.name = "ficheiro_plantas" + plantas;
                input.id = "ficheiro_plantas" + plantas;

                div.appendChild(input);

                let label = document.createElement("label");
                label.className = "custom-file-label";
                label.for = "ficheiro_plantas" + plantas;

                div.appendChild(label);

                let br = document.createElement("br");
                div.appendChild(br);

                let br2 = document.createElement("br");
                div.appendChild(br2);
            } else {
                document.getElementById('addPlantas').style.display = "none";
            }
        }

        jQuery(document).ready(function($){

            $(".btnrating").on('click',(function(e) {

                var previous_value = $("#selected_rating").val();

                var selected_value = $(this).attr("data-attr");
                $("#selected_rating").val(selected_value);

                $(".selected-rating").empty();
                $(".selected-rating").html(selected_value);

                for (i = 1; i <= selected_value; ++i) {
                    $("#rating-star-"+i).toggleClass('btn-warning');
                    $("#rating-star-"+i).toggleClass('btn-default');
                }

                for (ix = 1; ix <= previous_value; ++ix) {
                    $("#rating-star-"+ix).toggleClass('btn-warning');
                    $("#rating-star-"+ix).toggleClass('btn-default');
                }

            }));


        });
   </script>
@endsection
