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
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payID');
            $table->unsignedBigInteger('userID'); // Foreign Key
            $table->foreign('userID')->references('userID')->on('users');
            $table->unsignedBigInteger('appID'); // Foreign Key
            $table->foreign('appID')->references('appID')->on('applications');
            $table->string('payFor');
            $table->string('payFeeType');
            $table->decimal('payFeeTotal', 10, 2);
            $table->integer('payKioskNum');
            $table->string('payEmail');
            $table->string('payRemarks');
            $table->string('payProof');
            $table->datetime('payDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
