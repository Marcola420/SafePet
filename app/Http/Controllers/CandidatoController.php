<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\SolicitacaoAdocao;
use Illuminate\Support\Facades\Auth;

class CandidatoController extends Controller
{
    /**
     * Exibe o painel do candidato com o histórico de solicitações dele.
     */
    public function painel()
    {
        // Busca apenas as solicitações do usuário logado
        $solicitacoes = SolicitacaoAdocao::where('user_id', Auth::id())->with('animal')->get();
        
        return view('candidato.painel', compact('solicitacoes'));
    }

    
    public function formularioAdocao($animal_id)
    {
        $animal = Animal::findOrFail($animal_id);
        
        return view('candidato.formulario', compact('animal'));
    }

    /**
     * Valida os dados (incluindo o endereço do ViaCEP) e salva no banco de dados.
     */
    public function submeterFormulario(Request $request, $animal_id)
    {
        $animal = Animal::findOrFail($animal_id);

        // Validação rigorosa dos campos enviados pelo formulário
        $dados = $request->validate([
            'cep' => 'required|string|max:10',
            'logradouro' => 'required|string',
            'numero' => 'required|string',
            'bairro' => 'required|string',
            'cidade' => 'required|string',
            'uf' => 'required|string|max:2',
            'tipo_residencia' => 'required|string',
            'tempo_sozinho' => 'required|string',
            'tem_outros_pets' => 'required|string',
            'motivo_adocao' => 'required|string|min:10',
            'concordancia_casa' => 'required|string',         
            'consciencia_financeira' => 'required|string',    
             'plano_viagem' => 'required|string',              
             'comportamento_animal' => 'required|string',        
        
            ]);

        // Cria a solicitação pendente de análise
        SolicitacaoAdocao::create([
            'user_id' => Auth::id(),
            'animal_id' => $animal->id,
            'cep' => $dados['cep'],
            'logradouro' => $dados['logradouro'],
            'numero' => $dados['numero'],
            'bairro' => $dados['bairro'],
            'cidade' => $dados['cidade'],
            'uf' => $dados['uf'],
            'tipo_residencia' => $dados['tipo_residencia'],
            'tempo_sozinho' => $dados['tempo_sozinho'],
            'tem_outros_pets' => $dados['tem_outros_pets'],
            'motivo_adocao' => $dados['motivo_adocao'],
            'status' => 'pendente'
        ]);

        // Altera o status do animal para retirar da vitrine pública imediatamente
        $animal->update(['status' => 'em_triagem']);

        // Redireciona para o painel com mensagem de sucesso
        return redirect()->route('candidato.painel')->with('sucesso', 'Formulário socioambiental enviado! Sua adoção está Em Análise.');
    }
}