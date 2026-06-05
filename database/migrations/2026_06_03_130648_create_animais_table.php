<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('animais', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('especie'); // Cachorro, Gato, etc.
            $table->string('idade');   // Filhote, Adulto, Idoso
            $table->string('porte');   // Pequeno, Médio, Grande
            $table->text('descricao');
            
            // Alterado de string para text para aceitar links gigantes da internet
            $table->text('foto_url')->nullable();
            
            $table->string('status')->default('disponivel'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animais');
    }
};