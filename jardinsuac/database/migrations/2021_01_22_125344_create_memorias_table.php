<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memorias', function (Blueprint $table) {
            $table->id();
            $table->string("nome_visitante");
            $table->string("faixa_etaria");
            $table->string("estatuto");
            $table->string("condicoes_partilha_campus")->nullable();
            $table->string("foto1_campus")->nullable();
            $table->string("foto2_campus")->nullable();
            $table->string("foto3_campus")->nullable();
            $table->string("foto4_campus")->nullable();
            $table->string("foto5_campus")->nullable();
            $table->string("foto6_campus")->nullable();
            $table->string("foto7_campus")->nullable();
            $table->string("foto8_campus")->nullable();
            $table->string("foto9_campus")->nullable();
            $table->string("foto10_campus")->nullable();
            $table->string("data_fotos_campus")->nullable();
            $table->string("testemunho_fotos_campus")->nullable();
            $table->boolean("recordar_planta");
            $table->string("nome_plantas_recordar")->nullable();
            $table->boolean("planta_existe");
            $table->boolean("local_planta")->nullable();
            $table->string("planta_existe_removida");
            $table->string("acontecimento_desaprecimento")->nullable();
            $table->boolean("fotografia_video_planta");
            $table->string("condicoes_partilha_planta")->nullable();
            $table->string("foto1_planta")->nullable();
            $table->string("foto2_planta")->nullable();
            $table->string("foto3_planta")->nullable();
            $table->string("foto4_planta")->nullable();
            $table->string("foto5_planta")->nullable();
            $table->string("foto6_planta")->nullable();
            $table->string("foto7_planta")->nullable();
            $table->string("foto8_planta")->nullable();
            $table->string("foto9_planta")->nullable();
            $table->string("foto10_planta")->nullable();
            $table->string("data_fotos_planta")->nullable();
            $table->string("testemunho_fotos_planta")->nullable();
            $table->integer("classificacao");
            $table->string("opiniao_jardim")->nullable();
            $table->string("outras_observacoes")->nullable();
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
        Schema::dropIfExists('memorias');
    }
}
