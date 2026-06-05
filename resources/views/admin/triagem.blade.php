@extends('layouts.app')

@section('conteudo')
<div class="max-w-6xl mx-auto mt-6 space-y-6 px-4">
    
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 flex items-center gap-2 transition-colors duration-300">🔍 Central de Triagem (SafePet)</h1>

    <!-- 📊 DASHBOARD DE INDICADORES -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Card 1 -->
        <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 p-5 rounded-2xl text-white shadow-sm flex items-center justify-between">
            <div>
                <p class="text-sm font-medium opacity-80">Total de Pets Cadastrados</p>
                <p class="text-3xl font-bold mt-1">{{ $totalPets }}</p>
            </div>
            <span class="text-3xl bg-white bg-opacity-20 p-3 rounded-xl">🐾</span>
        </div>

        <!-- Card 2 -->
        <div class="bg-gradient-to-br from-amber-500 to-amber-600 p-5 rounded-2xl text-white shadow-sm flex items-center justify-between">
            <div>
                <p class="text-sm font-medium opacity-80">Adoções Em Análise</p>
                <p class="text-3xl font-bold mt-1">{{ $pendentes }}</p>
            </div>
            <span class="text-3xl bg-white bg-opacity-20 p-3 rounded-xl">⏳</span>
        </div>

        <!-- Card 3 -->
        <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 p-5 rounded-2xl text-white shadow-sm flex items-center justify-between">
            <div>
                <p class="text-sm font-medium opacity-80">Adoções Concluídas</p>
                <p class="text-3xl font-bold mt-1">{{ $adocoesSucesso }}</p>
            </div>
            <span class="text-3xl bg-white bg-opacity-20 p-3 rounded-xl">🎉</span>
        </div>
    </div>

    <!-- TABELA DE SOLICITAÇÕES -->
    <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-md border border-gray-100 dark:border-gray-700 transition-colors duration-300">
        @if(session('sucesso'))
            <div class="bg-green-100 dark:bg-green-900/50 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-200 px-4 py-3 rounded mb-4 transition-colors duration-300">
                {{ session('sucesso') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 dark:bg-gray-900/50 border-b border-gray-200 dark:border-gray-700 text-gray-600 dark:text-gray-400 font-semibold text-sm transition-colors duration-300">
                        <th class="p-4">Adotante</th>
                        <th class="p-4">Pet Solicitado</th>
                        <th class="p-4">Cidade/UF</th>
                        <th class="p-4">Status</th>
                        <th class="p-4 text-center">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700 text-gray-700 dark:text-gray-300 transition-colors duration-300">
                    @forelse($solicitacoes as $s)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                            <td class="p-4 font-semibold text-gray-800 dark:text-gray-200">{{ $s->usuario->name }}</td>
                            <td class="p-4 text-indigo-600 dark:text-indigo-400 font-medium">{{ $s->animal->nome }}</td>
                            <td class="p-4 text-sm text-gray-500 dark:text-gray-400">{{ $s->cidade }}/{{ $s->uf }}</td>
                            <td class="p-4">
                                @if($s->status == 'pendente')
                                    <span class="bg-amber-100 dark:bg-amber-950/40 text-amber-800 dark:text-amber-400 text-xs px-2.5 py-1 rounded-full font-bold transition-colors duration-300">Em Análise</span>
                                @elseif($s->status == 'aprovado')
                                    <span class="bg-emerald-100 dark:bg-emerald-950/40 text-emerald-800 dark:text-emerald-400 text-xs px-2.5 py-1 rounded-full font-bold transition-colors duration-300">Aprovada</span>
                                @else
                                    <span class="bg-red-100 dark:bg-red-950/40 text-red-800 dark:text-red-400 text-xs px-2.5 py-1 rounded-full font-bold transition-colors duration-300">Recusada</span>
                                @endif
                            </td>
                            <td class="p-4 text-center">
                                <a href="{{ route('admin.solicitacao.ver', $s->id) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm px-4 py-2 rounded-lg font-semibold transition shadow-sm inline-block">
                                    Ver Ficha Completa
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-400 dark:text-gray-500">Nenhum pedido de adoção recebido até o momento.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection