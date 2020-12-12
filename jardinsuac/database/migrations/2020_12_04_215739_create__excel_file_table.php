<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcelFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('InventarioConteudosTaxa', function (Blueprint $table) {
            $table->id();
            $table->Integer('NumControlo');
            $table->String('Group')->nullable();
            $table->String('Division')->nullable();
            $table->String('Family')->nullable();
            $table->String('ScientificName')->nullable();
            $table->String('CommonName')->nullable();
            $table->String('NativeDistribution')->nullable();
            $table->String('ConservationStatus')->nullable();
            $table->String('StatusAzores')->nullable();
            $table->String('ShortDescription' )->nullable();
            $table->DateTime('LastUpdated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('InventarioConteudosTaxa');
    }
}
