<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('processes', function (Blueprint $table) {
            $table->string('bonus')->nullable();
            $table->string('tea')->nullable();
        });
    }


    public function down(): void
    {
        Schema::table('processes', function (Blueprint $table) {
            $table->dropColumn('bonus');
            $table->dropColumn('tea');
        });
    }
};
