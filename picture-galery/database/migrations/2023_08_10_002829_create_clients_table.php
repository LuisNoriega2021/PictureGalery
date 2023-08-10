<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
     * LNORIEGA (08/08/2023): Create table 'clients' to admin all the users properties registered in the database.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickname')->unique();
            $table->string('password');
            $table->string('persons_id')->references('id')->on('persons');
            $table->timestamp('create_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
