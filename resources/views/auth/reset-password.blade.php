@extends('layouts.app')

@section('conteudo')
<div class="max-w-md mx-auto bg-white dark:bg-gray-800 p-8 rounded-xl shadow-md border border-gray-200 dark:border-gray-700">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6 text-center">Definir Nova Senha</h2>

    <form action="{{ route('password.update') }}" method="POST" class="space-y-4">
        @csrf
        
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ request()->email }}">

        <div>
            <label class="block text-gray-700 dark:text-gray-300 font-medium mb-1">Nova Senha</label>
            <input type="password" name="password" required class="w-full border border-gray-300 dark:border-gray-600 rounded-lg p-2 bg-transparent text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            @error('password')
                <span class="text-red-500 dark:text-red-400 text-xs mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-gray-700 dark:text-gray-300 font-medium mb-1">Confirme a Nova Senha</label>
            <input type="password" name="password_confirmation" required class="w-full border border-gray-300 dark:border-gray-600 rounded-lg p-2 bg-transparent text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <button type="submit" class="w-full bg-indigo-600 text-white py-2.5 rounded-lg font-semibold hover:bg-indigo-700 transition duration-200">
            Atualizar Senha
        </button>
    </form>
</div>
@endsection