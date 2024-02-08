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
        Schema::create('calons', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->integer('no');
            $table->string('nama');
            $table->string('key');
            $table->string('tahun');
            $table->string('type');
            $table->string('foto', 2048)->nullable();
            $table->string('tps_id')->nullable();
            $table->string('partai_id')->nullable();
            $table->string('dapil_id')->nullable();
            $table->integer('suara')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('lock')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calons');
    }
};
