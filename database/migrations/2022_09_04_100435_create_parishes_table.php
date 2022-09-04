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
        Schema::create('parishes', function (Blueprint $table) {
            $table->string('code_city', 4);
            $table->string('code_parish', 6)->primary();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('parishes', function (Blueprint $table) {
            $table->foreign('code_city')->references('code_city')->on('cities');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parishes');
    }
};
