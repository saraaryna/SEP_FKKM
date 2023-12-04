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
        Schema::create('kiosks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userID'); // Foreign Key userID
            $table->foreign('userID')->references('id')->on('users');
            $table->integer('kioskNumber');
            $table->string('KioskLocation');
            $table->enum('kioskStatus', ['Available', 'Not Available']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kiosks');
    }
};
