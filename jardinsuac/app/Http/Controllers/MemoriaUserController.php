<?php

namespace App\Http\Controllers;

use App\Models\Memoria;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;

class MemoriaUserController extends Controller
{

    const nome = "nome";
    const idade= "idade";
    const estatuto = "estatuto";
    const foto_edificado = "foto_edificado";
    const permissao_edificado = "permissao_edificado";
    const ficheiro_edificado = "ficheiro_edificado";
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
    const ficheiro_plantas = "ficheiro_plantas";
    const data_planta = "data_planta";
    const testemunho_planta = "testemunho_planta";
    const selected_rating = "selected_rating";
    const mudar_jardim = "mudar_jardim";
    const observacoes = "observacoes";

    /**
     * @return Application|Factory|View
     * @throws ValidationException
     */
    public function storeMemorias () {

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
            $memoria = new Memoria();
            $memoria->addMemoria(
                request(self::nome),
                request(self::idade),
                request(self::estatuto),
                request(self::foto_edificado),
                request(self::planta_recordar),
                request(self::selected_rating)
            );
            return redirect('testemunhos');
        } catch (\Dotenv\Exception\ValidationException $e) {
            return redirect("testemunhos/criar")->withInput()->withErrors(["userCreateError" => $e->getMessage()]);
        }
    }

    public function homeMemoria () {
        $memoria = new Memoria();
        return view("listar_memorias",
            [
                "memorias" => $memoria->getMemorias()
            ]
        );
    }

    public function criarMemoria () {
        return view("criar_memoria");
    }

    public function showMemoria(int $id)
    {
        return view("detalhes_memoria",
            [
                "memoria" => (new Memoria())->getMemoria($id)
            ]

        );

    }
}
