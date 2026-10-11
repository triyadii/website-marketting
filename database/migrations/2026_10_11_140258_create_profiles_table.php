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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('nama_produk')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->text('foto_hero_section')->nullable();
            $table->text('keterangan_profil')->nullable();
            $table->string('nama_sales')->nullable();
            $table->string('jabatan_sales')->nullable();
            $table->string('jam_operasional')->nullable();
            $table->text('alamat')->nullable();
            $table->string('ig')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('treads')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
