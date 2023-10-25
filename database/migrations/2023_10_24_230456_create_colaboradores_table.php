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
        Schema::create('colaboradores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unidade_id');
            $table->unsignedBigInteger('cargo_id');
            $table->string('nome');
            $table->string('cpf')->unique();
            $table->string('email')->unique();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('unidade_id')->references('id')->on('unidades');
            $table->foreign('cargo_id')->references('id')->on('cargos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaboradores');
    }
};
