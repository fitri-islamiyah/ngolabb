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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->foreignId('assigned_to')->constrained('users')->onDelete('cascade');
            $table->enum('status', ['pending', 'in_progress', 'done', 'approved'])->default('pending');
            $table->string('file')->nullable(); // simpan nama file upload
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
