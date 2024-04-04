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
        Schema::create('bons_sale', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('code');  
            $table->unsignedBigInteger('idus'); 
            $table->unsignedBigInteger('idc');
            $table->unsignedBigInteger('idp');
            $table->Integer('quantity_Carton');
            $table->Integer('quantity_piece');
            $table->decimal('price');
            $table->boolean('regulation'); 
            $table->boolean('status'); 
            $table->string('Payment_type'); 
            $table->timestamps();
            
            $table->foreign('idp')->references('id')->on('products');
            $table->foreign('idus')->references('id')->on('users');
            $table->foreign('idc')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bons_sales');
    }
};
