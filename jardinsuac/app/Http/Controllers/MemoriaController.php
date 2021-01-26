<?php

namespace App\Http\Controllers;

use App\Models\Memoria;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MemoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $memoria = new Memoria();
        return view("listar_memorias", $memoria->getMemorias());
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
     * @param Memoria $memoria
     * @return Application|Factory|View|Response
     */
    public function show(int $id, Memoria $memoria)
    {
        return view("detalhes_memoria", $memoria->getMemoria($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Memoria $memoria
     * @return Response
     */
    public function edit(Memoria $memoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Memoria $memoria
     * @return Response
     */
    public function update(Request $request, Memoria $memoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Memoria $memoria
     * @return Response
     */
    public function destroy(Memoria $memoria)
    {
        //
    }
}
