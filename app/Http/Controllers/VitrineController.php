<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class VitrineController extends Controller
{
    /**
     * Exibe a vitrine pública de pets com suporte a filtros dinâmicos
     */
    public function index(Request $request)
    {
        // Começa a busca trazendo apenas animais disponíveis para adoção
        $query = Animal::where('status', 'disponivel');

        // Se o usuário filtrou por Espécie (Cachorro/Gato)
        if ($request->filled('especie')) {
            $query->where('especie', $request->especie);
        }

        // Se o usuário filtrou por Porte (Pequeno/Médio/Grande)
        if ($request->filled('porte')) {
            $query->where('porte', $request->porte);
        }

        // animais ordenados pelos mais recentes
        $animais = $query->latest()->get();

        // Caminho para apontar para a sua pasta 'vitrine.index'
        return view('vitrine.index', compact('animais'));
    }

    /**
     * Exibe os detalhes de um pet específico
     */
    public function show($id)
    {
        $animal = Animal::findOrFail($id);
        
        // Caminho para apontar para a sua pasta 'vitrine.show'
        return view('vitrine.show', compact('animal'));
    }
}