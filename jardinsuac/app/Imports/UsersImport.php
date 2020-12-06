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
        $rows_no_header = $rows->slice(1);
        foreach ($rows_no_header as $row)
        {
            DB::table('Excel_File')->insert([
                'CustomerName' => $row[0],
                'Gender' => $row[1],
                'Address' => $row[2],
                'City' => $row[3]
            ]);
        }
    }
}
