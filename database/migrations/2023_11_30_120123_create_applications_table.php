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
            $table->id();
            $table->unsignedBigInteger('userID')->nullable();
            $table->foreign('userID')->references('id')->on('users')->nullable();
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
