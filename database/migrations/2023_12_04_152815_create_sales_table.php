<?php

//ERNIE MASTURA BINTI BAKRI (CB21161)

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
        Schema::create('sales', function (Blueprint $table) {
            $table->id('salesID');
            $table->unsignedBigInteger('userID')->nullable(); // Foreign Key userID
            $table->foreign('userID')->references('userID')->on('users');
            $table->unsignedBigInteger('kioskID')->nullable();// Foreign Key kioskID
            $table->foreign('kioskID')->references('kioskID')->on('kiosks');
            $table->date('salesDate');
            $table->float('salesTotal', 8, 2);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
