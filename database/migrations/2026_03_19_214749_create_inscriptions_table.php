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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('rfc', 13)->unique();
            $table->string('curp', 18)->unique();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->enum('gender', ['M', 'F', 'ND']);
            $table->string('email', 150)->unique();
            $table->foreignId('state_id')->constrained('states')->restrictOnDelete();
            $table->foreignId('municipality_id')->constrained('municipalities')->restrictOnDelete();
            $table->string('city', 500);
            $table->enum('sector', ['publico', 'privado']);
            $table->enum('job_function', ['empleado', 'empleador', 'docente']);
            $table->string('institution', 500);
            $table->string('cv_path');
            $table->string('commitment_letter_path');
            $table->string('support_letter_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
