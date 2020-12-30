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
                                    @if($param != null)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
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

    </div>

    <script>
        var el = document.getElementById("botoes1");
        var valueIlha = document.getElementById("divIlha").childNodes[1]
        var valueTipo = document.getElementById("divTipo").childNodes[1]
        var valueExtensao = document.getElementById("divExtensao").childNodes[1]
        var valueDificuldade = document.getElementById("divGrau-dificuldade").childNodes[1]
        var valueNome = document.getElementById("divNome").childNodes[1]


        el.addEventListener('click', event => {
            if(event.target.id === "pesquisa"){
                var list = []
                var list2 = []
                let notblank = 0
                if(valueIlha.value !== "") {
                    notblank++;
                }
                if(valueTipo.value !== "") {
                    notblank++;
                }
                if(valueExtensao.value !== "") {
                    notblank++;
                }
                if(valueDificuldade.value !== "") {
                    notblank++;
                }
                if(valueNome.value !== "") {
                    notblank++;
                }

                for(let i = 0;i<trilhos.length;i++){
                    console.log(notblank)
                    if(valueIlha.value !== ""){
                        if(valueIlha.value === trilhos[i].ilha){
                            list.push([trilhos[i],i])
                        }
                    }
                    if(valueTipo.value !== ""){
                        if(valueTipo.value === trilhos[i].tipo){
                            list.push([trilhos[i],i])
                        }
                    }
                    if(valueDificuldade.value !== ""){
                        if(valueDificuldade.value === trilhos[i].dificuldade){
                            list.push([trilhos[i],i])
                        }
                    }
                    if(valueExtensao.value !== ""){
                        if(parseInt(valueExtensao.value) === trilhos[i].comprimento){
                            list.push([trilhos[i],i])
                        }
                    }
                    if(valueNome.value !== ""){
                        if(valueNome.value === trilhos[i].nome){
                            list.push([trilhos[i],i])
                        }
                    }
                }

                for(let i =0;i<list.length;i++){
                    let count = 0
                    for(let j = 0;j<list.length;j++)
                        if(list[i][0].nome === list[j][0].nome)
                            count++

                    if(count === notblank){
                        let exists = false;
                        for(let z = 0; z < list2.length; z++)
                            if(list[i][0].nome === list2[z][0].nome)
                                exists = true;
                        if(!exists)
                            list2.push(list[i])
                    }
                }
                montarTrilhos(list2)
            }
        })


        });

        /**
         * Preenche uma casa o tabuleiro
         * @param {Array} lista Lista que recebe o objeto e o i
         * pode ser {number}, {nomeDoObjeto}
         */
        function montarTrilhos(lista) {
            let resultados = document.getElementById("resultados");

            while(resultados.hasChildNodes())
                resultados.removeChild(resultados.childNodes[0])

            for(let i = 0; i < lista.length; i++) {
                let nomeTrilho = document.createElement("button");
                nomeTrilho.innerHTML = lista[i][0].nome;
                nomeTrilho.addEventListener("click", function () {
                    inicio(lista[i][1])
                });
                nomeTrilho.className = "aceder-perfil";
                resultados.appendChild(nomeTrilho);
            }
        }
    </script>
@endsection
