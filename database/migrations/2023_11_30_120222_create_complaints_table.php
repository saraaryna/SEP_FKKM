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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id('compID');
            $table->unsignedBigInteger('userID'); // Foreign Key
            $table->foreign('userID')->references('userID')->on('users');
            $table->unsignedBigInteger('appID'); // Foreign Key
            $table->foreign('appID')->references('appID')->on('applications');
            $table->string('compName');
            $table->timestamp('compDate');
            $table->date('compDateOccured');
            $table->integer('compKioskNum');
            $table->string('compPhoneNum');
            $table->string('compType');
            $table->string('compDescription');
            $table->string('compEvidence');
            $table->enum('compStatus', ['In Investigation', 'In Review', 'In Progress', 'Solved']);
            $table->string('compPIC');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
