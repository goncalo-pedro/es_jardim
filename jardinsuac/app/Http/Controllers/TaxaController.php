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
                    "Growth Habit USDA codes and definitions" => $taxa->getUSDA(),
                    "Foliar Retention" => $taxa->getFoliar(),
                    "Sexual System" => $taxa->getSexual(),
                    "Nativity Status to Azores" => $taxa->getNativity(),
                    "Status of Exotic species At Azores" => $taxa->getExoticSpecies(),
                    "Native Distribution Geographical Area" => $taxa->getNativeArea(),
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
    public function show($id)
    {
        return view('taxa_show',['taxa'=>Taxa::where('id', $id)->firstOrFail()]);
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
