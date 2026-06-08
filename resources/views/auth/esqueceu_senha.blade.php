@extends('layouts.app')

@section('conteudo')
<div class="max-w-md mx-auto bg-white dark:bg-gray-800 p-8 rounded-xl shadow-md border border-gray-200 dark:border-gray-700">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6 text-center">Recuperar Senha</h2>

    @if (session('status'))
        <div class="mb-4 text-sm font-medium text-green-600 dark:text-green-400 text-center">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('password.email') }}" method="POST" class="space-y-4">
        @csrf
        
        <div>
            <label class="block text-gray-700 dark:text-gray-300 font-medium mb-1">E-mail Cadastrado</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="w-full border border-gray-300 dark:border-gray-600 rounded-lg p-2 bg-transparent text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            
            @error('email')
                <span class="text-red-500 dark:text-red-400 text-xs mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="w-full bg-indigo-600 text-white py-2.5 rounded-lg font-semibold hover:bg-indigo-700 transition duration-200">
            Enviar Link de Recuperação
        </button>
    </form>
</div>
@endsection