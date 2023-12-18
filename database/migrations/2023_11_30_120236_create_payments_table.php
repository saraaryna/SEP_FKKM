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
            $table->bigIncrements('payID');
            $table->foreign('userID')->references('userID')->on('users');
            $table->foreign('appID')->references('appID')->on('applications');
            $table->string('payFor');
            $table->string('payFeeType');
            $table->decimal('payFeeTotal', 10, 2);
            $table->integer('payKioskNum');
            $table->string('payEmail');
            $table->string('payRemarks');
            $table->string('payProof');
            $table->string('payFor');
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
