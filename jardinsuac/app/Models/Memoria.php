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

    public function addMemoria(
        string $nome,
        string $idade,
        string $estatuto,
        string $fotoEdificado,
        string $plantaRecordar,
        string $rating,
        string $permissaoEdificado,
        string $dataEdficiado,
        string $testemunhoEdificado,
        string $plantaQual,
        string $plantaExist,
        string $plantaLocal,
        string $anoPlanta,
        string $plantaRazaoRemocao,
        string $plantaFoto,
        string $permissaoPlanta,
        string $dataPlanta,
        string $testemunhoPlanta,
        string $mudarJardim,
        string $observacoes,
        array $fotosEdificado,
        array $fotosPlantas)
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

        $memoria->condicoes_partilha_campus = $permissaoEdificado;
        $memoria->data_fotos_campus = $dataEdficiado;
        $memoria->testemunho_fotos_campus = $testemunhoEdificado;
        $memoria->nome_plantas_recordar = $plantaQual;

        if($plantaExist == "sim")
            $memoria->planta_existe = 1;
        else
            $memoria->planta_existe = 0;

        $memoria->local_planta = $plantaLocal;
        $memoria->planta_existe_removida = $anoPlanta;
        $memoria->acontecimento_desaprecimento = $plantaRazaoRemocao;

        if($plantaFoto == "sim")
            $memoria->fotografia_video_planta = 1;
        else
            $memoria->fotografia_video_planta = 0;

        $memoria->condicoes_partilha_planta = $permissaoPlanta;
        $memoria->data_fotos_planta = $dataPlanta;
        $memoria->testemunho_fotos_planta = $testemunhoPlanta;
        $memoria->opiniao_jardim = $mudarJardim;
        $memoria->outras_observacoes = $observacoes;

        for($i = 1; $i <= 12; $i++){
            if($i == 1){
                $memoria->foto1_campus = $fotosEdificado[$i - 1];
            } else if($i == 2){
                $memoria->foto2_campus = $fotosEdificado[$i - 1];
            } else if($i == 3){
                $memoria->foto3_campus = $fotosEdificado[$i - 1];
            } else if($i == 4){
                $memoria->foto4_campus = $fotosEdificado[$i - 1];
            } else if($i == 5){
                $memoria->foto5_campus = $fotosEdificado[$i - 1];
            } else if($i == 6){
                $memoria->foto6_campus = $fotosEdificado[$i - 1];
            } else if($i == 7){
                $memoria->foto7_campus = $fotosEdificado[$i - 1];
            } else if($i == 8){
                $memoria->foto8_campus = $fotosEdificado[$i - 1];
            } else if($i == 9){
                $memoria->foto9_campus = $fotosEdificado[$i - 1];
            } else if($i == 10) {
                $memoria->foto10_campus = $fotosEdificado[$i - 1];
            }
        }

        for($i = 1; $i <= 12; $i++){
            if($i == 1){
                $memoria->foto1_planta = $fotosPlantas[$i - 1];
            } else if($i == 2){
                $memoria->foto2_planta = $fotosPlantas[$i - 1];
            } else if($i == 3){
                $memoria->foto3_planta = $fotosPlantas[$i - 1];
            } else if($i == 4){
                $memoria->foto4_planta = $fotosPlantas[$i - 1];
            } else if($i == 5){
                $memoria->foto5_planta = $fotosPlantas[$i - 1];
            } else if($i == 6){
                $memoria->foto6_planta = $fotosPlantas[$i - 1];
            } else if($i == 7){
                $memoria->foto7_planta = $fotosPlantas[$i - 1];
            } else if($i == 8){
                $memoria->foto8_planta = $fotosPlantas[$i - 1];
            } else if($i == 9){
                $memoria->foto9_planta = $fotosPlantas[$i - 1];
            } else if($i == 10){
                $memoria->foto10_planta = $fotosPlantas[$i - 1];
            }
        }
        $memoria->save();
    }

    public function deleteMemoria(int $id)
    {
        $memoria = DB::table('memorias')->where("id", $id);
        $memoria->delete();
    }
}
