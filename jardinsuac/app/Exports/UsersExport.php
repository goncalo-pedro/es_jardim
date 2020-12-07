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
        $table_content = DB::table('Excel_File')->select('CustomerName', 'Gender', 'Address', 'City')->get();
        $array = ['A1' => 'CustomerName', 'A2' => 'Gender', 'A3' => 'Address', 'A4' => 'City'];

        $table_content->prepend($array);

        return $table_content;
    }
}
