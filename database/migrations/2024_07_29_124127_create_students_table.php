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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nisn')->unique();
            $table->string('full_name');
            $table->string('call_name');
            $table->string('gender');
            $table->date('birth_date');
            $table->string('birth_place');
            $table->string('religion');
            $table->string('citizenship');
            $table->string('child_order');
            $table->string('sibling_count');
            $table->string('language');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
