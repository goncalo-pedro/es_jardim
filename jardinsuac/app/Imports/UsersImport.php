<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class UsersImport implements ToCollection
{
    /**
     * @param Collection $rows
     */
    public function collection(Collection $rows)
    {
        $rows_no_header = $rows->slice(4);

        foreach ($rows_no_header as $row)
        {
            if($row->filter()->isNotEmpty())
            {
                $goodDate = '';
                if($row[10] != null)
                {
                     $badDate = $row[10];
                     $goodDate = Date::excelToDateTimeObject($badDate);
                }
                // Inserir na BD a informação.
                DB::table('InventarioConteudosTaxa')->insert([
                    'NumControlo' => $row[0],
                    'Group' => $row[1],
                    'Division' => $row[2],
                    'Family' => $row[3],
                    'ScientificName' => $row[4],
                    'CommonName' => $row[5],
                    'NativeDistribution' => $row[6],
                    'ConservationStatus' => $row[7],
                    'StatusAzores' => $row[8],
                    'ShortDescription' => $row[9],
                    'LastUpdated' => $goodDate,
                    'Scientific_name_Reference' => $row[11],
                    'Scientific_name_Link'=> $row[12],
                    'Common_name_Reference'=> $row[13],
                    'Common_name_Link'=> $row[14],
                    'Native_distribution_Reference'=> $row[15],
                    'Native_distribution_Link'=> $row[16],
                    'Conservation_status_Reference'=> $row[17],
                    'Conservation_status_Link'=> $row[18],
                    'Status_at_Azores_References'=> $row[19],
                    'Status_at_Azores_Link'=> $row[20],
                    'Grupo'=> $row[21],
                    'Nome_comum'=> $row[22],
                    'Nome_comum_Referência'=> $row[23],
                    'Nome_comum_Link'=> $row[24],
                    'Região_geográfica_de_origem'=> $row[25],
                    'Estado_de_conservação'=> $row[26],
                    'Estatuto_na_Região_Açores'=> $row[27],
                    'Breve_descrição'=> $row[28],
                    'Genus'=> $row[30],
                    'Growth_habit_USDA_codes_and_definitions'=> $row[31],
                    'Foliar_retention'=> $row[32],
                    'Sexual_system'=> $row[33],
                    'Nativity_status_to_Azores'=> $row[34],
                    'Status_of_exotic_species_at_Azores'=> $row[35],
                    'Native_distribution_geographical_area'=> $row[36],
                    'Cosmopolitan_distribution'=> $row[37],
                    'Europe'=> $row[38],
                    'Mediterranean_islands'=> $row[38],
                    'Atlantic_islands_including West_Indies'=> $row[40],
                    'Africa'=> $row[41],
                    'Indian_Ocean _islands'=> $row[42],
                    'Asia'=> $row[43],
                    'Oceania'=> $row[44],
                    'Pacific_islands'=> $row[45],
                    'North _America'=> $row[46],
                    'Central_America'=> $row[47],
                    'South_America'=> $row[48],
                    'Plant_origin'=> $row[49],
                    'Life_cycle_span'=> $row[50],
                    'Name_category'=> $row[51],
                    'Name_status_The Plant List_2013'=> $row[52],
                    'Link 1'=> $row[54],
                    'Link 2'=> $row[55],
                    'Link 3'=> $row[56],
                    'Link 4'=> $row[57],
                    'Link 5'=> $row[58]
                ]);
            }

            else { break; } // Parar ciclo após chegar à ultima linha.
        }
    }
}
