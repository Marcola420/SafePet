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
        Schema::table('solicitacoes_adocao', function (Blueprint $table) {
            $table->string('concordancia_casa')->default('Sim');
            $table->string('consciencia_financeira')->default('Sim');
            $table->text('plano_viagem')->nullable();
            $table->text('comportamento_animal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('solicitacoes_adocao', function (Blueprint $table) {
            $table->dropColumn(['concordancia_casa', 'consciencia_financeira', 'plano_viagem', 'comportamento_animal']);
        });
    }
};