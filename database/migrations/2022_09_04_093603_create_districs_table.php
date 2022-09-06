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
        Schema::create('districts', function (Blueprint $table) {
            $table->string('code_state', 2);
            $table->string('code_district', 4)->primary();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('districts', function (Blueprint $table) {
            $table->foreign('code_state')->references('code')->on('states');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('districts');
    }
};
