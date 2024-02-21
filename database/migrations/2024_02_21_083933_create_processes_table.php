<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('processes', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('earned')->comment('заработал')->default('---')->nullable();
            $table->string('salary')->comment('зарплата')->default('---')->nullable();
            $table->string('park_commission')->comment('комиссия парка')->default('---')->nullable();
            $table->string('gasoline_from_account')->comment('заправка бензина со счёта парка')
                ->default('---')->nullable();
            $table->string('gasoline_for_cash')->comment('заправка за свои')->default('---')->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('processes');
    }
};
