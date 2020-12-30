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
        return DB::table('taxas')->select("genus")->get();
    }

    public function getUSDA()
    {
        return DB::table('taxas')->select("Growth_habit_USDA_codes_and_definitions")->get();
    }

    public function getFoliar()
    {
        return DB::table('taxas')->select("Foliar_retention")->get();
    }

    public function getSexual()
    {
        return DB::table('taxas')->select("Sexual_system")->get();
    }

    public function getNativity()
    {
        return DB::table('taxas')->select("Nativity_status_to_Azores")->get();
    }


}
