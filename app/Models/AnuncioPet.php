<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnuncioPet extends Model
{
    protected $table = 'anuncios_pets';
    protected $fillable = ['user_id', 'tipo_anuncio', 'nome_pet', 'especie', 'contato', 'cidade', 'descricao', 'foto_url'];

    public function usuario() {
        return $this->belongsTo(User::class, 'user_id');
    }
}