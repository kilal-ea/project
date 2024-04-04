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
        Schema::create('storehouses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idM'); 
            $table->foreign('idM')->references('id')->on('users');
            $table->unsignedBigInteger('idcity'); 
            $table->foreign('idcity')->references('id')->on('citys');
            $table->unsignedBigInteger('idstock'); 
            $table->foreign('idstock')->references('id')->on('stocks'); 
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
        Schema::dropIfExists('storehouses');
    }
};
