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
        Schema::create('coders', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('surnames');
            $table->date('birth_date');
            $table->string('nationality');
            $table->string('email')->unique();
            $table->string('phone');
            $table->date('register_date');
            $table->string('user_account');
            $table->string('points');
            $table->string('github');          

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
        Schema::dropIfExists('coders');
    }
};
