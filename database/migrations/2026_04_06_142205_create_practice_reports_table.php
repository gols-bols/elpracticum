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
        Schema::create('practice_reports', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('group')->nullable();
            $table->string('supervisor')->nullable();
            $table->string('organization')->nullable();
            $table->string('period')->nullable();
            $table->text('tasks')->nullable();
            $table->text('conclusion')->nullable();
            $table->string('file_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practice_reports');
    }
};
