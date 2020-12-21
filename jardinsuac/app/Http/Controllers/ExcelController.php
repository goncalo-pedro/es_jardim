<?php

namespace App\Http\Controllers;


use App\Exceptions\FileException;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Imports\UsersImport;

class ExcelController extends Controller
{
    function index() {
        $rows = DB::table('InventarioConteudosTaxa')->orderBy('id', 'ASC')
            ->get();
        return view('import_excel', compact('rows'));
    }

    function import(Request $request){
            try
            {
                ini_set('memory_limit', '512M'); // Aumenta capacidade de memória do servidor para 512MB.
                if ($request->hasFile('select_file'))
                {
                    $file = $request->file('select_file')->getRealPath();
                    Excel::import(new UsersImport, $file, null, \Maatwebsite\Excel\Excel::XLSX);
                    return redirect('/import_excel'); // Return serve p apresentar imediatamente no browser o q está na BD.
                }
                else
                {
                    throw new FileException('sem ficheiro!');
                }
            }
            catch (FileException $e) {
                return redirect('/import_excel')->withInput()->withErrors(['fileError' => $e->getMessage()]);
            }
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'user_file.xlsx');
    }

    function show($id)
    {
        $row = DB::table('InventarioConteudosTaxa')->where('id', $id)->first();

        return view('perfil_taxa', compact('row'));
    }
}


