<?php

namespace App\Http\Controllers;

use App\Models\Taxa;
use App\Models\TaxaNomeComum;
use App\Models\TaxaNomeComumReferencia;
use App\Models\TaxaNomeConservationStatus;
use App\Models\TaxaNomeConservationStatusReference;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
                "rows" => $taxa->getTaxas(),
                'nomes' => (new TaxaNomeComum)->getNomes(),
                'master' => Auth::user()->getAdminMaster(),
                'user' => Auth::user(),
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
        $row = (new Taxa)->getTaxa($id);

        return view('admin.perfil_taxa', [
            "id" => $id,
            "row" => $row,
            'caractIng'=> array(
                "Num Controlo" =>$row->NumControlo,
                "Group" => $row->Group,
                "Division" => $row->Division,
                "Family" => $row->Family,
                "Scientific Name" => $row->ScientificName,
                "Native Distribution" => $row->NativeDistribution,
                "Status Azores" => $row->StatusAzores,
                "Short Description" => $row->ShortDescription,
                "Last Updated" => $row->LastUpdated,
                "Scientific Name Reference:" => $row->Scientific_name_Reference,
                "Scientific Name Link" => $row->Scientific_name_Link,
                "Native Distribution Reference" => $row->Native_distribution_Reference,
                "Native Distribution Link" => $row->Native_distribution_Link,
                "Status at Azores References" => $row->Status_at_Azores_References,
                "Status at Azores Link" => $row->Status_at_Azores_Link
            ),
            'caractPt'=> array(
                "Grupo" => $row->Grupo,
                "Nome Comum" => $row->Nome_comum,
                "Nome Comum Referência" => $row->Nome_comum_Referencia,
                "Nome Comum Link" => $row->Nome_comum_Link,
                "Região Geográfica de Origem" => $row->Regiao_geografica_de_origem,
                "Estado de Conservação" => $row->Estado_de_conservacao,
                "Estatuto na Região dos Açores" => $row->Estatuto_na_Regiao_Acores,
                "Breve Descrição" => $row->Breve_descricao,
            ),
            'search'=> array(
                "Genus" => $row->Genus,
                "Growth Habit USDA codes and Definitions" => $row->Growth_habit_USDA_codes_and_definitions,
                "Foliar retention" => $row->Foliar_retention,
                "Sexual System" => $row->Sexual_system,
                "Nativity Status to Azores" => $row->Nativity_status_to_Azores,
                "Status of exotic species at Azores" => $row->Status_of_exotic_species_at_Azores,
                "Native Distribution Geographical Area" => $row->Native_distribution_geographical_area,
                "Plant Origin" => $row->Plant_origin,
                "Life cycle" => $row->Life_cycle_span,
                "Name Category" => $row->Name_category,
                "Name Status The Plant List 2013" => $row->Name_status_The_Plant_List_2013

            ),'search'=> array(
                "Genus" => $row->Genus,
                "Growth Habit USDA codes and Definitions" => $row->Growth_habit_USDA_codes_and_definitions,
                "Foliar retention" => $row->Foliar_retention,
                "Sexual System" => $row->Sexual_system,
                "Nativity Status to Azores" => $row->Nativity_status_to_Azores,
                "Status of exotic species at Azores" => $row->Status_of_exotic_species_at_Azores,
                "Native Distribution Geographical Area" => $row->Native_distribution_geographical_area,
                "Plant Origin" => $row->Plant_origin,
                "Life cycle" => $row->Life_cycle_span,
                "Name Category" => $row->Name_category,
                "Name Status The Plant List 2013" => $row->Name_status_The_Plant_List_2013
            ),

            'hyper'=> array(
                "Link 1" => $row->Link_1,
                "Link 2" => $row->Link_2,
                "Link 3" => $row->Link_3,
                "Link 4" => $row->Link_4,
                "Link 5" => $row->Link_5,
            ),

            "nomes" => (new TaxaNomeComum)->getTaxaNomes($id),
            "conservationsStatus" => (new TaxaNomeConservationStatusReference())->getTaxaConservations($id),
            "commonNames" => (new TaxaNomeComumReferencia())->getTaxaNomes($id),
            "conservations" => (new TaxaNomeConservationStatus())->getTaxaConservations($id),
            'master' => Auth::user()->getAdminMaster(),
            'user' => Auth::user(),
        ]);
    }

    /**
     * @param int $id
     * @param Taxa $taxa
     * @return Application|Factory|View
     */
    public function edit (int $id) {

        $row = (new Taxa)->getTaxa($id);

        return view("admin.editar_taxa", [
            "row" => $row,
            "id" => $row->id,
            'caractIng'=> array(
                "Num Controlo" =>$row->NumControlo,
                "Group" => $row->Group,
                "Division" => $row->Division,
                "Family" => $row->Family,
                "Scientific Name" => $row->ScientificName,
                "Native Distribution" => $row->NativeDistribution,
                "Status Azores" => $row->StatusAzores,
                "Short Description" => $row->ShortDescription,
                "Last Updated" => $row->LastUpdated,
                "Scientific Name Reference:" => $row->Scientific_name_Reference,
                "Scientific Name Link" => $row->Scientific_name_Link,
                "Native Distribution Reference" => $row->Native_distribution_Reference,
                "Native Distribution Link" => $row->Native_distribution_Link,
                "Status at Azores References" => $row->Status_at_Azores_References,
                "Status at Azores Link" => $row->Status_at_Azores_Link
            ),
            'caractPt'=> array(
                "Grupo" => $row->Grupo,
                "Nome Comum" => $row->Nome_comum,
                "Nome Comum Referência" => $row->Nome_comum_Referencia,
                "Nome Comum Link" => $row->Nome_comum_Link,
                "Região Geográfica de Origem" => $row->Regiao_geografica_de_origem,
                "Estado de Conservação" => $row->Estado_de_conservacao,
                "Estatuto na Região dos Açores" => $row->Estatuto_na_Regiao_Acores,
                "Breve Descrição" => $row->Breve_descricao,
            ),
            'search'=> array(
                "Genus" => $row->Genus,
                "Growth Habit USDA codes and Definitions" => $row->Growth_habit_USDA_codes_and_definitions,
                "Foliar retention" => $row->Foliar_retention,
                "Sexual System" => $row->Sexual_system,
                "Nativity Status to Azores" => $row->Nativity_status_to_Azores,
                "Status of exotic species at Azores" => $row->Status_of_exotic_species_at_Azores,
                "Native Distribution Geographical Area" => $row->Native_distribution_geographical_area,
                "Plant Origin" => $row->Plant_origin,
                "Life cycle" => $row->Life_cycle_span,
                "Name Category" => $row->Name_category,
                "Name Status The Plant List 2013" => $row->Name_status_The_Plant_List_2013

            ),'search'=> array(
                "Genus" => $row->Genus,
                "Growth Habit USDA codes and Definitions" => $row->Growth_habit_USDA_codes_and_definitions,
                "Foliar retention" => $row->Foliar_retention,
                "Sexual System" => $row->Sexual_system,
                "Nativity Status to Azores" => $row->Nativity_status_to_Azores,
                "Status of exotic species at Azores" => $row->Status_of_exotic_species_at_Azores,
                "Native Distribution Geographical Area" => $row->Native_distribution_geographical_area,
                "Plant Origin" => $row->Plant_origin,
                "Life cycle" => $row->Life_cycle_span,
                "Name Category" => $row->Name_category,
                "Name Status The Plant List 2013" => $row->Name_status_The_Plant_List_2013
            ),

            'hyper'=> array(
                "Link 1" => $row->Link_1,
                "Link 2" => $row->Link_2,
                "Link 3" => $row->Link_3,
                "Link 4" => $row->Link_4,
                "Link 5" => $row->Link_5,
            ),

            "nomes" => (new TaxaNomeComum)->getTaxaNomes($id),
            "conservationsStatus" => (new TaxaNomeConservationStatusReference())->getTaxaConservations($id),
            "commonNames" => (new TaxaNomeComumReferencia())->getTaxaNomes($id),
            "conservations" => (new TaxaNomeConservationStatus())->getTaxaConservations($id),
            'master' => Auth::user()->getAdminMaster(),
            'user' => Auth::user(),
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {
        if ($request->has('ficheiro_enquadramento')) {
            $pathEnquadramento = $request->file('ficheiro_enquadramento')->store('public');
            $pathEnquadramento = substr($pathEnquadramento, 6);
            $pathEnquadramento = "storage" . $pathEnquadramento;
        } else {
            $pathEnquadramento = "";
        }
        if($request->has('ficheiro_taxa')) {
            $pathTaxa = $request->file('ficheiro_taxa')->store('public');
            $pathTaxa = substr($pathTaxa, 6);
            $pathTaxa = "storage" . $pathTaxa;
        } else {
            $pathTaxa = "";
        }

        (new Taxa)->updateTaxa($id, $pathEnquadramento, $pathTaxa);

        return redirect("admin/taxas/{$id}");
    }
    public function home(Taxa $taxa)
    {
        return view('admin.home',
            [
                "rows" => $taxa->getTaxas(),
                'nomes' => (new TaxaNomeComum)->getNomes(),
                'admins' => User::all(),
                'user' => Auth::user(),
            ]);
    }
}
