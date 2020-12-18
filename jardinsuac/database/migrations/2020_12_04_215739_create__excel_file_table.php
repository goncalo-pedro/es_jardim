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
            $table->Integer('NumControlo')->nullable();
            $table->String('Group')->nullable();
            $table->String('Division')->nullable();
            $table->String('Family')->nullable();
            $table->String('ScientificName')->nullable();
            $table->String('CommonName')->nullable();
            $table->String('NativeDistribution')->nullable();
            $table->String('ConservationStatus')->nullable();
            $table->String('StatusAzores')->nullable();
            $table->String('ShortDescription' )->nullable();
            $table->DateTime('LastUpdated')->nullable();
            $table->String('Scientific_name_Reference')->nullable();
            $table->String('Scientific_name_Link')->nullable();
            $table->String('Common_name_Reference')->nullable();
            $table->String( 'Common_name_Link')->nullable();
            $table->String('Native_distribution_Reference')->nullable();
            $table->String('Native_distribution_Link')->nullable();
            $table->String('Conservation_status_Reference')->nullable();
            $table->String('Conservation_status_Link')->nullable();
            $table->String( 'Status_at_Azores_References')->nullable();
            $table->String('Status_at_Azores_Link')->nullable();
            $table->String('Grupo')->nullable();
            $table->String('Nome_comum')->nullable();
            $table->String('Nome_comum_Referência')->nullable();
            $table->String('Nome_comum_Link')->nullable();
            $table->String('Região_geográfica_de_origem')->nullable();
            $table->String('Estado_de_conservação')->nullable();
            $table->String('Estatuto_na_Região_Açores')->nullable();
            $table->String('Breve_descrição')->nullable();
            $table->String('Genus')->nullable();
            $table->String('Growth_habit_USDA_codes_and_definitions' )->nullable();
            $table->String('Foliar_retention')->nullable();
            $table->String('Sexual_system')->nullable();
            $table->String('Nativity_status_to_Azores')->nullable();
            $table->String('Status_of_exotic_species_at_Azores')->nullable();
            $table->String('Native_distribution_geographical_area')->nullable();
            $table->Integer('Cosmopolitan_distribution')->nullable();
            $table->Integer('Europe')->nullable();
            $table->Integer('Mediterranean_islands')->nullable();
            $table->Integer('Atlantic_islands_including_West_Indies')->nullable();
            $table->Integer('Africa')->nullable();
            $table->Integer('Indian_Ocean_islands')->nullable();
            $table->Integer('Asia')->nullable();
            $table->Integer('Oceania')->nullable();
            $table->Integer('Pacific_islands')->nullable();
            $table->Integer('North_America')->nullable();
            $table->Integer('Central_America')->nullable();
            $table->Integer('South_America')->nullable();
            $table->String(  'Plant_origin')->nullable();
            $table->String(  'Life_cycle_span')->nullable();
            $table->String( 'Name_category')->nullable();
            $table->String( 'Name_status_The_Plant_List_2013')->nullable();
            $table->String( 'Link_1')->nullable();
            $table->String(  'Link_2')->nullable();
            $table->String(  'Link_3')->nullable();
            $table->String( 'Link_4')->nullable();
            $table->String(  'Link_5')->nullable();
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
