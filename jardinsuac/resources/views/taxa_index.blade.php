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
                                                                <p></p>
                                                                <input class="form-check-input" type="checkbox" value="" id="{{str_replace(' ', '', $param)}}" onclick="renderTaxas()">
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    {{str_replace(' ', '', $param)}}
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
                            <button class="btn align-middle" onclick="resetFilters()">Reset Filters</button>
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

                                        <button type="button" class="btn" onclick="location.href='/taxa/{{$taxa->id}}'" >Saber Mais</button>
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
    <script type="text/javascript">

        var listaTaxas = document.getElementById("listTaxas");

        var listaChecks = @json($paramLista);
        listaChecks = JSON.parse(JSON.stringify(listaChecks));

        function renderTaxas () {
            
            let toShow = [];


            while (listaTaxas.hasChildNodes())
                listaTaxas.removeChild(listaTaxas.childNodes[0])

            let listaCheckeds = []
            for(const key in listaChecks) {
                for(let check of listaChecks[key]) {
                    if(check === "Atlantic Islands including West indies")
                        check = "AtlanticIslandsincludingWestindies";
                    else if(check === "Indian Ocean Islands")
                        check = "IndianOceanIslands";
                    else if(check === "Pacific Islands")
                        check = "PacificIslands";
                    else if(check === "North America")
                        check = "NorthAmerica";
                    else if(check === "Central America")
                        check = "CentralAmerica";
                    else if(check === "South America")
                        check = "SouthAmerica";
                    else if(check === "Under cultivation")
                        check = "Undercultivation"

                    let objCheck = document.getElementById(check);
                    if(objCheck.checked)
                        listaCheckeds.push([key, check])
                }
            }

            var taxas = @json($taxas);
            taxas = JSON.parse(JSON.stringify(taxas));

            for(const taxa of taxas) {
                if(listaCheckeds.length > 0)
                    for(const checked of listaCheckeds ) {
                        console.log("lista taxas: ", toShow)
                        if(checked[0] !== 'Native Distribution Geographical Area') {

                            if(checked[1] === "Undercultivation") {
                                checked[1] = "Under cultivation";
                            }

                            checked[0] = checked[0].replace(/\s/g, '_');
                            if(taxa[checked[0]] === checked[1]) {
                                toShow.push(taxa);
                            }
                        }else {
                            if(checked[1] === "Mediterranean")
                                checked[1] = "Mediterranean_islands";
                            else if(checked[1] === "AtlanticIslandsincludingWestindies")
                                checked[1] = "Atlantic_islands_including_West_Indies";
                            else if(checked[1] === "IndianOceanIslands")
                                checked[1] = "Indian_Ocean_islands";
                            else if(checked[1] === "Cosmopolitan")
                                checked[1] = "Cosmopolitan_distribution";
                            else if(checked[1] === "PacificIslands")
                                checked[1] = "Pacific_islands";
                            else if(checked[1] === "NorthAmerica")
                                checked[1] = "North_America";
                            else if(checked[1] === "CentralAmerica")
                                checked[1] = "Central_America";
                            else if(checked[1] === "SouthAmerica")
                                checked[1] = "South_America";
                            if(taxa[checked[1]]) {
                                toShow.push(taxa);
                            }
                        }
                    }
                else
                    createCardTaxa(taxa['Nome_comum'], taxa['ScientificName'], taxa['Breve_descricao'], taxa['id'])
            }

            showRightTaxa(toShow, listaCheckeds.length)
        }

        function showRightTaxa(toShow, qtdFiltrosSelecionados) {
            let alreadyShow = [];
            let count = 0;
            for(const taxa of toShow) {
                let countTaxaIgual = 0;
                for (const taxaComparar of toShow)
                    if (taxa['id'] === taxaComparar['id'])
                        countTaxaIgual++

                if (countTaxaIgual === qtdFiltrosSelecionados) {
                    let exists = false
                    for(const taxaVerificar of alreadyShow)
                        if(taxa['Nome_comum'] === taxaVerificar['Nome_comum'])
                            exists = true;
                    if(!exists) {
                        createCardTaxa(taxa['Nome_comum'], taxa['ScientificName'], taxa['Breve_descricao'], taxa['id'])
                        alreadyShow.push(taxa)
                        count ++;
                    }
                }
            }
            if(count === 0 && qtdFiltrosSelecionados > 0)
                resultsNotFound()
        }

        function resultsNotFound() {
            let coluna = createEl("div", ["col"]);

            let notFound = createEl("p", ["texto"]);
            notFound.innerHTML = "Não foram encontrados resultados.";

            coluna.appendChild(notFound)
            document.getElementById("listTaxas").appendChild(coluna);
        }

        function resetFilters() {

            for(const key in listaChecks) {
                for(let check of listaChecks[key]) {
                    if(check === "Atlantic Islands including West indies")
                        check = "AtlanticIslandsincludingWestindies";
                    else if(check === "Indian Ocean Islands")
                        check = "IndianOceanIslands";
                    else if(check === "Pacific Islands")
                        check = "PacificIslands";
                    else if(check === "North America")
                        check = "NorthAmerica";
                    else if(check === "Central America")
                        check = "CentralAmerica";
                    else if(check === "South America")
                        check = "SouthAmerica";
                    else if(check === "Under cultivation")
                        check = "Undercultivation"

                    let objCheck = document.getElementById(check);
                    if(objCheck.checked)
                        objCheck.checked = false;
                }
            }
            renderTaxas()
        }

        function createCardTaxa(nomeComum, scientificName, breveDescricao, id) {
            let coluna = createEl("div", ["col"]);

            let form = createEl("form", ["a"]);
            form.action = "taxa/"+id;
            form.method = "post";
            form.method.enctype = "multipart/form-data";


            let methodGet = createEl("input", ["a"]);
            methodGet.type="hidden";
            methodGet.name="_method";
            methodGet.value="GET";

            let inputCSRF = createEl("input", ["a"]);

            inputCSRF.type="hidden";
            inputCSRF.name = "_token";
            inputCSRF.value = "f4IKeatgFnPbrTHr9xoJnnnQr0WiOQYjCjwVW2JQ";

            form.appendChild(inputCSRF);
            form.appendChild(methodGet);

            let cartao = createEl("div", ["card", "mb-3"]);

            let linha = createEl("div", ["row", "g-0"]);

            let bodyCard = createEl("div", ["card-body"]);

            let titleCard = createEl("h5", ["card-title"]);
            titleCard.innerHTML = nomeComum;

            let subtitleCard = createEl("h6", ["card-subtitle"]);
            subtitleCard.innerHTML = scientificName;

            let textCard = createEl("p", ["card-text"]);
            textCard.innerHTML = breveDescricao;
            let botaoSaberMais = createEl("button", ["btn"]);
            botaoSaberMais.innerHTML = "Saber Mais";

            let footerCard = createEl("p", ["card-text"]);
            let textFooter = createEl("small", ["text-muted"]);
            textFooter.innerHTML = "Last updated 3 mins ago";

            footerCard.appendChild(textFooter)

            bodyCard.appendChild(titleCard);
            bodyCard.appendChild(subtitleCard);
            bodyCard.appendChild(textCard);
            bodyCard.appendChild(botaoSaberMais);
            bodyCard.appendChild(footerCard);

            linha.appendChild(bodyCard);
            cartao.appendChild(linha);
            form.append(cartao);
            coluna.appendChild(form);


            document.getElementById("listTaxas").appendChild(coluna);
        }

        function createEl (element, className) {
            let elemento = document.createElement(element);
            for(const classe of className)
                elemento.classList.add(classe)
            return elemento;
        }

    </script>
@endsection
