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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userID'); // Foreign Key userID
            $table->foreign('userID')->references('userID')->on('users');
            $table->unsignedBigInteger('kioskID'); // Foreign Key kioskID
            $table->foreign('kioskID')->references('id')->on('kiosks');
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
