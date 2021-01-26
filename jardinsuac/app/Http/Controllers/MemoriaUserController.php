<?php

namespace App\Http\Controllers;

use App\Models\Memoria;
use Illuminate\Http\Request;

class MemoriaUserController extends Controller
{
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

    public function storeMemorias () {
        return view("criar_memoria");
    }
}
