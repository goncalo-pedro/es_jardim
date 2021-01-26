<?php

namespace App\Models;

use App\Http\Controllers\MemoriaController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
