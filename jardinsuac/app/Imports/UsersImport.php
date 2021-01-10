<?php

namespace App\Imports;

use App\Exceptions\WrongFileException;
use App\Models\TaxaNomeComum;
use App\Models\TaxaNomeComumReferencia;
use App\Models\TaxaNomeConservationStatus;
use App\Models\TaxaNomeConservationStatusReference;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class UsersImport implements ToCollection
{
    /**
     * @param Collection $rows
     * @throws WrongFileException
     */
    public function collection(Collection $rows)
    {
        $rows_no_header = $rows->slice(4);

        foreach ($rows_no_header as $row)
        {
            if(count($row) >= 59) {
                if($row->filter()->isNotEmpty())
                {
                    if($row[1] !== null)
                        DB::table('taxas')->insert([
                            'NumControlo' => $row[0],
                            'Group' => $row[1],
                            'Division' => $row[2],
                            'Family' => $row[3],
                            'ScientificName' => $row[4],
                            'NativeDistribution' => $row[6],
                            'StatusAzores' => $row[8],
                            'ShortDescription' => $row[9],
                            'LastUpdated' => Date::excelToDateTimeObject($row[10]),
                            'Scientific_name_Reference' => $row[11],
                            'Scientific_name_Link'=> $row[12],
                            'Native_distribution_Reference'=> $row[15],
                            'Native_distribution_Link'=> $row[16],
                            'Status_at_Azores_References'=> $row[19],
                            'Status_at_Azores_Link'=> $row[20],
                            'Grupo'=> $row[21],
                            'Nome_comum'=> $row[22],
                            'Nome_comum_Referencia'=> $row[23],
                            'Nome_comum_Link'=> $row[24],
                            'Regiao_geografica_de_origem'=> $row[25],
                            'Estado_de_conservacao'=> $row[26],
                            'Estatuto_na_Regiao_Acores'=> $row[27],
                            'Breve_descricao'=> $row[28],
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
                            'Atlantic_islands_including_West_Indies'=> $row[40],
                            'Africa'=> $row[41],
                            'Indian_Ocean_islands'=> $row[42],
                            'Asia'=> $row[43],
                            'Oceania'=> $row[44],
                            'Pacific_islands'=> $row[45],
                            'North_America'=> $row[46],
                            'Central_America'=> $row[47],
                            'South_America'=> $row[48],
                            'Plant_origin'=> $row[49],
                            'Life_cycle_span'=> $row[50],
                            'Name_category'=> $row[51],
                            'Name_status_The_Plant_List_2013'=> $row[52],
                            'Link_1'=> $row[54],
                            'Link_2'=> $row[55],
                            'Link_3'=> $row[56],
                            'Link_4'=> $row[57],
                            'Link_5'=> $row[58]
                        ]);
                    if($row[5] !== null) {
                        $taxaNomeComum = new TaxaNomeComum();
                        $taxaNomeComum->addNomeComumTaxa($row[5], $row[0]);
                    }
                    if($row[13] !== null && $row[14] !== null) {
                        $taxaNomeComumReferencia = new TaxaNomeComumReferencia();
                        $taxaNomeComumReferencia->addNomeComumReferencia($row[13], $row[14], $row[0]);
                    }
                    if($row[17] !== null && $row[18] !== null) {
                        $taxaNomeConservationStatusReference = new TaxaNomeConservationStatusReference();
                        $taxaNomeConservationStatusReference->addNomeConservationStatusReference($row[17], $row[18], $row[0]);
                    }
                    if($row[7] !== null) {
                        $taxaNomeConservationStatus = new TaxaNomeConservationStatus();
                        $taxaNomeConservationStatus->addNomeConservationStatus($row[7], $row[0]);
                    }
                }

                else { break; } // Parar ciclo após chegar à ultima linha.
            } else {
                throw new WrongFileException('ficheiro inválido!');
            }
        }
    }
}
