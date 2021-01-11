<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaxaNomeConservationStatusReference extends Model
{
    use HasFactory;

    public function taxa() : BelongsTo
    {
        return $this->belongsTo(Taxa::class);
    }

    function addNomeConservationStatusReference(string $conservation_status_reference, string $conservation_status_link, int $numControlo): void
    {
        $taxa = (new Taxa)->where('NumControlo', $numControlo)->first();
        $taxaNomeConservationStatusReference = new TaxaNomeConservationStatusReference();
        $taxaNomeConservationStatusReference->conservation_status_reference = $conservation_status_reference;
        $taxaNomeConservationStatusReference->conservation_status_link = $conservation_status_link;
        $taxaNomeConservationStatusReference->taxa()->associate($taxa);
        $taxaNomeConservationStatusReference->save();
    }

    public function getConservations()
    {
        return TaxaNomeConservationStatusReference::all();
    }

    public function getTaxaConservations(int $id)
    {
        return TaxaNomeConservationStatusReference::where('taxa_id', $id)->get();
    }
}
