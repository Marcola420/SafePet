<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'tipo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function eAdmin(): bool
    {
        return $this->tipo === 'administrador';
    }

    public function eCandidato(): bool
    {
        return $this->tipo === 'candidato';
    }

    public function solicitacoes()
    {
        return $this->hasMany(SolicitacaoAdocao::class, 'user_id');
    }
}