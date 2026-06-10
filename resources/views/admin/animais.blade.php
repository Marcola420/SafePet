@extends('layouts.app')

@section('conteudo')
<div class="grid grid-cols-1 md:grid-cols-3 gap-8 px-4">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow border border-gray-100 dark:border-gray-700 transition-colors duration-300">
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4">Cadastrar Novo Pet</h2>
        
        <form action="{{ route('admin.animais.salvar') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
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
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Foto do Pet</label>
                <label class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl cursor-pointer bg-gray-50 dark:bg-gray-900/30 hover:bg-gray-100 dark:hover:bg-gray-900/60 hover:border-indigo-500 dark:hover:border-indigo-400 transition-all duration-300 group">
                    <div class="flex flex-col items-center justify-center pt-4 pb-5 text-center px-2">
                        <span class="text-2xl mb-1 group-hover:scale-110 transition-transform duration-300">📸</span>
                        <p class="mb-1 text-sm text-gray-500 dark:text-gray-300 font-semibold" id="texto-upload">Selecionar foto</p>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Clique para escolher (Max: 2MB)</p>
                    </div>
                    <input type="file" name="foto_url" id="input-foto" accept="image/*" class="sr-only" onchange="atualizarNomeArquivo(this, 'texto-upload')">
                </label>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Histórico / Descrição</label>
                <textarea name="descricao" rows="3" required class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded p-2 text-sm text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-colors duration-300"></textarea>
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded font-medium hover:bg-indigo-700 transition shadow-sm">Salvar no Banco</button>
        </form>
    </div>

    <div class="md:col-span-2 bg-white dark:bg-gray-800 p-6 rounded-xl shadow border border-gray-100 dark:border-gray-700 transition-colors duration-300">
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4">Animais no Sistema</h2>
        <div class="space-y-3">
            @foreach($animais as $ani)
                <div class="flex items-center justify-between border-b border-gray-100 dark:border-gray-700 pb-3 text-sm transition-colors duration-300">
                    <div class="flex items-center space-x-3">
                        @if($ani->foto_url && (Str::startsWith($ani->foto_url, 'http://') || Str::startsWith($ani->foto_url, 'https://')))
                            <img src="{{ $ani->foto_url }}" class="w-10 h-10 object-cover rounded-full shadow-inner">
                        @elseif($ani->foto_url)
                            <img src="{{ asset('storage/' . $ani->foto_url) }}" class="w-10 h-10 object-cover rounded-full shadow-inner">
                        @else
                            <span class="text-2xl w-10 h-10 flex items-center justify-center bg-gray-100 dark:bg-gray-700 rounded-full">🐾</span>
                        @endif

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
                    
                    {{-- BOTÕES DE AÇÃO: Editar e Excluir lado a lado --}}
                    <div class="flex items-center space-x-3">
                        <button type="button" 
                                onclick="abrirModalEditar({{ json_encode($ani) }})" 
                                class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-medium transition-colors">
                            Editar
                        </button>

                        <form action="{{ route('admin.animais.deletar', $ani->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este pet?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 font-medium transition-colors">Excluir</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div id="modalEditar" class="fixed inset-0 z-50 hidden bg-gray-900/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white dark:bg-gray-800 w-full max-w-md rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 p-6 relative overflow-y-auto max-h-[90vh]">
        <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4">Editar Informações do Pet</h3>
        
        <form id="formEditar" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nome do Animal</label>
                <input type="text" id="edit_nome" name="nome" required class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded p-2 text-sm text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Espécie</label>
                <select id="edit_especie" name="especie" required class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded p-2 text-sm text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="Cachorro">Cachorro</option>
                    <option value="Gato">Gato</option>
                </select>
            </div>
            
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Idade</label>
                    <select id="edit_idade" name="idade" required class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded p-2 text-sm text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="Filhote">Filhote</option>
                        <option value="Adulto">Adulto</option>
                        <option value="Idoso">Idoso</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Porte</label>
                    <select id="edit_porte" name="porte" required class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded p-2 text-sm text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="Pequeno">Pequeno</option>
                        <option value="Médio">Médio</option>
                        <option value="Grande">Grande</option>
                    </select>
                </div>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Substituir Foto (Opcional)</label>
                <label class="relative flex flex-col items-center justify-center w-full h-24 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl cursor-pointer bg-gray-50 dark:bg-gray-900/30 hover:bg-gray-100 dark:hover:bg-gray-900/60 hover:border-indigo-500 dark:hover:border-indigo-400 transition-all duration-300 group">
                    <div class="flex flex-col items-center justify-center pt-2 pb-2 text-center px-2">
                        <p class="text-sm text-gray-500 dark:text-gray-300 font-semibold" id="texto-upload-edit">Alterar imagem</p>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Deixe em branco para manter a atual</p>
                    </div>
                    <input type="file" name="foto_url" id="input-foto-edit" accept="image/*" class="sr-only" onchange="atualizarNomeArquivo(this, 'texto-upload-edit')">
                </label>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Histórico / Descrição</label>
                <textarea id="edit_descricao" name="descricao" rows="3" required class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded p-2 text-sm text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
            </div>
            
            <div class="flex justify-end space-x-2 pt-2">
                <button type="button" onclick="fecharModalEditar()" class="px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition shadow-sm">Salvar Alterações</button>
            </div>
        </form>
    </div>
</div>

{{-- SCRIPTS DE INTERAÇÃO DO FORMULÁRIO E MODAL --}}
<script>
    function atualizarNomeArquivo(input, idTexto) {
        const textoUpload = document.getElementById(idTexto);
        if (input.files && input.files.length > 0) {
            textoUpload.textContent = "📁 " + input.files[0].name;
            textoUpload.classList.add('text-indigo-600', 'dark:text-indigo-400');
        } else {
            textoUpload.textContent = idTexto === 'texto-upload' ? "Selecionar foto" : "Alterar imagem";
            textoUpload.classList.remove('text-indigo-600', 'dark:text-indigo-400');
        }
    }

    function abrirModalEditar(animal) {
        const form = document.getElementById('formEditar');
        form.action = `/admin/animais/atualizar/${animal.id}`;
        
        document.getElementById('edit_nome').value = animal.nome;
        document.getElementById('edit_especie').value = animal.especie;
        document.getElementById('edit_idade').value = animal.idade;
        document.getElementById('edit_porte').value = animal.porte;
        document.getElementById('edit_descricao').value = animal.descricao;
        
        document.getElementById('texto-upload-edit').textContent = "Alterar imagem";
        document.getElementById('texto-upload-edit').classList.remove('text-indigo-600', 'dark:text-indigo-400');
        document.getElementById('input-foto-edit').value = '';

        document.getElementById('modalEditar').classList.remove('hidden');
    }

    function fecharModalEditar() {
        document.getElementById('modalEditar').classList.add('hidden');
    }
</script>
@endsection