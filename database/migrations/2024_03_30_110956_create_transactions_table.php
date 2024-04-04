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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('code');
            $table->unsignedBigInteger('idus'); 
            $table->unsignedBigInteger('idua'); 
            $table->boolean('statu'); 
            $table->timestamps();
              
            $table->foreign('idus')->references('id')->on('users');
            $table->foreign('idua')->references('id')->on('users');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
