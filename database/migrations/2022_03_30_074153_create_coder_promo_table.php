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
        Schema::create('coder_promo', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('coder_id');
            $table->unsignedBigInteger('promo_id');

            $table->foreign('coder_id')->references('id')->on('coders')->cascadeOnDelete();
            $table->foreign('promo_id')->references('id')->on('promos')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coder_promo');
    }
};
