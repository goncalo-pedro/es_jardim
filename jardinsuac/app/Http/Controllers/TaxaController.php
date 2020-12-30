<?php

namespace App\Http\Controllers;

use App\Models\Taxa;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class TaxaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Taxa $taxa
     * @return Application|Factory|View|Response
     */
    public function index(Taxa $taxa)
    {
        return view ('taxa_index',
            [
                "taxas" => $taxa->getTaxas(),
                "paramlista" => array(array("genus1","genus2","genus3"),
                                        array("USDA1","USDA2","USDA3"),
                                        array("FOLIAR RETENCION1","FOLIAR RETENCION","FOLIAR RETENCION3"),
                                        array("Sexual System1","Sexual System2","Sexual System3"),
                                        array("Nativitystatustoazores1","Nativitystatustoazores2","Nativitystatustoazores3"),
                    array("USDA1","USDA2","USDA3"),
                    array("FOLIAR RETENCION1","FOLIAR RETENCION","FOLIAR RETENCION3"),
                    array("Sexual System1","Sexual System2","Sexual System3"),
                    array("Nativitystatustoazores1","Nativitystatustoazores2","Nativitystatustoazores3"),
                    array("USDA1","USDA2","USDA3"),
                    array("FOLIAR RETENCION1","FOLIAR RETENCION","FOLIAR RETENCION3"),
                    array("Sexual System1","Sexual System2","Sexual System3"),
                    )
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Taxa $taxa
     * @return Response
     */
    public function show(Taxa $taxa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Taxa $taxa
     * @return Response
     */
    public function edit(Taxa $taxa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Taxa $taxa
     * @return Response
     */
    public function update(Request $request, Taxa $taxa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Taxa $taxa
     * @return Response
     */
    public function destroy(Taxa $taxa)
    {
        //
    }
}
