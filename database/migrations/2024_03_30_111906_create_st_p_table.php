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
        Schema::create('st_p', function (Blueprint $table) {
            $table->id();  
            $table->unsignedBigInteger('idst');
            $table->unsignedBigInteger('idp');
            $table->Integer('quantity_Carton');
            $table->Integer('quantity_piece');
            $table->timestamps();
            
            $table->foreign('idst')->references('id')->on('bons_sale');
            $table->foreign('idp')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('st_p');
    }
};
