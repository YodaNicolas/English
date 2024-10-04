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
        Schema::create('str_weeks', function (Blueprint $table) {
            $table->id();
            $table->mediumText('Object1')->nullable();
            $table->mediumText('Object2')->nullable();
            $table->mediumText('Object3')->nullable();
            $table->mediumText('Object4')->nullable();
            $table->mediumText('Object5')->nullable();
            $table->mediumText('Str1')->nullable();
            $table->mediumText('Str2')->nullable();
            $table->mediumText('Str3')->nullable();
            $table->mediumText('Str4')->nullable();
            $table->mediumText('Str5')->nullable();
            $table->mediumText('Str6')->nullable();
            $table->mediumText('Str7')->nullable();
            $table->mediumText('Str8')->nullable();
            $table->mediumText('Str9')->nullable();
            $table->mediumText('Str10')->nullable();
            $table->mediumText('Week1')->nullable();
            $table->mediumText('Week2')->nullable();
            $table->mediumText('Week3')->nullable();
            $table->mediumText('Week4')->nullable();
            $table->mediumText('Week5')->nullable();
            $table->mediumText('Week6')->nullable();
            $table->mediumText('Week7')->nullable();
            $table->mediumText('Week8')->nullable();
            $table->mediumText('Week9')->nullable();
            $table->mediumText('Week10')->nullable();
            $table->mediumText('Week_conlusion')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('str_weeks');
    }
};
