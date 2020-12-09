<?php

namespace App\Http\Controllers;


use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Imports\UsersImport;

class ExcelController extends Controller
{
    function index() {
        $rows = DB::table('Excel_File')->orderBy('id', 'ASC')
            ->get();

        return view('import_excel', compact('rows'));
    }

    function import(Request $request){
        if ($request->hasFile('select_file'))
        {
            $file = $request->file('select_file')->getRealPath();
            Excel::import(new UsersImport, $file, null, \Maatwebsite\Excel\Excel::XLSX);
            return $this->index(); // Return serve p apresentar imediatamente no browser o q está na BD.
        }
        else
        {
            dd('Sem ficheiro!');
        }

    }

    public function export()
    {
        return Excel::download(new UsersExport, 'user_file.xlsx');
    }
}


