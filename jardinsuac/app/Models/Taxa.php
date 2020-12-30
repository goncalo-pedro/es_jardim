<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Taxa extends Model
{
    use HasFactory;

    public function getTaxas(){
        return Taxa::all();
    }

    public function getTaxa($id) {
        return DB::table('taxas')->where('id', $id)->first();
    }

    public function getGenus()
    {
        return $this->arrayFiltros(
            DB::table('taxas')->select("Genus")->distinct()->get()->toArray(),
            "Genus"
        );
    }

    public function getUSDA()
    {
        return $this->arrayFiltros(
            DB::table('taxas')->select("Growth_habit_USDA_codes_and_definitions")->distinct()->get()->toArray(),
            "Growth_habit_USDA_codes_and_definitions"
        );
    }

    public function getFoliar()
    {
        return $this->arrayFiltros(
            DB::table('taxas')->select("Foliar_retention")->distinct()->get()->toArray(),
            "Foliar_retention"
        );
    }

    public function getSexual()
    {
        return $this->arrayFiltros(
            DB::table('taxas')->select("Sexual_system")->distinct()->get()->toArray(),
            "Sexual_system"
        );
    }

    public function getNativity()
    {
        return $this->arrayFiltros(
            DB::table('taxas')->select("Nativity_status_to_Azores")->distinct()->get()->toArray(),
            "Nativity_status_to_Azores"
        );
    }

    public function arrayFiltros ($valoresColuna, $nomeColuna)
    {
        $valoresDistintos = array();
        foreach($valoresColuna as $valor)
            $valoresDistintos[] = $valor->$nomeColuna;
        return $valoresDistintos;
    }


}
