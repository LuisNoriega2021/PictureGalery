<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * LNORIEGA (08/08/2023): Create table 'Logs' to save all changes made in the database.
     */
    public function up(): void
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('details');
            $table->string('user_id')->references('id')->on('users');;
            $table->string('table_name');
            $table->timestamp('modify_time')->nullable();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
