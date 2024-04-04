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
        if (!Schema::hasTable('clients')) {
            Schema::create('clients', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('phone');
                $table->unsignedBigInteger('idS');
                $table->unsignedBigInteger('idCity');
                $table->boolean('status');
                $table->timestamps();
                $table->foreign('idS')->references('id')->on('users');
                $table->foreign('idCity')->references('id')->on('citys');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
