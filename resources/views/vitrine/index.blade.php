@extends('layouts.app')

@section('conteudo')

    <div class="max-w-6xl mx-auto mt-6 space-y-8">

        {{-- Grid de Cards Principal - Agora com 7 colunas --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-4 px-4">
            
            {{-- Card: Adotar --}}
            <a href="{{ route('vitrine.index') }}" class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 hover:border-pink-300 dark:hover:border-pink-500 hover:shadow-md rounded-2xl p-4 flex flex-col items-center justify-center text-center transition duration-200 group bg-gradient-to-b from-white to-white dark:from-gray-800 dark:to-gray-800 hover:to-pink-50/30 dark:hover:to-pink-950/20">
                <span class="text-4xl group-hover:scale-110 transition duration-200">🐶🐱</span>
                <span class="text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-200 mt-3">Adotar</span>
            </a>

            {{-- Card: Doar --}}
            <a href="{{ route('comunidade.ver', 'doar') }}" class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 hover:border-amber-300 dark:hover:border-amber-500 hover:shadow-md rounded-2xl p-4 flex flex-col items-center justify-center text-center transition duration-200 group bg-gradient-to-b from-white to-white dark:from-gray-800 dark:to-gray-800 hover:to-amber-50/30 dark:hover:to-amber-950/20">
                <span class="text-4xl group-hover:scale-110 transition duration-200">📢</span>
                <span class="text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-200 mt-3">Doar</span>
            </a>

            {{-- Card: Perdi um Pet --}}
            <a href="{{ route('comunidade.ver', 'perdi') }}" class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 hover:border-red-300 dark:hover:border-red-500 hover:shadow-md rounded-2xl p-4 flex flex-col items-center justify-center text-center transition duration-200 group bg-gradient-to-b from-white to-white dark:from-gray-800 dark:to-gray-800 hover:to-red-50/30 dark:hover:to-red-950/20">
                <span class="text-4xl group-hover:scale-110 transition duration-200">🔍🐾</span>
                <span class="text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-200 mt-3">Perdi um Pet</span>
            </a>

            {{-- Card: Encontrei um Pet --}}
            <a href="{{ route('comunidade.ver', 'encontrei') }}" class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 hover:border-blue-300 dark:hover:border-blue-500 hover:shadow-md rounded-2xl p-4 flex flex-col items-center justify-center text-center transition duration-200 group bg-gradient-to-b from-white to-white dark:from-gray-800 dark:to-gray-800 hover:to-blue-50/30 dark:hover:to-blue-950/20">
                <span class="text-4xl group-hover:scale-110 transition duration-200">🧐🧭</span>
                <span class="text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-200 mt-3">Encontrei um Pet</span>
            </a>

            {{-- Card: ONGs --}}
            <a href="{{ route('ongs') }}" class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 hover:border-emerald-300 dark:hover:border-emerald-500 hover:shadow-md rounded-2xl p-4 flex flex-col items-center justify-center text-center transition duration-200 group bg-gradient-to-b from-white to-white dark:from-gray-800 dark:to-gray-800 hover:to-emerald-50/30 dark:hover:to-emerald-950/20">
                <span class="text-4xl group-hover:scale-110 transition duration-200">🏥🏡</span>
                <span class="text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-200 mt-3">ONGs</span>
            </a>

            {{-- NOVO CARD: Termos de Serviço --}}
            <a href="{{ route('termos') }}" class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 hover:border-indigo-300 dark:hover:border-indigo-500 hover:shadow-md rounded-2xl p-4 flex flex-col items-center justify-center text-center transition duration-200 group bg-gradient-to-b from-white to-white dark:from-gray-800 dark:to-gray-800 hover:to-indigo-50/30 dark:hover:to-indigo-950/20">
                <span class="text-4xl group-hover:scale-110 transition duration-200">📜🐕</span>
                <span class="text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-200 mt-3">Termos</span>
            </a>

            {{-- NOVO CARD: Política de Privacidade --}}
            <a href="{{ route('politica') }}" class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 hover:border-purple-300 dark:hover:border-purple-500 hover:shadow-md rounded-2xl p-4 flex flex-col items-center justify-center text-center transition duration-200 group bg-gradient-to-b from-white to-white dark:from-gray-800 dark:to-gray-800 hover:to-purple-50/30 dark:hover:to-purple-950/20">
                <span class="text-4xl group-hover:scale-110 transition duration-200">🔒🐈</span>
                <span class="text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-200 mt-3">Privacidade</span>
            </a>

        </div>

        {{-- Seção de Boas-Vindas --}}
        <div class="text-center space-y-2 mt-8">
            <h1 class="text-3xl font-extrabold text-gray-800 dark:text-white tracking-tight">Encontre seu novo melhor amigo 🐾</h1>
            <p class="text-gray-500 dark:text-gray-400 max-w-md mx-auto text-sm">Todos os pets do SafePet são vermifugados, vacinados e estão à espera de um lar amoroso.</p>
        </div>

        {{-- Formulário de Filtros --}}
        <div class="bg-white dark:bg-gray-800 p-4 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 mx-4 transition-colors duration-300">
            <form action="{{ route('vitrine.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-end">
                
                <div>
                    <label class="block text-xs font-bold text-gray-500 dark:text-gray-400 uppercase mb-1 ml-1">Espécie</label>
                    <select name="especie" class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-xl p-2.5 text-sm font-medium text-gray-700 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500 outline-none transition-colors duration-300">
                        <option value="" class="dark:bg-gray-700">Todos os animais</option>
                        <option value="Cachorro" {{ request('especie') == 'Cachorro' ? 'selected' : '' }} class="dark:bg-gray-700">🐶 Cachorros</option>
                        <option value="Gato" {{ request('especie') == 'Gato' ? 'selected' : '' }} class="dark:bg-gray-700">🐱 Gatos</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-500 dark:text-gray-400 uppercase mb-1 ml-1">Porte</label>
                    <select name="porte" class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-xl p-2.5 text-sm font-medium text-gray-700 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500 outline-none transition-colors duration-300">
                        <option value="" class="dark:bg-gray-700">Todos os tamanhos</option>
                        <option value="Pequeno" {{ request('porte') == 'Pequeno' ? 'selected' : '' }} class="dark:bg-gray-700">Pequeno</option>
                        <option value="Médio" {{ request('porte') == 'Médio' ? 'selected' : '' }} class="dark:bg-gray-700">Médio</option>
                        <option value="Grande" {{ request('porte') == 'Grande' ? 'selected' : '' }} class="dark:bg-gray-700">Grande</option>
                    </select>
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold p-2.5 rounded-xl text-sm shadow-sm transition duration-300">
                        Filtrar Pets
                    </button>
                    @if(request('especie') || request('porte'))
                        <a href="{{ route('vitrine.index') }}" class="bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-600 dark:text-gray-300 font-semibold p-2.5 rounded-xl text-sm transition flex items-center justify-center" title="Limpar Filtros">
                            ✕
                        </a>
                    @endif
                </div>
            </form>
        </div>

        {{-- Listagem da Vitrine de Pets --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mx-4">
            @forelse($animais as $animal)
                <div class="bg-white dark:bg-gray-800 rounded-3xl overflow-hidden shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-md transition duration-300 flex flex-col justify-between group">
                    <div>
                        <div class="overflow-hidden relative h-52 bg-gray-100 dark:bg-gray-900">
                            <img src="{{ $animal->foto_url }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <span class="absolute top-3 right-3 bg-white dark:bg-gray-800 bg-opacity-90 dark:bg-opacity-90 text-gray-800 dark:text-gray-200 text-xs font-bold px-2.5 py-1 rounded-full shadow-sm">
                                {{ $animal->porte }}
                            </span>
                        </div>

                        <div class="p-5 space-y-2">
                            <div class="flex justify-between items-center">
                                <h2 class="text-xl font-bold text-gray-800 dark:text-white">{{ $animal->nome }}</h2>
                                <span class="text-sm font-semibold text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/50 px-2 py-0.5 rounded-md">
                                    {{ $animal->idade }}
                                </span>
                            </div>
                            <p class="text-gray-500 dark:text-gray-400 text-sm line-clamp-2">{{ $animal->descricao }}</p>
                        </div>
                    </div>

                    <div class="p-5 pt-0">
                        <a href="{{ route('vitrine.show', $animal->id) }}" class="block w-full text-center bg-gray-50 dark:bg-gray-700 hover:bg-indigo-600 dark:hover:bg-indigo-500 hover:text-white dark:hover:text-white border border-gray-100 dark:border-gray-600 text-gray-700 dark:text-gray-200 font-bold py-3 rounded-2xl text-sm transition duration-200">
                            Conhecer História ➔
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-gray-50 dark:bg-gray-800/50 text-center p-12 rounded-3xl border border-dashed border-gray-200 dark:border-gray-700 space-y-2 transition-colors duration-300">
                    <span class="text-4xl">😿</span>
                    <h3 class="text-gray-700 dark:text-gray-300 font-bold text-lg">Nenhum pet encontrado</h3>
                    <p class="text-gray-400 dark:text-gray-500 text-sm max-w-xs mx-auto">Não encontramos nenhum animalzinho com essas características exatas no momento.</p>
                </div>
            @endforelse
        </div>

        {{-- Rodapé Minimalista Inferior --}}
        <footer class="mt-16 border-t border-gray-200 dark:border-gray-700 pt-6 pb-6 mx-4 text-center text-xs text-gray-400 dark:text-gray-500 transition-colors duration-300">
            <p>&copy; 2026 SafePet. Todos os direitos reservados.</p>
        </footer>

    </div>
@endsection