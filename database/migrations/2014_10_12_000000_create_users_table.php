<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('userID');
            $table->string('userIC')->nullable();
            $table->string('userName')->nullable();
            $table->string('userAddress')->nullable();
            $table->string('userPhoneNum')->nullable();
            $table->enum('userRole', ['Kiosk Participant', 'Admin', 'FK Technical Team', 'Fk Bursary', 'PUPUK Admin'])->default('Kiosk Participant'); 
            $table->string('userEmail')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('userPassword');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};