@extends('layouts.app')

@section('conteudo')
<div class="max-w-4xl mx-auto mt-6 space-y-6">
    
    <div class="flex justify-between items-center bg-white p-4 rounded-xl shadow-sm border border-gray-100">
        <a href="{{ route('admin.triagem') }}" class="text-sm font-semibold text-indigo-600 hover:underline">← Voltar para a Triagem</a>
        <span class="text-sm text-gray-400">Enviado em: {{ $solicitacao->created_at->format('d/m/Y H:i') }}</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <div class="space-y-6">
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">👤 Solicitante</h3>
                <p class="text-lg font-bold text-gray-800">{{ $solicitacao->usuario->name }}</p>
                <p class="text-sm text-gray-500">{{ $solicitacao->usuario->email }}</p>
            </div>

            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 text-center">
                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3 text-left">🐾 Pet Escolhido</h3>
                <img src="{{ $solicitacao->animal->foto_url }}" class="w-24 h-24 object-cover rounded-full mx-auto shadow-md mb-2">
                <p class="text-lg font-bold text-gray-800">{{ $solicitacao->animal->nome }}</p>
                <p class="text-xs text-gray-500">{{ $solicitacao->animal->especie }} • {{ $solicitacao->animal->porte }}</p>
            </div>
        </div>

        <div class="md:col-span-2 space-y-6">
            
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">📍 Endereço da Residência</h2>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="text-gray-400 text-xs font-semibold uppercase">Rua/Logradouro</p>
                        <p class="text-gray-800 font-medium">{{ $solicitacao->logradouro }}, Nº {{ $solicitacao->numero }}</p>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs font-semibold uppercase">Bairro</p>
                        <p class="text-gray-800 font-medium">{{ $solicitacao->bairro }}</p>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs font-semibold uppercase">Cidade / UF</p>
                        <p class="text-gray-800 font-medium">{{ $solicitacao->cidade }} - {{ $solicitacao->uf }}</p>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs font-semibold uppercase">CEP</p>
                        <p class="text-gray-800 font-medium">{{ $solicitacao->cep }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 space-y-4">
                <h2 class="text-lg font-bold text-gray-800 border-b pb-2 flex items-center gap-2">📋 Respostas Socioambientais</h2>
                
                <div>
                    <p class="text-gray-500 text-xs font-medium">Tipo de moradia:</p>
                    <p class="text-gray-800 font-semibold">{{ $solicitacao->tipo_residencia }}</p>
                </div>

                <div>
                    <p class="text-gray-500 text-xs font-medium">Tempo que o pet ficará sozinho por dia:</p>
                    <p class="text-gray-800 font-semibold">{{ $solicitacao->tempo_sozinho }}</p>
                </div>

                <div>
                    <p class="text-gray-500 text-xs font-medium">Possui outros animais?</p>
                    <p class="text-gray-800 font-semibold">{{ $solicitacao->tem_outros_pets }}</p>
                </div>

                <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                    <p class="text-gray-500 text-xs font-bold uppercase mb-1">Motivação da Adoção:</p>
                    <p class="text-gray-700 italic text-sm whitespace-pre-line">"{{ $solicitacao->motivo_adocao }}"</p>
                </div>
            </div>

            @if($solicitacao->status === 'pendente')
                <div class="bg-gray-50 p-4 rounded-2xl border border-gray-200 flex items-center justify-between gap-4">
                    <div class="text-sm text-gray-500">
                        👉 <strong>Avaliador:</strong> Revise as informações acima antes de tomar uma decisão.
                    </div>
                    <div class="flex gap-3">
                        <form action="{{ route('admin.solicitacao.responder', $solicitacao->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="status" value="rejeitado">
                            <button type="submit" class="bg-red-50 hover:bg-red-100 text-red-600 px-5 py-2.5 rounded-xl font-bold text-sm border border-red-200 transition">
                                Recusar Pedido
                            </button>
                        </form>

                        <form action="{{ route('admin.solicitacao.responder', $solicitacao->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="status" value="aprovado">
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2.5 rounded-xl font-bold text-sm shadow-sm transition">
                                Aprovar Adoção! 🎉
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="p-4 rounded-2xl text-center text-sm font-bold {{ $solicitacao->status === 'aprovado' ? 'bg-green-50 text-green-700 border border-green-200' : 'bg-red-50 text-red-700 border border-red-200' }}">
                    Essa solicitação já foi finalizada com o status: {{ strtoupper($solicitacao->status) }}
                </div>
            @endif

        </div>
    </div>
</div>
@endsection