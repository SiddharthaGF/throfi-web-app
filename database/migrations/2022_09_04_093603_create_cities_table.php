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
        Schema::create('cities', function (Blueprint $table) {
            $table->string('code_province', 2);
            $table->string('code_city', 4)->primary();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->foreign('code_province')->references('code')->on('provinces');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
};
