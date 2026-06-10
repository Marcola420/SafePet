@extends('layouts.app')

@section('conteudo')
<div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md overflow-hidden border border-gray-100 dark:border-gray-700 max-w-4xl mx-auto mt-6 transition-colors duration-300">
    <div class="md:flex">
        <div class="md:w-1/2">
            
            {{-- ALTERAÇÃO REALIZADA: Lógica dinâmica para carregar a imagem na tela de detalhes --}}
            @if($animal->foto_url && (Str::startsWith($animal->foto_url, 'http://') || Str::startsWith($animal->foto_url, 'https://')))
                <img class="h-full w-full object-cover min-h-[350px]" src="{{ $animal->foto_url }}" alt="{{ $animal->nome }}">
            @elseif($animal->foto_url)
                <img class="h-full w-full object-cover min-h-[350px]" src="{{ asset('storage/' . $animal->foto_url) }}" alt="{{ $animal->nome }}">
            @else
                <div class="h-full w-full min-h-[350px] bg-gray-100 dark:bg-gray-900 flex items-center justify-center text-5xl">🐾</div>
            @endif

        </div>
        
        <div class="p-8 md:w-1/2 flex flex-col justify-between">
            <div>
                <span class="text-xs font-bold uppercase tracking-wide inline-block px-3 py-1 bg-indigo-100 dark:bg-indigo-950/60 text-indigo-800 dark:text-indigo-300 rounded-full mb-4">{{ $animal->especie }}</span>
                
                <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">{{ $animal->nome }}</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Porte: <strong class="text-gray-700 dark:text-gray-200">{{ $animal->porte }}</strong> | Idade: <strong class="text-gray-700 dark:text-gray-200">{{ $animal->idade }}</strong></p>
                
                <hr class="my-4 dark:border-gray-700">
                
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{{ $animal->descricao }}</p>
            </div>
            
            <div class="mt-8">
                @auth
                    @if(Auth::user()->eCandidato())
                        <a href="{{ route('adocao.formulario', $animal->id) }}" class="block text-center bg-indigo-600 text-white font-bold py-3 px-4 rounded-xl hover:bg-indigo-700 shadow-md transition">Quero Adotar o {{ $animal->nome }}</a>
                    @else
                        <div class="p-3 bg-yellow-50 dark:bg-yellow-950/30 border border-yellow-200 dark:border-yellow-900/50 text-yellow-800 dark:text-yellow-300 text-sm rounded-lg text-center font-medium transition-colors duration-300">
                            Administradores visualizam este perfil em modo de leitura.
                        </div>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="block text-center bg-red-500 text-white font-bold py-3 px-4 rounded-xl hover:bg-red-600 shadow-md transition">Faça login para manifestar interesse na adoção</a>
                    <p class="text-xs text-gray-400 dark:text-gray-500 text-center mt-2">🔒 Restrito a usuários cadastrados por questões de segurança socioambiental.</p>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection