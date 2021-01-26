<?php

namespace App\Models;

use App\Http\Controllers\MemoriaController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Memoria extends Model
{
    use HasFactory;

    public function getMemorias() {
        return Memoria::all();
    }

    public function getMemoria($id)
    {
        return Memoria::findOrFail($id);
    }

    public function addMemoria(string $nome, string $idade, string $estatuto, string $fotoEdificado, string $plantaRecordar, string $rating)
    {
        $memoria = new Memoria();
        $memoria->nome_visitante = $nome;
        $memoria->faixa_etaria = $idade;
        $memoria->estatuto = $estatuto;

        if($fotoEdificado == "sim")
            $memoria->foto_edificado = 1;
        else
            $memoria->foto_edificado = 0;
        if($plantaRecordar == "sim")
            $memoria->recordar_planta = 1;
        else
            $memoria->recordar_planta = 0;

        $memoria->classificacao = $rating;
        $memoria->save();
    }

    public function deleteMemoria(int $id)
    {
        $memoria = DB::table('memorias')->where("id", $id);
        $memoria->delete();
    }
}
