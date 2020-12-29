<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $table_content = DB::table('taxas')->select(['NumControlo', 'Group', 'Division', 'Family','ScientificName',
            'CommonName',  'NativeDistribution', 'ConservationStatus',
            'StatusAzores', 'ShortDescription', 'LastUpdated',
            'Scientific_name_Reference',  'Scientific_name_Link',  'Common_name_Reference',  'Common_name_Link',
            'Native_distribution_Reference',  'Native_distribution_Link', 'Conservation_status_Reference',
            'Conservation_status_Link',  'Status_at_Azores_References',
            'Status_at_Azores_Link',  'Grupo',  'Nome_comum',  'Nome_comum_Referência',
             'Nome_comum_Link',
             'Região_geográfica_de_origem',  'Estado_de_conservação',
             'Estatuto_na_Região_Açores',  'Breve_descrição',
             'Genus',  'Growth_habit_USDA_codes_and_definitions',  'Foliar_retention',
             'Sexual_system',  'Nativity_status_to_Azores',  'Status_of_exotic_species_at_Azores',
             'Native_distribution_geographical_area',  'Cosmopolitan_distribution',
             'Europe',  'Mediterranean_islands',  'Atlantic_islands_including_West_Indies',
             'Africa',  'Indian_Ocean_islands',  'Asia',  'Oceania',
             'Pacific_islands', 'North_America',  'Central_America',
             'South_America',  'Plant_origin',  'Life_cycle_span',
             'Name_category',  'Name_status_The_Plant_List_2013',
             'Link_1',  'Link_2',  'Link_3',  'Link_4',  'Link_5'])
            ->get();

        // Criar labels no excel.
        $array = ['A1' => 'NumControlo', 'A2'=> 'Group', 'A3' => 'Division', 'A4' => 'Family', 'A5' => 'ScientificName',
                    'A6' =>'CommonName', 'A7'=> 'NativeDistribution', 'A8'=>'ConservationStatus',
                    'A9'=>'StatusAzores', 'A10'=>'ShortDescription', 'A11'=>'LastUpdated',
            'A12'=> 'Scientific_name_Reference', 'A13'=> 'Scientific_name_Link', 'A14'=> 'Common_name_Reference', 'A15'=> 'Common_name_Link',
            'A16'=> 'Native_distribution_Reference', 'A17'=> 'Native_distribution_Link', 'A18'=> 'Conservation_status_Reference',
            'A19'=> 'Conservation_status_Link', 'A20'=> 'Status_at_Azores_References',
            'A21'=> 'Status_at_Azores_Link', 'A22'=> 'Grupo', 'A23'=> 'Nome_comum', 'A24'=> 'Nome_comum_Referência',
            'A25'=> 'Nome_comum_Link',
            'A26'=> 'Região_geográfica_de_origem', 'A27'=> 'Estado_de_conservação',
            'A28'=> 'Estatuto_na_Região_Açores', 'A29'=> 'Breve_descrição',
            'A31'=> 'Genus', 'A32'=> 'Growth_habit_USDA_codes_and_definitions', 'A33'=> 'Foliar_retention',
            'A34'=> 'Sexual_system', 'A35'=> 'Nativity_status_to_Azores', 'A36'=> 'Status_of_exotic_species_at_Azores',
            'A37'=> 'Native_distribution_geographical_area', 'A38'=> 'Cosmopolitan_distribution',
            'A39'=> 'Europe', 'A40'=> 'Mediterranean_islands', 'A41'=> 'Atlantic_islands_including West_Indies',
            'A42'=> 'Africa', 'A43'=> 'Indian_Ocean _islands', 'A44'=> 'Asia', 'A45'=> 'Oceania',
            'A46'=> 'Pacific_islands', 'A47'=> 'North _America', 'A48'=> 'Central_America',
            'A49'=> 'South_America', 'A50'=> 'Plant_origin', 'A51'=> 'Life_cycle_span',
            'A52'=> 'Name_category', 'A53'=> 'Name_status_The Plant List_2013',
            'A55'=> 'Link 1', 'A56'=> 'Link 2', 'A57'=> 'Link 3', 'A58'=> 'Link 4', 'A59'=> 'Link 5'];

        $table_content->prepend($array);

        return $table_content;
    }
}
