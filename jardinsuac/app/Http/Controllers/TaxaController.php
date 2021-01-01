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
     * @return Factory|View
     */
    public function show($id)
    {
        $taxa = Taxa::where('id', $id)->firstOrFail();
        return view('taxa_show',['taxa'=>$taxa,
                                      'caracteristicas'=> array(
                                          "Grupo" => $taxa->Grupo,
                                          "Região Geográfica de Origem" => $taxa->Regiao_geografica_de_origem,
                                          "Estado de Conservação" => $taxa->Estado_de_conservacao,
                                          "Estado na Região Açores" => $taxa->Estatuto_na_Regiao_Acores,
                                          "Genus" => $taxa->Genus,
                                          "Growth Habit USDA Codes and Definitions" => $taxa->Growth_habit_USDA_codes_and_definitions,
                                          "Foliar Retention" => $taxa->Foliar_retention,
                                          "Sexual System" => $taxa->Sexual_system,
                                          "Nativity Status to Azores" => $taxa->Nativity_status_to_Azores,
                                          "Status of Exotic Species at Azores" => $taxa->Status_of_exotic_species_at_Azores,
                                          "Native Distribution Geographical Area" => $taxa->Native_distribution_geographical_area,
                                          "Life Cycle Span" => $taxa->Life_cycle_span,
                                          "Name Category" => $taxa->Name_category,
                                          "Name Status The Plant List 2013" => $taxa->Name_status_The_Plant_List_2013
                                      )
        ]
        );
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
