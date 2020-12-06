<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Imports\UsersImport;

class ImportExcelController extends Controller
{
    function index() {
        $rows = DB::table('Excel_File')->orderBy('id', 'ASC')
            ->get();

        return view('import_excel', compact('rows'));
    }

    function import(Request $request){
        $file = $request->file('select_file')->getRealPath();
        Excel::import(new UsersImport, $file, null, \Maatwebsite\Excel\Excel::XLSX);
        return $this->index(); // Return serve p apresentar imediatamente no browser o q está na BD.
    }
}


