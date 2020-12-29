<?php

namespace App\Http\Controllers;

use App\Models\Taxa;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminTaxaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Taxa $taxa
     * @return Application|Factory|View|Response
     */
    public function index(Taxa $taxa)
    {
        return view('admin.import_excel',
            [
                "rows" => $taxa->getTaxas()
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param Taxa $taxa
     * @return Application|Factory|View|Response
     */
    public function show(int $id)
    {
        return view('admin.perfil_taxa',
            [
                "row" => (new Taxa)->getTaxa($id)
            ]
        );
    }

}
