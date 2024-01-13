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
            $table->id();
            $table->string('nama');
            $table->string('key');
            $table->string('tahun');
            $table->string('foto', 2048)->nullable();
            $table->unsignedBigInteger('tps_id')->nullable();
            $table->unsignedBigInteger('partai_id')->nullable();
            $table->unsignedBigInteger('dapil_id')->nullable();
            $table->integer('suara')->default(0);
            $table->boolean('is_active')->default(true);

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
