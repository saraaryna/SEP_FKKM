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
        Schema::create('users', function (Blueprint $table) {
            $table->id('userID');
            $table->string('userIC');
            $table->string('userName');
            $table->string('userAddress');
            $table->string('userPhoneNum');
            $table->enum('role', ['Kiosk Participant', 'Admin', 'FK Technical Team', 'Fk Bursary', 'PUPUK Admin'])->default('Kiosk Participant'); 
            $table->string('userEmail')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};