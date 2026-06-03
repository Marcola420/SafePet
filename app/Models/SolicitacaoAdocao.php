<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitacaoAdocao extends Model
{
    protected $table = 'solicitacoes_adocao';

    protected $fillable = [
        'user_id',
        'animal_id',
        'cep',             // <-- Adicionado
        'logradouro',      // <-- Adicionado
        'numero',          // <-- Adicionado
        'bairro',          // <-- Adicionado
        'cidade',          // <-- Adicionado
        'uf',              // <-- Adicionado
        'tipo_residencia',
        'tempo_sozinho',
        'tem_outros_pets',
        'motivo_adocao',
        'status',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }
}