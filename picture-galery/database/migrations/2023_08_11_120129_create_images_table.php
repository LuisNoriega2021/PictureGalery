<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
      /**
     * LNORIEGA (08/08/2023): Create table 'images' to save the info related to the load images.
     */
    public function up(): void
    {
        Schema::create('images', function (Blueprint $table) {
            $table->uuid('id')->default(\Illuminate\Support\Str::uuid());
            $table->string('title');
            $table->string('details');
            $table->string('path');
            $table->string('disks');
            $table->uuid('collection_id')->nullable();
            $table->timestamp('create_time')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
