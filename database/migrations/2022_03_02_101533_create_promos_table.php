<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_promo');
            $table->string('ubicación');
            $table->string('escuela');
            $table->string('escuela_id');
            $table->date('fecha_de_inicio');
            $table->string('duración');
            $table->string('url');
            $table->string('imagen');
            $table->string('código');
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
        Schema::dropIfExists('promo');
    }
};
