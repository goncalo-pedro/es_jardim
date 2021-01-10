<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaxaNomeComum extends Model
{
    use HasFactory;

    public function taxa() : BelongsTo
    {
        return $this->belongsTo(Taxa::class);
    }

    function addNomeComumTaxa(string $common_name, int $numControlo): void
    {
        $taxa = (new Taxa)->where('NumControlo', $numControlo)->first();
        $taxaNomeComum = new TaxaNomeComum();
        $taxaNomeComum->common_name = $common_name;
        $taxaNomeComum->taxa()->associate($taxa);
        $taxaNomeComum->save();
    }
}
