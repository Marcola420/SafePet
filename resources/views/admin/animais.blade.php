@extends('layouts.app')

@section('conteudo')
<div class="grid grid-cols-1 md:grid-cols-3 gap-8 px-4">
    <!-- COLUNA DA ESQUERDA: FORMULÁRIO -->
    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow border border-gray-100 dark:border-gray-700 transition-colors duration-300">
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4">Cadastrar Novo Pet</h2>
        <form action="{{ route('admin.animais.salvar') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nome do Animal</label>
                <input type="text" name="nome" required class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded p-2 text-sm text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-colors duration-300">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Espécie</label>
                <select name="especie" required class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded p-2 text-sm text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-colors duration-300">
                    <option value="Cachorro">Cachorro</option>
                    <option value="Gato">Gato</option>
                </select>
            </div>
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Idade</label>
                    <select name="idade" required class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded p-2 text-sm text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-colors duration-300">
                        <option value="Filhote">Filhote</option>
                        <option value="Adulto">Adulto</option>
                        <option value="Idoso">Idoso</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Porte</label>
                    <select name="porte" required class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded p-2 text-sm text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-colors duration-300">
                        <option value="Pequeno">Pequeno</option>
                        <option value="Médio">Médio</option>
                        <option value="Grande">Grande</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">URL da Foto (Opcional)</label>
                <input type="url" name="foto_url" placeholder="https://..." class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded p-2 text-sm text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-colors duration-300">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Histórico / Descrição</label>
                <textarea name="descricao" rows="3" required class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded p-2 text-sm text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-colors duration-300"></textarea>
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded font-medium hover:bg-indigo-700 transition shadow-sm">Salvar no Banco</button>
        </form>
    </div>

    <!-- COLUNA DA DIREITA: LISTAGEM DE ANIMAIS -->
    <div class="md:col-span-2 bg-white dark:bg-gray-800 p-6 rounded-xl shadow border border-gray-100 dark:border-gray-700 transition-colors duration-300">
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4">Animais no Sistema</h2>
        <div class="space-y-3">
            @foreach($animais as $ani)
                <div class="flex items-center justify-between border-b border-gray-100 dark:border-gray-700 pb-3 text-sm transition-colors duration-300">
                    <div class="flex items-center space-x-3">
                        <span class="text-2xl">🐾</span>
                        <div>
                            <p class="font-bold text-gray-900 dark:text-gray-100">{{ $ani->nome }} ({{ $ani->especie }})</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Status atual: 
                                <span class="font-semibold uppercase tracking-wider px-1.5 py-0.5 rounded text-[10px] transition-colors duration-300 
                                    {{ $ani->status === 'disponivel' ? 'bg-green-100 dark:bg-green-950/40 text-green-800 dark:text-green-400' : ($ani->status === 'em_triagem' ? 'bg-yellow-100 dark:bg-yellow-950/40 text-yellow-800 dark:text-yellow-400' : 'bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-300') }}">
                                    {{ $ani->status }}
                                </span>
                            </p>
                        </div>
                    </div>
                    <form action="{{ route('admin.animais.deletar', $ani->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 font-medium transition-colors">Excluir</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection