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
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'especie' => 'required|string',
            'idade' => 'required|string',
            'porte' => 'required|string',
            'descricao' => 'required|string',
            'foto_url' => 'nullable|url'
        ]);

        Animal::create($dados);
        return redirect()->route('admin.animais.index')->with('sucesso', 'Animal cadastrado com sucesso!');
    }

    public function deletarAnimal($id) {
        $animal = Animal::findOrFail($id);
        $animal->delete();
        return redirect()->route('admin.animais.index')->with('sucesso', 'Animal removido do sistema.');
    }


    // --- FUNÇÕES DA TRIAGEM ---

    /**
     * Lista as solicitações e calcula os dados do Dashboard
     */
    public function triagem() {
        $solicitacoes = SolicitacaoAdocao::with(['usuario', 'animal'])->latest()->get();

        // CONTADORES DO DASHBOARD (Novidade)
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