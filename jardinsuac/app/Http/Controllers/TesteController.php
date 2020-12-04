<?php

namespace App\Http\Controllers;

use App\Business\ExcelFile;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;


class TesteController extends Controller
{

    public function testes($filename) {
        (new ExcelFile)->create($filename);
    }

    /*
    public function testes(Request $request) {
        $filename = $request->file('filename');
        (new \App\Business\ExcelFile)->create($filename);
    }
    */
}
