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
        Schema::create('applications', function (Blueprint $table) {
            $table->id('appID');
            $table->unsignedBigInteger('userID'); // Foreign Key userID
            $table->foreign('userID')->references('id')->on('users');
            $table->unsignedBigInteger('kioskID'); // Foreign Key kioskID
            $table->foreign('kioskID')->references('id')->on('kiosks');
            $table->enum('appBusinessType', ['Food & Beverages', 'Clothing', 'Beauty & Personal Care', 'Others']);
            $table->date('appStartDate');
            $table->enum('appStatus', ['In Progress', 'Approved', 'Rejected']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
