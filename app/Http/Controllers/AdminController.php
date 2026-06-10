<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\SolicitacaoAdocao;

class AdminController extends Controller
{
    // --- FUNÇÕES DOS ANIMAIS ---

    public function indexAnimais() {
        $animais = Animal::all();
        return view('admin.animais', compact('animais'));
    }

    public function salvarAnimal(Request $request) {
        // Validação alterada para ler arquivos físicos do computador
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'especie' => 'required|string',
            'idade' => 'required|string',
            'porte' => 'required|string',
            'descricao' => 'required|string',
            'foto_url' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048' // Aceita imagens até 2MB
        ]);

        // URL padrão caso não envie nada
        $caminhoFoto = 'https://images.unsplash.com/photo-1543466835-00a7907e9de1?w=500'; 

        // Processa o upload do arquivo e envia para 'storage/app/public/animais'
        if ($request->hasFile('foto_url') && $request->file('foto_url')->isValid()) {
            $caminhoFoto = $request->file('foto_url')->store('animais', 'public');
        }

        // Sobrescreve o dado de 'foto_url' com o caminho local ou o padrão
        $dados['foto_url'] = $caminhoFoto;

        Animal::create($dados);
        
        return redirect()->route('admin.animais.index')->with('sucesso', 'Animal cadastrado com sucesso!');
    }

    public function deletarAnimal($id) {
        $animal = Animal::findOrFail($id);
        $animal->delete();
        return redirect()->route('admin.animais.index')->with('sucesso', 'Animal removido do sistema.');
    }

    // --- NOVA FUNÇÃO DE ATUALIZAÇÃO ENCAIXADA AQUI ---
    public function atualizarAnimal(Request $request, $id) {
        $animal = Animal::findOrFail($id);

        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'especie' => 'required|string',
            'idade' => 'required|string',
            'porte' => 'required|string',
            'descricao' => 'required|string',
            'foto_url' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        // Se o administrador selecionou uma nova foto, processa o upload
        if ($request->hasFile('foto_url') && $request->file('foto_url')->isValid()) {
            $caminhoFoto = $request->file('foto_url')->store('animais', 'public');
            $dados['foto_url'] = $caminhoFoto;
        } else {
            // Se não enviou foto nova, remove o campo do array para manter a foto atual intacta
            unset($dados['foto_url']);
        }

        $animal->update($dados);

        return redirect()->route('admin.animais.index')->with('sucesso', 'Informações do pet atualizadas com sucesso!');
    }


    // --- FUNÇÕES DA TRIAGEM ---

    public function triagem() {
        $solicitacoes = SolicitacaoAdocao::with(['usuario', 'animal'])->latest()->get();

        // CONTADORES DO DASHBOARD
        $totalPets = Animal::count();
        $pendentes = SolicitacaoAdocao::where('status', 'pendente')->count();
        $adocoesSucesso = SolicitacaoAdocao::where('status', 'aprovado')->count();

        return view('admin.triagem', compact('solicitacoes', 'totalPets', 'pendentes', 'adocoesSucesso'));
    }

    /**
     * Mostra a ficha socioambiental detalhada de um adotante específico
     */
    public function verSolicitacao($id) {
        $solicitacao = SolicitacaoAdocao::with(['usuario', 'animal'])->findOrFail($id);
        return view('admin.detalhes-solicitacao', compact('solicitacao'));
    }

    /**
     * Aprova ou Reprova a adoção e muda o status do pet automaticamente
     */
    public function responderSolicitacao(Request $request, $id) {
        $solicitacao = SolicitacaoAdocao::findOrFail($id);
        $status = $request->input('status');

        $solicitacao->update(['status' => $status]);

        if ($status === 'aprovado') {
            $solicitacao->animal->update(['status' => 'adotado']);
            $mensagem = 'Adoção aprovada com sucesso! O pet agora está com status Adotado.';
        } else {
            $solicitacao->animal->update(['status' => 'disponivel']);
            $mensagem = 'Adoção recusada. O pet voltou a ficar disponível para a vitrine.';
        }

        return redirect()->route('admin.triagem')->with('sucesso', $mensagem);
    }
}