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
        Schema::create('dapil_d_p_r_d_s', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('nama');
            $table->integer('kursi')->default(0);
            $table->unsignedBigInteger('kota_id');
            $table->foreign('kota_id')->references('id')->on('kotas');
            $table->string('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dapil_d_p_r_d_s');
    }
};
