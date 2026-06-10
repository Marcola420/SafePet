<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnuncioPet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // Importação caso precise manipular arquivos futuramente

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
        // 1. ALTERAÇÃO: Validação alterada para aceitar arquivos de imagem físicos
        $dados = $request->validate([
            'nome_pet' => 'nullable|string|max:255',
            'especie' => 'required|string',
            'contato' => 'required|string',
            'cidade' => 'required|string',
            'descricao' => 'required|string',
            'foto_url' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048' // Aceita apenas imagens de até 2MB
        ]);

        // 2. ALTERAÇÃO: Lógica para processar o upload do arquivo
        $caminhoFoto = 'https://images.unsplash.com/photo-1543466835-00a7907e9de1?w=500'; // Imagem padrão caso não envie nada

        if ($request->hasFile('foto_url') && $request->file('foto_url')->isValid()) {
            // Salva a imagem física na pasta 'storage/app/public/anuncios'
            // O Laravel vai gerar um nome único e seguro para o arquivo automaticamente
            $caminhoFoto = $request->file('foto_url')->store('anuncios', 'public');
        }

        AnuncioPet::create([
            'user_id' => Auth::id(),
            'tipo_anuncio' => $tipo,
            'nome_pet' => $dados['nome_pet'],
            'especie' => $dados['especie'],
            'contato' => $dados['contato'],
            'cidade' => $dados['cidade'],
            'descricao' => $dados['descricao'],
            'foto_url' => $caminhoFoto // Salva o caminho gerado (ou a URL padrão) no banco
        ]);

        return redirect()->back()->with('sucesso', 'Anúncio publicado com sucesso na comunidade!');
    }
}