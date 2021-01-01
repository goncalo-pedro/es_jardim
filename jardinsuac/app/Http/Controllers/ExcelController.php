<?php

namespace App\Http\Controllers;


use App\Exceptions\FileException;
use App\Exceptions\WrongFileException;
use App\Exports\UsersExport;
use App\Models\Taxa;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Imports\UsersImport;

class ExcelController extends Controller
{

    function import(Request $request){
            try
            {
                request () ->validate(
                    [
                        'select_file' => 'mimes:xlsx'
                    ]
                );

                ini_set('memory_limit', '512M'); // Aumenta capacidade de memória do servidor para 512MB.
                if ($request->hasFile('select_file'))
                {
                    $file = $request->file('select_file')->getRealPath();
                    Excel::import(new UsersImport, $file, null, \Maatwebsite\Excel\Excel::XLSX);
                    return redirect('admin/home'); // Return serve p apresentar imediatamente no browser o q está na BD.
                }
                else
                {
                    throw new FileException('sem ficheiro!');
                }
            }
            catch (FileException $e) {
                return redirect('admin/home')->withInput()->withErrors(['fileError' => $e->getMessage()]);
            }

            catch (WrongFileException $e) {
                return redirect('admin/home')->withInput()->withErrors(['wrongFileError' => $e->getMessage()]);
            }
    }

    public function export() {
        return Excel::download(new UsersExport, 'user_file.xlsx');
    }

    public function showExport() {
        return view('admin.export_excel', [
            'user' => Auth::user()
        ]);
    }
}


