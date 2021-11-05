<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCidadesTable extends Migration
{
    public function up()
    {
        Schema::create('cidades', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->unsignedBigInteger('ibge_cidade_id');
            $table->unsignedBigInteger('ibge_estado_id');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['ibge_cidade_id', 'ibge_estado_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('cidades');
    }
}
