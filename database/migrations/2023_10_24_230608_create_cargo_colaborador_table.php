<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cargo_colaborador', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cargo_id');
            $table->unsignedBigInteger('colaborador_id');
            $table->integer('nota_desempenho');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('cargo_id')->references('id')->on('cargos');
            $table->foreign('colaborador_id')->references('id')->on('colaboradores');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargo_colaborador');
    }
};
