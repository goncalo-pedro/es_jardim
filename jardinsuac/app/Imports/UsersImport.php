<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

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

            if($row->filter()->isNotEmpty()) // Saltar linhas completamente vazias.
            {
                $goodDate = '';
                if($row[10] != null)
                {
                     $badDate = $row[10];
                     $aux = strtotime($badDate);
                     $goodDate = date('d/m/Y', $aux);
                }

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
                    'LastUpdated' => $goodDate
                ]);
            }
        }
    }
}
