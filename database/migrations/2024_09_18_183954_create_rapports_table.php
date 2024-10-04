<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rapports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campagne_id')->constrained()->onDelete('cascade');
            $table->foreignId('enseignant_id')->constrained()->onDelete('cascade');
            $table->foreignId('str_week_id')->constrained()->onDelete('cascade');
            $table->foreignId('regional_direct_id')->constrained()->onDelete('cascade');
            $table->string('date_visite')->nullable();
            $table->string('Level_Class')->nullable();
            $table->string('lesson_nature')->nullable();
            $table->string('lesson')->nullable();
            $table->integer('boys')->nullable();
            $table->integer('girls')->nullable();
            $table->mediumText('Observation');
            $table->mediumText('Aim')->nullable();
            $table->mediumText('Description')->nullable();
            $table->string('Statut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapports');
    }
};
