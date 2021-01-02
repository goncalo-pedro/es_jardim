@extends('admin.master')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Inventário de Conteúdos Taxa</h3>
    </div>
    <div class="panel-body">
        <div>
            <h3>Ficha de Exemplar (Inglês)</h3>
            <p><b>NumControlo:</b> {{$row->NumControlo}}</p>
            <p><b>Group:</b> {{$row->Group}}</p>
            <p><b>Division:</b> {{$row->Division}}</p>
            <p><b>Family:</b> {{$row->Family}}</p>
            <p><b>Scientific Name:</b> {{$row->ScientificName}}</p>
            <p><b>Common Name:</b> {{$row->CommonName}}</p>
            <p><b>Native Distribution:</b> {{$row->NativeDistribution}}</p>
            <p><b>Conservation Status:</b> {{$row->ConservationStatus}}</p>
            <p><b>Status Azores:</b> {{$row->StatusAzores}}</p>
            <p><b>Short Description:</b> {{$row->ShortDescription}}</p>
            <p><b>Last Updated:</b> {{$row->LastUpdated}}</p>
            <p><b>Scientific Name Reference: </b>{{$row->Scientific_name_Reference}}</p>
            <p><b>Scientific Name Link:</b> {{$row->Scientific_name_Link}}</p>
            <p><b>Common Name Reference:</b> {{$row->Common_name_Reference}}</p>
            <p><b>Common Name Link:</b> {{$row->Common_name_Link}}</p>
            <p><b>Native Distribution Reference:</b> {{$row->Native_distribution_Reference}}</p>
            <p><b>Native Distribution Link: </b>{{$row->Native_distribution_Link}}</p>
            <p><b>Conservation Status Reference:</b> {{$row->Conservation_status_Reference}}</p>
            <p><b>Conservation Status Link:</b> {{$row->Conservation_status_Link}}</p>
            <p><b>Status at Azores References:</b> {{$row->Status_at_Azores_References}}</p>
            <p><b>Status at Azores Link:</b> {{$row->Status_at_Azores_Link}}</p>

            <h3>Ficha Exemplar (Português)</h3>
            <p><b>Grupo:</b> {{$row->Grupo}}</p>
            <p><b>Nome Comum:</b> {{$row->Nome_comum}}</p>
            <p><b>Nome Comum Referência:</b> {{$row->Nome_comum_Referencia}}</p>
            <p><b>Nome Comum Link:</b> {{$row->Nome_comum_Link}}</p>
            <p><b>Região Geográfica de Origem:</b> {{$row->Regiao_geografica_de_origem}}</p>
            <p><b>Estado de Conservação:</b> {{$row->Estado_de_conservacao}}</p>
            <p><b>Estatuto na Região dos Açores:</b> {{$row->Estatuto_na_Regiao_Acores}}</p>
            <p><b>Breve Descrição: </b>{{$row->Breve_descricao}}</p>

            <h3>Pesquisa/Search</h3>
            <p><b>Genus:</b> {{$row->Genus}}</p>
            <p><b>Growth Habit USDA codes and Definitions:</b> {{$row->Growth_habit_USDA_codes_and_definitions}}</p>
            <p><b>Foliar retention:</b> {{$row->Foliar_retention}}</p>
            <p><b>Sexual System:</b> {{$row->Sexual_system}}</p>
            <p><b>Nativity Status to Azores:</b> {{$row->Nativity_status_to_Azores}}</p>
            <p><b>Status of exotic species at Azores:</b> {{$row->Status_of_exotic_species_at_Azores}}</p>
            <p><b>Native Distribution Geographical Area:</b> {{$row->Native_distribution_geographical_area}}</p>
            <p><b>Plant Origin:</b> {{$row->Plant_origin}}</p>
            <p><b>Life cycle:</b> {{$row->Life_cycle_span}}</p>
            <p><b>Name Category:</b> {{$row->Name_category}}</p>
            <p><b>Name Status The Plant List 2013: </b>{{$row->Name_status_The_Plant_List_2013}}</p>

            <h3>Hiperligações consultadas: </h3>
            <p><b>Link 1:</b> {{$row->Link_1}}</p>
            <p><b>Link 2:</b> {{$row->Link_2}}</p>
            <p><b>Link 3:</b> {{$row->Link_3}}</p>
            <p><b>Link 4:</b> {{$row->Link_4}}</p>
            <p><b>Link 5:</b> {{$row->Link_5}}</p>
    </div>
</div>
@endsection
