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
        Schema::create('regional_directs', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("acronyme");
            $table->string("commune");
            $table->string("province");
            $table->string("region");
            $table->string("entet_reg");
            $table->string("entet_dir");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regional_directs');
    }
};
