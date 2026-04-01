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
        Schema::create('inscriptions_status', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_inscription');
            $table->unsignedBigInteger('id_graduate');
            $table->enum('status', ['aceptado', 'rechazado']);
            $table->text('motivo')->nullable();
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

            $table->foreign('id_inscription')->references('id')->on('inscriptions')->onDelete('cascade');  
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_graduate')->references('id')->on('graduates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions_status');
    }
};
