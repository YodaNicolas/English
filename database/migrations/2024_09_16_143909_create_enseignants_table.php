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
        Schema::create('enseignants', function (Blueprint $table) {
            $table->id();
            $table->string('Nom');
            $table->string('Prénom');
            $table->string('Sexe')->nullable();
            $table->string('Mle')->nullable();
            $table->string('Emploi')->nullable();
            $table->string('Discipline')->nullable();
            $table->string('Categorie')->nullable();
            $table->string('Fonction')->nullable();
            $table->string('Commune')->nullable();
            $table->string('Etab')->nullable();
            $table->string('Contact')->nullable();
            $table->string('Highest_academic_degree')->nullable();
            $table->string('Pre_service_training')->nullable();
            $table->string('Professional_qualification')->nullable();
            $table->string('Teaching_experience')->nullable();
            $table->string('In_service_training')->nullable();
            $table->string('Number_previous_visits')->nullable();
            $table->timestamps();
        });
    }

       
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enseignants');
    }
};
