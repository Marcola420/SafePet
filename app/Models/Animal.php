<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animais';

    protected $fillable = [
        'nome',
        'especie',
        'idade',
        'porte',
        'descricao',
        'foto_url',
        'status',
    ];

    public function solicitacoes()
    {
        return $this->hasMany(SolicitacaoAdocao::class, 'animal_id');
    }
}