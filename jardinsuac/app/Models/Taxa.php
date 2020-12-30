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

    public function getExoticSpecies()
    {
        return $this->arrayFiltros(
            DB::table('taxas')->select("Status_of_exotic_species_at_Azores")->distinct()->get()->toArray(),
            "Status_of_exotic_species_at_Azores"
        );
    }

    public function getPlantOrigin()
    {
        return $this->arrayFiltros(
            DB::table('taxas')->select("Plant_origin")->distinct()->get()->toArray(),
            "Plant_origin"
        );
    }

    public function getLifeCycle()
    {
        return $this->arrayFiltros(
            DB::table('taxas')->select("Life_cycle_span")->distinct()->get()->toArray(),
            "Life_cycle_span"
        );
    }

    public function getNameCategory()
    {
        return $this->arrayFiltros(
            DB::table('taxas')->select("Name_category")->distinct()->get()->toArray(),
            "Name_category"
        );
    }

    public function getStatusPlantList()
    {
        return $this->arrayFiltros(
            DB::table('taxas')->select("Name_status_The_Plant_List_2013")->distinct()->get()->toArray(),
            "Name_status_The_Plant_List_2013"
        );
    }

    public function arrayFiltros ($valoresColuna, $nomeColuna)
    {
        $valoresDistintos = array();
        foreach($valoresColuna as $valor)
            $valoresDistintos[] = $valor->$nomeColuna;
        return $valoresDistintos;
    }

    public function filtrosCompostos ($cd, $eu, $mi, $aiwi, $af, $ioi, $as, $oc, $pi, $na, $ca, $sa)
    {
        $valoresDistintos = array();
        if($cd != null)
            $valoresDistintos[] = "Cosmopolitan";
        if($eu != null)
            $valoresDistintos[] = "Europe";
        if($mi != null)
            $valoresDistintos[] = "Mediterranean";
        if($aiwi != null)
            $valoresDistintos[] = "Atlantic Islands including West indies";
        if($af != null)
            $valoresDistintos[] = "Africa";
        if($ioi != null)
            $valoresDistintos[] = "Indian Ocean Islands";
        if($as != null)
            $valoresDistintos[] = "Asia";
        if($oc != null)
            $valoresDistintos[] = "Oceania";
        if($pi != null)
            $valoresDistintos[] = "Pacific Islands";
        if($na != null)
            $valoresDistintos[] = "North America";
        if($ca != null)
            $valoresDistintos[] = "Central America";
        if($sa != null)
            $valoresDistintos[] = "South America";

        return $valoresDistintos;
    }

    public function getNativeArea()
    {
        return $this->filtrosCompostos(
            DB::table('taxas')->where("Cosmopolitan_distribution", "=", "1")->first(),
            DB::table('taxas')->where("Europe", "=", "1")->first(),
            DB::table('taxas')->where("Mediterranean_islands", "=", "1")->first(),
            DB::table('taxas')->where("Atlantic_islands_including_West_Indies", "=", "1")->first(),
            DB::table('taxas')->where("Africa", "=", "1")->first(),
            DB::table('taxas')->where("Indian_Ocean_islands", "=", "1")->first(),
            DB::table('taxas')->where("Asia", "=", "1")->first(),
            DB::table('taxas')->where("Oceania", "=", "1")->first(),
            DB::table('taxas')->where("Pacific_islands", "=", "1")->first(),
            DB::table('taxas')->where("North_America", "=", "1")->first(),
            DB::table('taxas')->where("Central_America", "=", "1")->first(),
            DB::table('taxas')->where("South_America", "=", "1")->first()
        );
    }

}
