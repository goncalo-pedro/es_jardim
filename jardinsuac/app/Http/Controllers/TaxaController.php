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
        
        return view ('taxa_index',compact('rows'));
    }



    function show($id)
    {
        $row = DB::table('InventarioConteudosTaxa')->where('id', $id)->first();

        return view('perfil_taxa', compact('row'));
    }
}


