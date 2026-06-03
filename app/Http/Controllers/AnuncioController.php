<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnuncioPet;
use Illuminate\Support\Facades\Auth;

class AnuncioController extends Controller
{
    // Exibe a página com base no tipo (doar, perdi, encontrei)
    public function carregarPagina($tipo)
    {
        // Busca os anúncios daquele tipo específico
        $anuncios = AnuncioPet::where('tipo_anuncio', $tipo)->with('usuario')->latest()->get();
        
        return view('paginas.comunidade', compact('anuncios', 'tipo'));
    }

    // Salva o anúncio no banco de dados
    public function salvarAnuncio(Request $request, $tipo)
    {
        $dados = $request->validate([
            'nome_pet' => 'nullable|string|max:255',
            'especie' => 'required|string',
            'contato' => 'required|string',
            'cidade' => 'required|string',
            'descricao' => 'required|string',
            'foto_url' => 'nullable|url'
        ]);

        AnuncioPet::create([
            'user_id' => Auth::id(),
            'tipo_anuncio' => $tipo,
            'nome_pet' => $dados['nome_pet'],
            'especie' => $dados['especie'],
            'contato' => $dados['contato'],
            'cidade' => $dados['cidade'],
            'descricao' => $dados['descricao'],
            'foto_url' => $dados['foto_url'] ?? 'https://images.unsplash.com/photo-1543466835-00a7907e9de1?w=500'
        ]);

        return redirect()->back()->with('sucesso', 'Anúncio publicado com sucesso na comunidade!');
    }
}