@extends('layouts.app')
@section('conteudo')
<div class="max-w-4xl mx-auto mt-10 space-y-6">
    <div class="text-center">
        <span class="text-5xl">🏥</span>
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mt-2 transition-colors duration-300">ONGs e Protetores Parceiros</h1>
        <p class="text-gray-500 dark:text-gray-400 text-sm transition-colors duration-300">Conheça as instituições integradas ao ecossistema SafePet.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white dark:bg-gray-800 p-5 rounded-2xl border border-gray-100 dark:border-gray-700 flex gap-4 items-center transition-colors duration-300">
            <div class="bg-emerald-100 dark:bg-emerald-900/40 text-emerald-700 dark:text-emerald-400 p-4 rounded-xl text-2xl transition-colors duration-300">🐾</div>
            <div>
                <h3 class="font-bold text-gray-800 dark:text-gray-100 transition-colors duration-300">Associação Anjos de Quatro Patas</h3>
                <p class="text-xs text-gray-400 dark:text-gray-400">Belo Horizonte - MG</p>
            </div>
        </div>
        
        <div class="bg-white dark:bg-gray-800 p-5 rounded-2xl border border-gray-100 dark:border-gray-700 flex gap-4 items-center transition-colors duration-300">
            <div class="bg-indigo-100 dark:bg-indigo-900/40 text-indigo-700 dark:text-indigo-400 p-4 rounded-xl text-2xl transition-colors duration-300">🐶</div>
            <div>
                <h3 class="font-bold text-gray-800 dark:text-gray-100 transition-colors duration-300">Instituto Patinhas de Luz</h3>
                <p class="text-xs text-gray-400 dark:text-gray-400">Contagem - MG</p>
            </div>
        </div>
    </div>
</div>
@endsection