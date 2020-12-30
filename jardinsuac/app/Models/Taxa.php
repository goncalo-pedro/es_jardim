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

    public function getNativeArea()
    {
        return $this->arrayFiltros(
            DB::table('taxas')->select("Native_distribution_geographical_area")->distinct()->get()->toArray(),
            "Native_distribution_geographical_area"
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

}
