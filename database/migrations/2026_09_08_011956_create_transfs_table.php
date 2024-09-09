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
        Schema::create('transfs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('remetente_id')->constrained('users');
            $table->foreignId('destinatario_id')->constrained('users');
            $table->double('valor'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfs');
    }
};
