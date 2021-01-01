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
                                                                <input class="form-check-input" type="checkbox" value="" id="{{str_replace(' ', '', $param)}}" onclick="renderTaxas()">
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

        var listaChecks = {
            'Genus' : [
                'Annona',
                'Araucaria',
                'Archontophoenix',
                'Bambusa',
                'Brachychiton',
                'Buxus',
                'Callistemon',
                'Carya',
                'Castanospermum'
            ],
            'Growth_habit_USDA_codes_and_definitions': [
                'Tree',
                'Graminoid',
                'Shrub'
            ],
            'Foliar_retention': [
                'Semi-deciduous',
                'Evergreen',
                'Deciduous'
            ],
            'Sexual_system' : [
                'Hermaphrodite',
                'Monoecious'
            ],
            'Nativity_status_to_Azores': [
                'Exotic'
            ],
            'Status_of_exotic_species_at_Azores': [
                'Undercultivation'
            ],
            'Geographical': [
                "Europe",
                "Mediterranean",
                "Africa",
                "Asia",
                "Oceania",
                "PacificIslands",
                "NorthAmerica",
                "SouthAmerica",
            ],
            'Plant_origin' : [
                "Natural",
            ],
            'Life_cycle_span': [
                "Perennial",
            ],
            'Name_category': [
                "Species",
            ],
            'Name_status_The_Plant_List_2013': [
                "Accepted"
            ]
        }

        console.log(listaChecks);
        /*
            var teste = @json($paramLista);


            teste =

            var lista = [];
            for(const [key, value] of teste) {
                for(const param of teste[key])
                    lista.push(param)
            }

            console.log(lista)
        */
        function renderTaxas () {

            let alreadyShow = new Array(16);
            alreadyShow.fill(0);


            while (listaTaxas.hasChildNodes())
                listaTaxas.removeChild(listaTaxas.childNodes[0])

            let listaCheckeds = []
            for(const key in listaChecks) {
                console.log(key);
                for(const check of listaChecks[key]) {
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
                        if(checked[0] !== 'Geographical') {
                            if(checked[1] === "Undercultivation") {
                                checked[1] = "Under cultivation";
                            }
                            if(taxa[checked[0]] === checked[1] && alreadyShow[taxa['id'] - 1] === 0) {
                                alreadyShow[taxa['id'] - 1] = 1;
                                createCardTaxa(taxa['Nome_comum'], taxa['ScientificName'], taxa['Breve_descricao'])
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

                            if(taxa[checked[1]] && alreadyShow[taxa['id'] - 1] === 0) {
                                alreadyShow[taxa['id'] - 1] = 1;
                                createCardTaxa(taxa['Nome_comum'], taxa['ScientificName'], taxa['Breve_descricao'])
                            }
                        }
                    }
                else
                    createCardTaxa(taxa['Nome_comum'], taxa['ScientificName'], taxa['Breve_descricao'])
            }
        }

        function createCardTaxa(nomeComum, scientificName, breveDescricao) {
            let coluna = createEl("div", "col");


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
            coluna.appendChild(cartao);

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
