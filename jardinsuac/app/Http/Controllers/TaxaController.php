<?php

namespace App\Http\Controllers;

use App\Exceptions\FileException;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Imports\UsersImport;

class TaxaController extends Controller
{
    function index() {
        $taxas = DB::table('InventarioConteudosTaxa')->orderBy('id', 'ASC')
            ->get();

        return view ('taxa_index',compact('taxas'));
    }

    function show($id)
    {

    }
}


