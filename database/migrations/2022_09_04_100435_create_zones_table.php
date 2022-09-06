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
        Schema::create('zones', function (Blueprint $table) {
            $table->string('code_district', 4);
            $table->string('code_zone', 6)->primary();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('zones', function (Blueprint $table) {
            $table->foreign('code_district')->references('code_district')->on('districts');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('districs');
    }
};
