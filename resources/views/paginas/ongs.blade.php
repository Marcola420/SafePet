@extends('layouts.app')
@section('conteudo')
<div class="max-w-4xl mx-auto mt-10 space-y-6">
    <div class="text-center">
        <span class="text-5xl">🏥</span>
        <h1 class="text-2xl font-bold text-gray-800 mt-2">ONGs e Protetores Parceiros</h1>
        <p class="text-gray-500 text-sm">Conheça as instituições integradas ao ecossistema SafePet.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white p-5 rounded-2xl border border-gray-100 flex gap-4 items-center">
            <div class="bg-emerald-100 text-emerald-700 p-4 rounded-xl text-2xl">🐾</div>
            <div>
                <h3 class="font-bold text-gray-800">Associação Anjos de Quatro Patas</h3>
                <p class="text-xs text-gray-400">Belo Horizonte - MG</p>
            </div>
        </div>
        <div class="bg-white p-5 rounded-2xl border border-gray-100 flex gap-4 items-center">
            <div class="bg-indigo-100 text-indigo-700 p-4 rounded-xl text-2xl">🐶</div>
            <div>
                <h3 class="font-bold text-gray-800">Instituto Patinhas de Luz</h3>
                <p class="text-xs text-gray-400">Contagem - MG</p>
            </div>
        </div>
    </div>
</div>
@endsection