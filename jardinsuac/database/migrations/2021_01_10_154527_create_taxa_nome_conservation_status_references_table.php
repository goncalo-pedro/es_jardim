<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxaNomeConservationStatusReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxa_nome_conservation_status_references', function (Blueprint $table) {
            $table->id();
            $table->string("conservation_status_reference");
            $table->string("conservation_status_link");
            $table->foreignId("taxa_id")->constrained("taxas");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxa_nome_conservation_status_references');
    }
}
