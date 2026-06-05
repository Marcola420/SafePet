@extends('layouts.app')

@section('conteudo')
<div class="max-w-4xl mx-auto mt-6 space-y-6">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 transition-colors duration-300">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Meu Painel de Adoções 🐾</h1>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Acompanhe em tempo real o andamento dos seus pedidos de adoção no SafePet.</p>
    </div>

    @if(session('sucesso'))
        <div class="bg-green-100 dark:bg-green-900/50 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-200 px-4 py-3 rounded-xl transition-colors duration-300">
            {{ session('sucesso') }}
        </div>
    @endif

    <div class="space-y-4">
        @forelse($solicitacoes as $s)
            <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 grid grid-cols-1 md:grid-cols-4 gap-6 items-center transition-colors duration-300">
                
                <div class="flex items-center space-x-4 border-b md:border-b-0 md:border-r border-gray-100 dark:border-gray-700 pb-4 md:pb-0">
                    <img src="{{ $s->animal->foto_url }}" class="w-16 h-16 object-cover rounded-full shadow-inner">
                    <div>
                        <h3 class="font-bold text-gray-800 dark:text-gray-100 text-lg">{{ $s->animal->nome }}</h3>
                        <p class="text-xs text-gray-400 dark:text-gray-400">{{ $s->animal->especie }}</p>
                    </div>
                </div>

                <div class="md:col-span-3 flex items-center justify-between w-full relative">
                    
                    <div class="flex flex-col items-center z-10 w-1/3">
                        <div class="w-8 h-8 rounded-full bg-emerald-500 text-white flex items-center justify-center text-xs font-bold shadow">✓</div>
                        <span class="text-xs font-semibold text-gray-700 dark:text-gray-300 mt-2">Formulário Enviado</span>
                    </div>

                    <div class="absolute left-[16%] right-[50%] top-4 h-0.5 bg-emerald-500 -z-0"></div>

                    <div class="flex flex-col items-center z-10 w-1/3">
                        @if($s->status == 'pendente')
                            <div class="w-8 h-8 rounded-full bg-amber-500 text-white flex items-center justify-center text-xs font-bold shadow animate-pulse">⏳</div>
                            <span class="text-xs font-bold text-amber-600 dark:text-amber-400 mt-2">Em Triagem</span>
                        @else
                            <div class="w-8 h-8 rounded-full bg-emerald-500 text-white flex items-center justify-center text-xs font-bold shadow">✓</div>
                            <span class="text-xs font-semibold text-gray-700 dark:text-gray-300 mt-2">Análise Concluída</span>
                        @endif
                    </div>

                    <div class="absolute left-[50%] right-[16%] top-4 h-0.5 {{ $s->status != 'pendente' ? 'bg-emerald-500' : 'bg-gray-200 dark:bg-gray-700' }} -z-0"></div>

                    <div class="flex flex-col items-center z-10 w-1/3">
                        @if($s->status == 'pendente')
                            <div class="w-8 h-8 rounded-full bg-gray-200 dark:bg-gray-700 text-gray-400 dark:text-gray-300 flex items-center justify-center text-xs font-bold">3</div>
                            <span class="text-xs font-medium text-gray-400 dark:text-gray-400 mt-2">Resultado</span>
                        @elseif($s->status == 'aprovado')
                            <div class="w-8 h-8 rounded-full bg-emerald-600 text-white flex items-center justify-center text-xs font-bold shadow">🎉</div>
                            <span class="text-xs font-bold text-emerald-600 dark:text-emerald-400 mt-2">Aprovado!</span>
                        @else
                            <div class="w-8 h-8 rounded-full bg-red-500 text-white flex items-center justify-center text-xs font-bold shadow">❌</div>
                            <span class="text-xs font-bold text-red-500 dark:text-red-400 mt-2">Recusado</span>
                        @endif
                    </div>

                </div>

            </div>
        @empty
            <div class="bg-gray-50 dark:bg-gray-800/50 p-8 rounded-2xl text-center text-gray-400 dark:text-gray-400 border border-dashed border-gray-200 dark:border-gray-700 transition-colors duration-300">
                Você ainda não enviou nenhuma proposta de adoção. Visite a nossa vitrine!
            </div>
        @endforelse
    </div>
</div>
@endsection