<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxaNomeComumReferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxa_nome_comum_referencias', function (Blueprint $table) {
            $table->id();
            $table->string("common_name_reference");
            $table->string("common_name_link");
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
        Schema::dropIfExists('taxa_nome_comum_referencias');
    }
}
