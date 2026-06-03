<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('solicitacoes_adocao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('animal_id')->constrained('animais')->onDelete('cascade');
            
            // Campos de Endereço (ViaCEP)
            $table->string('cep');
            $table->string('logradouro');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf', 2);

            // Campos do Questionário Socioambiental
            $table->string('tipo_residencia');
            $table->string('tempo_sozinho');
            $table->string('tem_outros_pets');
            $table->text('motivo_adocao');
            
            $table->string('status')->default('pendente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solicitacoes_adocao');
    }
};