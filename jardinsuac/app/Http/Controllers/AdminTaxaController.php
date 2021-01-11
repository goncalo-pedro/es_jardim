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
        return view('admin.perfil_taxa', [
            "row" => (new Taxa)->getTaxa($id),
            "nomes" => (new TaxaNomeComum)->getTaxaNomes($id),
            "conservationsStatus" => (new TaxaNomeConservationStatusReference())->getTaxaConservations($id),
            "commonNames" => (new TaxaNomeComumReferencia())->getTaxaNomes($id),
            "conservations" => (new TaxaNomeConservationStatus())->getTaxaConservations($id),
            'master' => Auth::user()->getAdminMaster(),
            'user' => Auth::user(),
        ]);
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
