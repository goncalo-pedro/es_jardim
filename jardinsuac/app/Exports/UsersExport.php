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
        $table_content = DB::table('InventarioConteudosTaxa')->select(
            'NumControlo',
                    'Group',
                    'Division',
                    'Family',
                    'ScientificName',
                    'CommonName',
                    'NativeDistribution',
                    'ConservationStatus',
                    'StatusAzores',
                    'ShortDescription',
                    'LastUpdated')
            ->get();

        // Criar labels no excel.
        $array = ['A1' => 'NumControlo', 'A2'=> 'Group', 'A3' => 'Division', 'A4' => 'Family', 'A5' => 'ScientificName',
                    'A6' =>'CommonName', 'A7'=> 'NativeDistribution', 'A8'=>'ConservationStatus',
                    'A9'=>'StatusAzores', 'A10'=>'ShortDescription', 'A11'=>'LastUpdated'];

        $table_content->prepend($array);

        return $table_content;
    }
}
