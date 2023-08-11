<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
      /**
     * LNORIEGA (08/08/2023): Create table 'collection' admin the groups of images create by users.
     */
    public function up(): void
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->uuid('id')->default(\Illuminate\Support\Str::uuid());
            $table->string('title');
            $table->string('details');
            $table->string('users_id');
            $table->integer('state');
            $table->timestamp('create_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collection');
    }
};
