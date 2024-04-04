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
        Schema::create('validation_the_bon', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ass'); 
            $table->unsignedBigInteger('codeBonS'); 
            $table->boolean('status'); 
            $table->timestamps();
            
            
            $table->foreign('id_ass')->references('id')->on('users');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('validation_the_bon');
    }
};
