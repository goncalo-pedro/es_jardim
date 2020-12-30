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
                "paramLista" => array(
                    "Genus" => $taxa->getGenus(),
                    "USDA" => $taxa->getUSDA(),
                    "Foliar" => $taxa->getFoliar(),
                    "Sexual" => $taxa->getSexual(),
                    "Nativity" => $taxa->getNativity(),
                    "Exotic species" => $taxa->getExoticSpecies(),
                    "Native Area" => $taxa->getNativeArea(),
                    "Plant Origin" => $taxa->getPlantOrigin(),
                    "Life Cycle" => $taxa->getLifeCycle(),
                    "Name Category" => $taxa->getNameCategory(),
                    "Status The Plant List" => $taxa->getStatusPlantList(),
                ),
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
