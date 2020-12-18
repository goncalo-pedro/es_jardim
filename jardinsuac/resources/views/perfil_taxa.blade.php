@extends('master')

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
                @for($i=1; $i<$row->lenght(); $i++)
                    <tr>
                        <td>{{$row[$i]}}</td>
                    </tr>
                @endfor
            </table>
        </div>
    </div>
</div>
@endsection
