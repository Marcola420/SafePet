@extends('layouts.app')

@section('conteudo')
<div class="max-w-5xl mx-auto mt-6 space-y-8 px-4">
    
    <!-- 🏠 VOLTAR -->
    <a href="{{ route('vitrine.index') }}" class="text-sm font-semibold text-indigo-600 hover:underline">← Voltar para a Home</a>

    <!-- 🏷️ CABEÇALHO DINÂMICO -->
    <div class="text-center space-y-2">
        <span class="text-5xl">
            @if($tipo == 'doar') 📢 @elseif($tipo == 'perdi') 🚨 @else 🧭 @endif
        </span>
        <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">
            @if($tipo == 'doar') Painel de Doações da Comunidade @elseif($tipo == 'perdi') Mural de Pets Perdidos @else Mural de Pets Encontrados @endif
        </h1>
        <p class="text-gray-500 max-w-md mx-auto text-sm">
            @if($tipo == 'doar') Espaço para usuários anunciarem pets de forma direta. @else Espaço colaborativo para ajudar animais a voltarem para casa. @endif
        </p>
    </div>

    @if(session('sucesso'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl max-w-2xl mx-auto">
            {{ session('sucesso') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">
        
        <!-- 📝 FORMULÁRIO DE CADASTRO (Apenas para logados) -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 space-y-4">
            <h2 class="text-lg font-bold text-gray-800">Criar Novo Anúncio</h2>
            
            @auth
                <form action="{{ route('comunidade.salvar', $tipo) }}" method="POST" class="space-y-3 text-sm">
                    @csrf
                    <div>
                        <label class="block text-gray-600 font-medium mb-1">Nome do Pet (opcional)</label>
                        <input type="text" name="nome_pet" class="w-full border border-gray-200 rounded-xl p-2.5 outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label class="block text-gray-600 font-medium mb-1">Espécie</label>
                        <select name="especie" class="w-full border border-gray-200 rounded-xl p-2.5 outline-none focus:ring-2 focus:ring-indigo-500" Rajput>
                            <option value="Cachorro">🐶 Cachorro</option>
                            <option value="Gato">🐱 Gato</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-600 font-medium mb-1">Cidade / Região</label>
                        <input type="text" name="cidade" required class="w-full border border-gray-200 rounded-xl p-2.5 outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Ex: Belo Horizonte - MG">
                    </div>

                    <div>
                        <label class="block text-gray-600 font-medium mb-1">Contato (WhatsApp/Telefone)</label>
                        <input type="text" name="contato" required class="w-full border border-gray-200 rounded-xl p-2.5 outline-none focus:ring-2 focus:ring-indigo-500" placeholder="(31) 99999-9999">
                    </div>

                    <div>
                        <label class="block text-gray-600 font-medium mb-1">Link da Foto (URL)</label>
                        <input type="url" name="foto_url" class="w-full border border-gray-200 rounded-xl p-2.5 outline-none focus:ring-2 focus:ring-indigo-500" placeholder="https://...">
                    </div>

                    <div>
                        <label class="block text-gray-600 font-medium mb-1">Descrição / Detalhes</label>
                        <textarea name="descricao" rows="3" required class="w-full border border-gray-200 rounded-xl p-2.5 outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Características, onde sumiu/foi visto..."></textarea>
                    </div>

                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2.5 rounded-xl transition shadow-sm">
                        Publicar Anúncio
                    </button>
                </form>
            @else
                <div class="bg-gray-50 border border-gray-100 p-4 rounded-xl text-center text-sm text-gray-500">
                    🔒 Você precisa estar <a href="{{ route('login') }}" class="text-indigo-600 font-bold hover:underline">logado</a> para publicar um anúncio aqui.
                </div>
            @endauth
        </div>

        <!-- 📇 FEED DE ANÚNCIOS DA COMUNIDADE -->
        <div class="md:col-span-2 space-y-4">
            <h2 class="text-lg font-bold text-gray-800">Anúncios Recentes</h2>
            
            @forelse($anuncios as $a)
                <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm flex flex-col sm:flex-row gap-4 items-center">
                    <img src="{{ $a->foto_url }}" class="w-24 h-24 object-cover rounded-xl shadow-inner flex-shrink-0">
                    <div class="space-y-1 w-full">
                        <div class="flex justify-between items-start">
                            <h3 class="font-bold text-gray-800 text-lg">
                                {{ $a->nome_pet ?? 'Pet Sem Nome' }} 
                                <span class="text-xs font-normal text-gray-400">({{ $a->especie }})</span>
                            </h3>
                            <span class="text-xs bg-gray-100 text-gray-600 font-semibold px-2 py-1 rounded-md">📍 {{ $a->cidade }}</span>
                        </div>
                        <p class="text-gray-600 text-sm italic">"{{ $a->descricao }}"</p>
                        <div class="pt-2 flex justify-between items-center border-t border-gray-50 text-xs">
                            <span class="text-gray-400">Por: <strong>{{ $a->usuario->name }}</strong></span>
                            <span class="text-indigo-600 font-bold bg-indigo-50 px-2.5 py-1 rounded-lg">📞 Contato: {{ $a->contato }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-gray-50 text-center p-12 rounded-2xl border border-dashed border-gray-200 text-gray-400 text-sm">
                    Nenhum anúncio nesta categoria por enquanto. Seja o primeiro!
                </div>
            @endforelse
        </div>

    </div>

</div>
@endsection