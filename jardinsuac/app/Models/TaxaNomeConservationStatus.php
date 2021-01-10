<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaxaNomeConservationStatus extends Model
{
    use HasFactory;

    public function taxa() : BelongsTo
    {
        return $this->belongsTo(Taxa::class);
    }

    function addNomeConservationStatus(string $conservation_status, int $numControlo): void
    {
        $taxa = (new Taxa)->where('NumControlo', $numControlo)->first();
        $taxaNomeConservationStatus = new TaxaNomeConservationStatus();
        $taxaNomeConservationStatus->conservation_status = $conservation_status;
        $taxaNomeConservationStatus->taxa()->associate($taxa);
        $taxaNomeConservationStatus->save();
    }
}
