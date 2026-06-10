@extends('layouts.app')

@section('conteudo')
<div class="max-w-5xl mx-auto mt-6 space-y-8 px-4">
    
    <a href="{{ route('vitrine.index') }}" class="text-sm font-semibold text-indigo-600 dark:text-indigo-400 hover:underline transition-colors duration-300">← Voltar para a Home</a>

    <div class="text-center space-y-2 transition-colors duration-300">
        <span class="text-5xl">
            @if($tipo == 'doar') 📢 @elseif($tipo == 'perdi') 🚨 @else 🧭 @endif
        </span>
        <h1 class="text-3xl font-extrabold text-gray-800 dark:text-gray-100 tracking-tight">
            @if($tipo == 'doar') Painel de Doações da Comunidade @elseif($tipo == 'perdi') Mural de Pets Perdidos @else Mural de Pets Encontrados @endif
        </h1>
        <p class="text-gray-500 dark:text-gray-400 max-w-md mx-auto text-sm">
            @if($tipo == 'doar') Espaço para usuários anunciarem pets de forma direta. @else Espaço colaborativo para ajudar animais a voltarem para casa. @endif
        </p>
    </div>

    @if(session('sucesso'))
        <div class="bg-green-100 dark:bg-green-900/50 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-200 px-4 py-3 rounded-xl max-w-2xl mx-auto transition-colors duration-300">
            {{ session('sucesso') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">
        
        <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 space-y-4 transition-colors duration-300">
            <h2 class="text-lg font-bold text-gray-800 dark:text-gray-100">Criar Novo Anúncio</h2>
            
            @auth
                <form action="{{ route('comunidade.salvar', $tipo) }}" method="POST" enctype="multipart/form-data" class="space-y-3 text-sm">
                    @csrf
                    <div>
                        <label class="block text-gray-600 dark:text-gray-300 font-medium mb-1">Nome do Pet (opcional)</label>
                        <input type="text" name="nome_pet" class="w-full border border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-xl p-2.5 outline-none focus:ring-2 focus:ring-indigo-500 transition-colors duration-300">
                    </div>

                    <div>
                        <label class="block text-gray-600 dark:text-gray-300 font-medium mb-1">Espécie</label>
                        <select name="especie" class="w-full border border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-xl p-2.5 outline-none focus:ring-2 focus:ring-indigo-500 transition-colors duration-300">
                            <option value="Cachorro">🐶 Cachorro</option>
                            <option value="Gato">🐱 Gato</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-600 dark:text-gray-300 font-medium mb-1">Cidade / Região</label>
                        <input type="text" name="cidade" required class="w-full border border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-xl p-2.5 outline-none focus:ring-2 focus:ring-indigo-500 transition-colors duration-300" placeholder="Ex: Belo Horizonte - MG">
                    </div>

                    <div>
                        <label class="block text-gray-600 dark:text-gray-300 font-medium mb-1">Contato (WhatsApp/Telefone)</label>
                        <input type="text" name="contato" required class="w-full border border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-xl p-2.5 outline-none focus:ring-2 focus:ring-indigo-500 transition-colors duration-300" placeholder="(31) 99999-9999">
                    </div>

                    <div>
                        <label class="block text-gray-600 dark:text-gray-300 font-medium mb-1">Foto do Pet</label>
                        
                        {{-- ALTERAÇÃO: Criamos uma BOX customizada e interativa para o upload da foto --}}
                        <label class="relative flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl cursor-pointer bg-gray-50 dark:bg-gray-700/50 hover:bg-gray-100 dark:hover:bg-gray-700 hover:border-indigo-500 dark:hover:border-indigo-400 transition-all duration-300 group">
                            
                            <div class="flex flex-col items-center justify-center pt-5 pb-6 text-center px-2">
                                <span class="text-2xl mb-1 group-hover:scale-110 transition-transform duration-300">📸</span>
                                <p class="mb-1 text-sm text-gray-500 dark:text-gray-300 font-semibold" id="texto-upload">
                                    Selecionar foto
                                </p>
                                <p class="text-xs text-gray-400 dark:text-gray-400">
                                    Clique para escolher do dispositivo (Max: 2MB)
                                </p>
                            </div>

                            {{-- O input original fica invisível (sr-only), mas funciona quando clicam na Box acima --}}
                            <input type="file" name="foto_url" id="input-foto" accept="image/*" class="sr-only" onchange="atualizarNomeArquivo(this)">
                        </label>
                    </div>

                    <div>
                        <label class="block text-gray-600 dark:text-gray-300 font-medium mb-1">Descrição / Detalhes</label>
                        <textarea name="descricao" rows="3" required class="w-full border border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-xl p-2.5 outline-none focus:ring-2 focus:ring-indigo-500 transition-colors duration-300" placeholder="Características, onde sumiu/foi visto..."></textarea>
                    </div>

                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2.5 rounded-xl transition shadow-sm">
                        Publicar Anúncio
                    </button>
                </form>
            @else
                <div class="bg-gray-50 dark:bg-gray-800/50 border border-gray-100 dark:border-gray-700 p-4 rounded-xl text-center text-sm text-gray-500 dark:text-gray-400 transition-colors duration-300">
                    🔒 Você precisa estar <a href="{{ route('login') }}" class="text-indigo-600 dark:text-indigo-400 font-bold hover:underline">logado</a> para publicar um anúncio aqui.
                </div>
            @endauth
        </div>

        <div class="md:col-span-2 space-y-4">
            <h2 class="text-lg font-bold text-gray-800 dark:text-gray-100 transition-colors duration-300">Anúncios Recentes</h2>
            
            @forelse($anuncios as $a)
                <div class="bg-white dark:bg-gray-800 p-5 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm flex flex-col sm:flex-row gap-4 items-center transition-colors duration-300">
                    
                    @if($a->foto_url && (Str::startsWith($a->foto_url, 'http://') || Str::startsWith($a->foto_url, 'https://')))
                        <img src="{{ $a->foto_url }}" class="w-24 h-24 object-cover rounded-xl shadow-inner flex-shrink-0">
                    @elseif($a->foto_url)
                        <img src="{{ asset('storage/' . $a->foto_url) }}" class="w-24 h-24 object-cover rounded-xl shadow-inner flex-shrink-0">
                    @else
                        <div class="w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-xl flex items-center justify-center text-2xl flex-shrink-0">🐾</div>
                    @endif

                    <div class="space-y-1 w-full">
                        <div class="flex justify-between items-start">
                            <h3 class="font-bold text-gray-800 dark:text-gray-100 text-lg">
                                {{ $a->nome_pet ?? 'Pet Sem Nome' }} 
                                <span class="text-xs font-normal text-gray-400 dark:text-gray-400">({{ $a->especie }})</span>
                            </h3>
                            <span class="text-xs bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 font-semibold px-2 py-1 rounded-md">📍 {{ $a->cidade }}</span>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300 text-sm italic">"{{ $a->descricao }}"</p>
                        <div class="pt-2 mt-2 flex justify-between items-center border-t border-gray-50 dark:border-gray-700 text-xs">
                            <span class="text-gray-400 dark:text-gray-500">Por: <strong class="dark:text-gray-300">{{ $a->usuario->name }}</strong></span>
                            <span class="text-indigo-600 dark:text-indigo-300 font-bold bg-indigo-50 dark:bg-indigo-900/50 px-2.5 py-1 rounded-lg">📞 Contato: {{ $a->contato }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-gray-50 dark:bg-gray-800/50 text-center p-12 rounded-2xl border border-dashed border-gray-200 dark:border-gray-700 text-gray-400 dark:text-gray-500 text-sm transition-colors duration-300">
                    Nenhum anúncio nesta categoria por enquanto. Seja o primeiro!
                </div>
            @endforelse
        </div>

    </div>

</div>

{{-- SCRIPT ADICIONADO: Esse pequeno código Javascript serve para trocar o texto "Selecionar foto" pelo nome real do arquivo que o usuário escolheu, dando um feedback bem legal! --}}
<script>
    function atualizarNomeArquivo(input) {
        const textoUpload = document.getElementById('texto-upload');
        if (input.files && input.files.length > 0) {
            textoUpload.textContent = "📁 " + input.files[0].name;
            textoUpload.classList.add('text-indigo-600', 'dark:text-indigo-400');
        } else {
            textoUpload.textContent = "Selecionar foto";
            textoUpload.classList.remove('text-indigo-600', 'dark:text-indigo-400');
        }
    }
</script>
@endsection