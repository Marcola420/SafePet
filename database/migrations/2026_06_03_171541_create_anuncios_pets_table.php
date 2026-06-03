<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('anuncios_pets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('tipo_anuncio'); // 'perdi', 'encontrei', 'doar'
            $table->string('nome_pet')->nullable(); // Quem encontrou pode não saber o nome
            $table->string('especie'); // Cachorro / Gato
            $table->string('contato'); // Telefone ou WhatsApp
            $table->string('cidade');
            $table->text('descricao');
            $table->string('foto_url')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('anuncios_pets');
    }
};