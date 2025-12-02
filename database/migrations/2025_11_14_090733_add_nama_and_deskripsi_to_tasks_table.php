<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            if (!Schema::hasColumn('tasks', 'nama')) {
                $table->string('nama')->after('project_id');
            }

            if (!Schema::hasColumn('tasks', 'deskripsi')) {
                $table->text('deskripsi')->nullable()->after('nama');
            }
        });
    }

    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn(['nama', 'deskripsi']);
        });
    }

};
