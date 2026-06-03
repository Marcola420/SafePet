@extends('layouts.app')

@section('conteudo')
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <div class="bg-white p-6 rounded-xl shadow border border-gray-100">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Cadastrar Novo Pet</h2>
        <form action="{{ route('admin.animais.salvar') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Nome do Animal</label>
                <input type="text" name="nome" required class="w-full border rounded p-2 text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Espécie</label>
                <select name="especie" required class="w-full border rounded p-2 text-sm">
                    <option value="Cachorro">Cachorro</option>
                    <option value="Gato">Gato</option>
                </select>
            </div>
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Idade</label>
                    <select name="idade" required class="w-full border rounded p-2 text-sm">
                        <option value="Filhote">Filhote</option>
                        <option value="Adulto">Adulto</option>
                        <option value="Idoso">Idoso</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Porte</label>
                    <select name="porte" required class="w-full border rounded p-2 text-sm">
                        <option value="Pequeno">Pequeno</option>
                        <option value="Médio">Médio</option>
                        <option value="Grande">Grande</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">URL da Foto (Opcional)</label>
                <input type="url" name="foto_url" placeholder="https://..." class="w-full border rounded p-2 text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Histórico / Descrição</label>
                <textarea name="descricao" rows="3" required class="w-full border rounded p-2 text-sm"></textarea>
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded font-medium hover:bg-indigo-700 transition">Salvar no Banco</button>
        </form>
    </div>

    <div class="md:col-span-2 bg-white p-6 rounded-xl shadow border border-gray-100">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Animais no Sistema</h2>
        <div class="space-y-3">
            @foreach($animais as $ani)
                <div class="flex items-center justify-between border-b pb-3 text-sm">
                    <div class="flex items-center space-x-3">
                        <span class="text-2xl">🐾</span>
                        <div>
                            <p class="font-bold text-gray-900">{{ $ani->nome }} ({{ $ani->especie }})</p>
                            <p class="text-xs text-gray-500">Status atual: 
                                <span class="font-semibold uppercase tracking-wider px-1.5 py-0.5 rounded text-[10px] 
                                    {{ $ani->status === 'disponivel' ? 'bg-green-100 text-green-800' : ($ani->status === 'em_triagem' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                                    {{ $ani->status }}
                                </span>
                            </p>
                        </div>
                    </div>
                    <form action="{{ route('admin.animais.deletar', $ani->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Excluir</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection