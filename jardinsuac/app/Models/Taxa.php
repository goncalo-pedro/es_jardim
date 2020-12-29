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
}
