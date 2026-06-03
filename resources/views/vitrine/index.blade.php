@extends('layouts.app')

@section('conteudo')

    <!-- 🔐 CABEÇALHO DE LOGIN/CADASTRO -->
    <div class="max-w-6xl mx-auto px-4 pt-4 flex justify-end items-center gap-4">
        @auth
            <!-- Se estiver logado, mostra o botão do Painel -->
            <a href="{{ Auth::user()->tipo_acesso === 'admin' ? route('admin.triagem') : route('candidato.painel') }}" 
               class="font-semibold text-gray-600 hover:text-indigo-600 transition flex items-center gap-2">
                <span>👤 Meu Painel</span>
            </a>
        @else
            <!-- Se NÃO estiver logado, mostra Entrar e Cadastrar -->
            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-indigo-600 transition">
                Entrar
            </a>
            <a href="{{ route('cadastro') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-xl shadow-sm transition">
                Criar Conta
            </a>
        @endauth
    </div>

    <!-- 🌟 CONTEÚDO PRINCIPAL -->
    <div class="max-w-6xl mx-auto mt-6 space-y-8">

        <!-- 🎛️ HUB DE SERVIÇOS SAFEPET -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4 px-4">
            
            <a href="{{ route('vitrine.index') }}" class="bg-white border border-gray-200 hover:border-pink-300 hover:shadow-md rounded-2xl p-4 flex flex-col items-center justify-center text-center transition duration-200 group bg-gradient-to-b hover:from-white hover:to-pink-50/30">
                <span class="text-4xl group-hover:scale-110 transition duration-200">🐶🐱</span>
                <span class="text-xs font-bold uppercase tracking-wider text-gray-700 mt-3">Adotar</span>
            </a>

            <!-- Novos links dinâmicos da Comunidade -->
            <a href="{{ route('comunidade.ver', 'doar') }}" class="bg-white border border-gray-200 hover:border-amber-300 hover:shadow-md rounded-2xl p-4 flex flex-col items-center justify-center text-center transition duration-200 group bg-gradient-to-b hover:from-white hover:to-amber-50/30">
                <span class="text-4xl group-hover:scale-110 transition duration-200">📢</span>
                <span class="text-xs font-bold uppercase tracking-wider text-gray-700 mt-3">Doar</span>
            </a>

            <a href="{{ route('comunidade.ver', 'perdi') }}" class="bg-white border border-gray-200 hover:border-red-300 hover:shadow-md rounded-2xl p-4 flex flex-col items-center justify-center text-center transition duration-200 group bg-gradient-to-b hover:from-white hover:to-red-50/30">
                <span class="text-4xl group-hover:scale-110 transition duration-200">🔍🐾</span>
                <span class="text-xs font-bold uppercase tracking-wider text-gray-700 mt-3">Perdi um Pet</span>
            </a>

            <a href="{{ route('comunidade.ver', 'encontrei') }}" class="bg-white border border-gray-200 hover:border-blue-300 hover:shadow-md rounded-2xl p-4 flex flex-col items-center justify-center text-center transition duration-200 group bg-gradient-to-b hover:from-white hover:to-blue-50/30">
                <span class="text-4xl group-hover:scale-110 transition duration-200">🧐🧭</span>
                <span class="text-xs font-bold uppercase tracking-wider text-gray-700 mt-3">Encontrei um Pet</span>
            </a>

            <a href="{{ route('ongs') }}" class="bg-white border border-gray-200 hover:border-emerald-300 hover:shadow-md rounded-2xl p-4 flex flex-col items-center justify-center text-center transition duration-200 group col-span-2 sm:col-span-1 bg-gradient-to-b hover:from-white hover:to-emerald-50/30">
                <span class="text-4xl group-hover:scale-110 transition duration-200">🏥🏡</span>
                <span class="text-xs font-bold uppercase tracking-wider text-gray-700 mt-3">ONGs</span>
            </a>

        </div>

        <!-- 🏠 CABEÇALHO DA VITRINE -->
        <div class="text-center space-y-2 mt-8">
            <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">Encontre seu novo melhor amigo 🐾</h1>
            <p class="text-gray-500 max-w-md mx-auto text-sm">Todos os pets do SafePet são vermifugados, vacinados e estão à espera de um lar amoroso.</p>
        </div>

        <!-- 🔍 BARRA DE FILTROS INTELIGENTES -->
        <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 mx-4">
            <form action="{{ route('vitrine.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-end">
                
                <!-- Filtro por Espécie -->
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-1 ml-1">Espécie</label>
                    <select name="especie" class="w-full bg-gray-50 border border-gray-200 rounded-xl p-2.5 text-sm font-medium text-gray-700 focus:ring-2 focus:ring-indigo-500 outline-none">
                        <option value="">Todos os animais</option>
                        <option value="Cachorro" {{ request('especie') == 'Cachorro' ? 'selected' : '' }}>🐶 Cachorros</option>
                        <option value="Gato" {{ request('especie') == 'Gato' ? 'selected' : '' }}>🐱 Gatos</option>
                    </select>
                </div>

                <!-- Filtro por Porte -->
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-1 ml-1">Porte</label>
                    <select name="porte" class="w-full bg-gray-50 border border-gray-200 rounded-xl p-2.5 text-sm font-medium text-gray-700 focus:ring-2 focus:ring-indigo-500 outline-none">
                        <option value="">Todos os tamanhos</option>
                        <option value="Pequeno" {{ request('porte') == 'Pequeno' ? 'selected' : '' }}>Pequeno</option>
                        <option value="Médio" {{ request('porte') == 'Médio' ? 'selected' : '' }}>Médio</option>
                        <option value="Grande" {{ request('porte') == 'Grande' ? 'selected' : '' }}>Grande</option>
                    </select>
                </div>

                <!-- Botões de Ação -->
                <div class="flex gap-2">
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold p-2.5 rounded-xl text-sm shadow-sm transition">
                        Filtrar Pets
                    </button>
                    @if(request('especie') || request('porte'))
                        <a href="{{ route('vitrine.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold p-2.5 rounded-xl text-sm transition flex items-center justify-center" title="Limpar Filtros">
                            ✕
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- 🐕 GRID DE ANIMAIS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mx-4">
            @forelse($animais as $animal)
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition duration-300 flex flex-col justify-between group">
                    <div>
                        <!-- Foto -->
                        <div class="overflow-hidden relative h-52 bg-gray-100">
                            <img src="{{ $animal->foto_url }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <span class="absolute top-3 right-3 bg-white bg-opacity-90 text-gray-800 text-xs font-bold px-2.5 py-1 rounded-full shadow-sm">
                                {{ $animal->porte }}
                            </span>
                        </div>

                        <!-- Informações -->
                        <div class="p-5 space-y-2">
                            <div class="flex justify-between items-center">
                                <h2 class="text-xl font-bold text-gray-800">{{ $animal->nome }}</h2>
                                <span class="text-sm font-semibold text-indigo-500 bg-indigo-50 px-2 py-0.5 rounded-md">
                                    {{ $animal->idade }}
                                </span>
                            </div>
                            <p class="text-gray-500 text-sm line-clamp-2">{{ $animal->descricao }}</p>
                        </div>
                    </div>

                    <!-- Botão -->
                    <div class="p-5 pt-0">
                        <a href="{{ route('vitrine.show', $animal->id) }}" class="block w-full text-center bg-gray-50 hover:bg-indigo-600 hover:text-white border border-gray-100 text-gray-700 font-bold py-3 rounded-2xl text-sm transition duration-200">
                            Conhecer História ➔
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-gray-50 text-center p-12 rounded-3xl border border-dashed border-gray-200 space-y-2">
                    <span class="text-4xl">😿</span>
                    <h3 class="text-gray-700 font-bold text-lg">Nenhum pet encontrado</h3>
                    <p class="text-gray-400 text-sm max-w-xs mx-auto">Não encontramos nenhum animalzinho com essas características exatas no momento.</p>
                </div>
            @endforelse
        </div>

    </div>
@endsection