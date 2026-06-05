@extends('layouts.app')
@section('conteudo')
<div class="max-w-md mx-auto bg-white dark:bg-gray-800 p-8 rounded-xl shadow-md border border-gray-100 dark:border-gray-700 mt-12 transition-colors duration-300">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6 text-center">Acesse sua Conta</h2>
    
    <form action="{{ route('login') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-700 dark:text-gray-300 font-medium mb-1">E-mail</label>
            <input type="email" name="email" required class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg p-2.5 text-gray-900 dark:!text-white focus:ring-2 focus:ring-indigo-500 outline-none transition duration-300">
            @error('email') <span class="text-red-500 dark:text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700 dark:text-gray-300 font-medium mb-1">Senha</label>
            <input type="password" name="password" required class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg p-2.5 text-gray-900 dark:!text-white focus:ring-2 focus:ring-indigo-500 outline-none transition duration-300">
        </div>
        <button type="submit" class="w-full bg-indigo-600 text-white py-2.5 rounded-lg font-semibold hover:bg-indigo-700 transition shadow-sm">Entrar</button>
    </form>
    
    <p class="text-center text-sm text-gray-600 dark:text-gray-400 mt-4 transition-colors duration-300">
        Não possui conta? <a href="{{ route('cadastro') }}" class="text-indigo-600 dark:text-indigo-400 font-semibold underline hover:text-indigo-500">Cadastre-se</a>
    </p>
</div>
@endsection