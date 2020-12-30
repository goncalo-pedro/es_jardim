@extends('admin.master')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Inventário de Conteúdos Taxa</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table-import">
                <tr>
                    <th>NumControlo</th>
                    <th>Group</th>
                    <th>Division</th>
                    <th>Family</th>
                    <th>ScientificName</th>
                    <th>CommonName</th>
                    <th>NativeDistribution</th>
                    <th>ConservationStatus</th>
                    <th>StatusAzores</th>
                    <th>ShortDescription</th>
                    <th>LastUpdated</th>
                    <th>Scientific_name_Reference</th>
                    <th>Scientific_name_Link</th>
                    <th>Common_name_Reference</th>
                    <th>Common_name_Link</th>
                    <th>Native_distribution_Reference</th>
                    <th>Native_distribution_Link</th>
                    <th>Conservation_status_Reference</th>
                    <th>Conservation_status_Link</th>
                    <th>Status_at_Azores_References</th>
                    <th>Status_at_Azores_Link</th>
                    <th>Grupo</th>
                    <th>Nome_comum</th>
                    <th>Nome_comum_Referência</th>
                    <th>Nome_comum_Link</th>
                    <th>Região_geográfica_de_origem</th>
                    <th>Estado_de_conservação</th>
                    <th>Estatuto_na_Região_Açores</th>
                    <th>Breve_descrição</th>
                    <th>Genus</th>
                    <th>Growth_habit_USDA_codes_and_definitions</th>
                    <th>Foliar_retention</th>
                    <th>Sexual_system</th>
                    <th>Nativity_status_to_Azores</th>
                    <th>Status_of_exotic_species_at_Azores</th>
                    <th>Native_distribution_geographical_area</th>
                    <th>Cosmopolitan_distribution</th>
                    <th>Europe</th>
                    <th>Mediterranean_islands</th>
                    <th>Atlantic_islands_including West_Indies</th>
                    <th>Africa</th>
                    <th>Indian_Ocean _islands</th>
                    <th>Asia</th>
                    <th>Oceania</th>
                    <th>Pacific_islands</th>
                    <th>North _America</th>
                    <th>Central_America</th>
                    <th>South_America</th>
                    <th>Plant_origin</th>
                    <th>Life_cycle_span</th>
                    <th>Name_category</th>
                    <th>Name_status_The Plant List_2013</th>
                    <th>Link 1</th>
                    <th>Link 2</th>
                    <th>Link 3</th>
                    <th>Link 4</th>
                    <th>Link 5</th>
                </tr>

                <tr>
                    <td>{{$row->id}}</td>
                    <th>{{$row->NumControlo}}</th>
                    <th>{{$row->Group}}</th>
                    <th>{{$row->Division}}</th>
                    <th>{{$row->Family}}</th>
                    <th>{{$row->ScientificName}}</th>
                    <th>{{$row->CommonName}}</th>
                    <th>{{$row->NativeDistribution}}</th>
                    <th>{{$row->ConservationStatus}}</th>
                    <th>{{$row->StatusAzores}}</th>
                    <th>{{$row->ShortDescription}}</th>
                    <th>{{$row->LastUpdated}}</th>
                    <th>{{$row->Scientific_name_Reference}}</th>
                    <th>{{$row->Scientific_name_Link}}</th>
                    <th>{{$row->Common_name_Reference}}</th>
                    <th>{{$row->Common_name_Link}}</th>
                    <th>{{$row->Native_distribution_Reference}}</th>
                    <th>{{$row->Native_distribution_Link}}</th>
                    <th>{{$row->Conservation_status_Reference}}</th>
                    <th>{{$row->Conservation_status_Link}}</th>
                    <th>{{$row->Status_at_Azores_References}}</th>
                    <th>{{$row->Status_at_Azores_Link}}</th>
                    <th>{{$row->Grupo}}</th>
                    <th>{{$row->Nome_comum}}</th>
                    <th>{{$row->Nome_comum_Referencia}}</th>
                    <th>{{$row->Nome_comum_Link}}</th>
                    <th>{{$row->Regiao_geografica_de_origem}}</th>
                    <th>{{$row->Estado_de_conservacao}}</th>
                    <th>{{$row->Estatuto_na_Regiao_Acores}}</th>
                    <th>{{$row->Breve_descricao}}</th>
                    <th>{{$row->Genus}}</th>
                    <th>{{$row->Growth_habit_USDA_codes_and_definitions}}</th>
                    <th>{{$row->Foliar_retention}}</th>
                    <th>{{$row->Sexual_system}}</th>
                    <th>{{$row->Nativity_status_to_Azores}}</th>
                    <th>{{$row->Status_of_exotic_species_at_Azores}}</th>
                    <th>{{$row->Native_distribution_geographical_area}}</th>
                    <th>{{$row->Cosmopolitan_distribution}}</th>
                    <th>{{$row->Europe}}</th>
                    <th>{{$row->Mediterranean_islands}}</th>
                    <th>{{$row->Atlantic_islands_including_West_Indies}}</th>
                    <th>{{$row->Africa}}</th>
                    <th>{{$row->Indian_Ocean_islands}}</th>
                    <th>{{$row->Asia}}</th>
                    <th>{{$row->Oceania}}</th>
                    <th>{{$row->Pacific_islands}}</th>
                    <th>{{$row->North_America}}</th>
                    <th>{{$row->Central_America}}</th>
                    <th>{{$row->South_America}}</th>
                    <th>{{$row->Plant_origin}}</th>
                    <th>{{$row->Life_cycle_span}}</th>
                    <th>{{$row->Name_category}}</th>
                    <th>{{$row->Name_status_The_Plant_List_2013}}</th>
                    <th>{{$row->Link_1}}</th>
                    <th>{{$row->Link_2}}</th>
                    <th>{{$row->Link_3}}</th>
                    <th>{{$row->Link_4}}</th>
                    <th>{{$row->Link_5}}</th>

                </tr>

            </table>
        </div>
    </div>
</div>
@endsection
