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
            $table->unsignedBigInteger('userID'); // Foreign Key
            $table->foreign('userID')->references('userID')->on('users');
            $table->string('appName');
            $table->string('appPhoneNum');
            $table->string('appBusinessType');
            $table->string('appKioskNum');
            $table->dateTime('appBusinessPeriod');
            $table->enum('appStatus', ['Approved', 'Rejected', 'In Progress']); 
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
