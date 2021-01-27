<?php

namespace App\Http\Controllers;

use App\Models\Memoria;
use Dotenv\Exception\ValidationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestemunhoUserController extends Controller
{

    const nome = "nome";
    const idade= "idade";
    const estatuto = "estatuto";
    const foto_edificado = "foto_edificado";
    const permissao_edificado = "permissao_edificado";
    const data_edificado = "data_edificado";
    const testemunho_edificado = "testemunho_edificado";
    const planta_recordar = "planta_recordar";
    const planta_qual = "planta_qual";
    const planta_exist = "planta_exist";
    const planta_local = "planta_local";
    const ano_planta = "ano_planta";
    const planta_razao_remocao = "planta_razao_remocao";
    const planta_foto = "planta_foto";
    const permissao_planta = "permissao_planta";
    const data_planta = "data_planta";
    const testemunho_planta = "testemunho_planta";
    const selected_rating = "selected_rating";
    const mudar_jardim = "mudar_jardim";
    const observacoes = "observacoes";

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index(Memoria $memoria)
    {
        return view("listar_memorias",
            [
                "memorias" => $memoria->getMemorias()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view("criar_memoria");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, Memoria $memoria)
    {
        try{
            $this->validate(request(), [
                    self::nome => ['required', 'string', 'max:255'],
                    self::idade => ['required'],
                    self::estatuto => ['required'],
                    self::foto_edificado => ['required'],
                    self::planta_recordar => ['required'],
                    self::selected_rating => ['required']
                ]
            );

            $pathsEdificados = [];

            for($i = 1; $i <= 10; $i++){
                if ($request->has('ficheiro_edificado'. $i)){
                    $path = $request->file('ficheiro_edificado' . $i)->store('public');
                    $path = substr($path, 6);
                    $path = "storage" . $path;
                    $pathsEdificados[] = $path;
                } else {
                    $pathsEdificados[] = '';
                }
            }

            $pathsPlantas = [];

            for($i = 1; $i <= 10; $i++){
                if ($request->has('ficheiro_plantas'. $i)){
                    $path = $request->file('ficheiro_plantas' . $i)->store('public');
                    $path = substr($path, 6);
                    $path = "storage" . $path;
                    $pathsPlantas[] = $path;
                } else {
                    $pathsPlantas[] = '';
                }
            }

            if(request(self::permissao_edificado) == null)
                $permissaoEdificado = "";
            else
                $permissaoEdificado = request(self::permissao_edificado);

            if(request(self::data_edificado) == null)
                $dataEdificado = "";
            else
                $dataEdificado = request(self::data_edificado);

            if(request(self::testemunho_edificado) == null)
                $testemunhoEdificado = "";
            else
                $testemunhoEdificado = request(self::testemunho_edificado);

            if(request(self::planta_qual) == null)
                $plantaQual = "";
            else
                $plantaQual = request(self::planta_qual);

            if(request(self::planta_exist) == null)
                $plantaExist = "";
            else
                $plantaExist = request(self::planta_exist);

            if(request(self::planta_local) == null)
                $plantaLocal = "";
            else
                $plantaLocal = request(self::planta_local);

            if(request(self::ano_planta) == null)
                $anoPlanta = "";
            else
                $anoPlanta = request(self::ano_planta);

            if(request(self::planta_razao_remocao) == null)
                $plantaRazaoRemocao = "";
            else
                $plantaRazaoRemocao = request(self::planta_razao_remocao);

            if(request(self::planta_foto) == null)
                $plantaFoto = "";
            else
                $plantaFoto = request(self::planta_foto);

            if(request(self::permissao_planta) == null)
                $permissaoPlanta = "";
            else
                $permissaoPlanta = request(self::permissao_planta);

            if(request(self::data_planta) == null)
                $dataPlanta = "";
            else
                $dataPlanta = request(self::data_planta);

            if(request(self::testemunho_planta) == null)
                $testemunhoPlanta = "";
            else
                $testemunhoPlanta = request(self::testemunho_planta);

            if(request(self::mudar_jardim) == "")
                $mudarJardim = "";
            else
                $mudarJardim = request(self::mudar_jardim);

            if(request(self::observacoes) == "")
                $observacoes = "";
            else
                $observacoes = request(self::observacoes);

            $memoria->addMemoria(
                request(self::nome),
                request(self::idade),
                request(self::estatuto),
                request(self::foto_edificado),
                request(self::planta_recordar),
                request(self::selected_rating),
                $permissaoEdificado,
                $dataEdificado,
                $testemunhoEdificado,
                $plantaQual,
                $plantaExist,
                $plantaLocal,
                $anoPlanta,
                $plantaRazaoRemocao,
                $plantaFoto,
                $permissaoPlanta,
                $dataPlanta,
                $testemunhoPlanta,
                $mudarJardim,
                $observacoes,
                $pathsEdificados,
                $pathsPlantas
            );
            return redirect('testemunhos');
        } catch (ValidationException $e) {
            return redirect("testemunho/criar")->withInput()->withErrors(["userCreateError" => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function show($id)
    {
        return view("detalhes_memoria",
            [
                "memoria" => (new Memoria())->getMemoria($id)
            ]

        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
