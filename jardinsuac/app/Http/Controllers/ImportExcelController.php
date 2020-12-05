<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Maatwebsite\Excel\Excel;
use Illuminate\Support\Facades\DB;

class ImportExcelController extends Controller
{
    function index() {
        $data = DB::table('Excel_File')->orderBy('id', 'DESC')
            ->get();

        return view('import_excel', compact('data'));
    }


    function import(Request $request) {
        $this->validate($request, [
            'select_file' => 'required|mimes:xls,xlsx'
        ]);

        $path = $request->file('select_file')->getRealPath();
        $data = Excel::load($path)->get();

        if($data->count() > 0) {
            foreach($data->toArray() as $key => $value) {
                foreach($value as $row) {
                    $insert_data[] = array(
                        'CustomerName' => $row['customer_name'],
                        'Gender' => $row['gender'],
                        'Address' => $row['address'],
                        'City' => $row['city']
                    );
                }
            }

            if(!empty($insert_data)) {
                DB::table('tbl_customer')->insert($insert_data);
            }
        }
        return back()->with('success', 'Excel Data Imported successfully.');
    }
}
