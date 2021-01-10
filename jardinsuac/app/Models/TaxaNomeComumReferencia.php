<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaxaNomeComumReferencia extends Model
{
    use HasFactory;

    public function taxa() : BelongsTo
    {
        return $this->belongsTo(Taxa::class);
    }

    function addNomeComumReferencia(string $common_name_reference, string $common_name_link, int $numControlo): void
    {
        $taxa = (new Taxa)->where('NumControlo', $numControlo)->first();
        $taxaNomeComumReferencia = new TaxaNomeComumReferencia();
        $taxaNomeComumReferencia->common_name_reference = $common_name_reference;
        $taxaNomeComumReferencia->common_name_link = $common_name_link;
        $taxaNomeComumReferencia->taxa()->associate($taxa);
        $taxaNomeComumReferencia->save();
    }
}
