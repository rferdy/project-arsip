<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_towers', function (Blueprint $table) {
            $table->id('id');
            $table->string('paket');
            $table->string('siteID');
            $table->string('provinsi')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('desa')->nullable();
            $table->string('LM_nonLM')->nullable();
            $table->string('koordinat_usulan')->nullable();
            $table->string('koordinatlattUsulan')->nullable();
            $table->string('siteName');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_towers');
    }
};
