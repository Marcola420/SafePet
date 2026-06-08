@extends('layouts.app')

@section('conteudo')
{{-- Card Principal - Agora responsivo para os dois modos --}}
<div class="max-w-md mx-auto bg-white dark:bg-gray-800 p-8 rounded-xl shadow-md border border-gray-100 dark:border-gray-700 mt-6 transition-colors duration-300">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6 text-center">Crie sua Conta</h2>
    
    <form action="{{ route('cadastro') }}" method="POST" class="space-y-4">
        @csrf
        
        {{-- Campo: Nome --}}
        <div>
            <label class="block text-gray-700 dark:text-gray-300 font-medium mb-1 text-sm">Nome Completo</label>
            <input type="text" name="name" required 
                   class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg p-2.5 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-colors duration-300">
        </div>

        {{-- Campo: E-mail --}}
        <div>
            <label class="block text-gray-700 dark:text-gray-300 font-medium mb-1 text-sm">E-mail</label>
            <input type="email" name="email" required 
                   class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg p-2.5 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-colors duration-300">
            @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
        </div>

        {{-- Campo: Perfil de Teste (Destaque sutil mantido em ambos os modos) --}}
        <div>
            <label class="block text-gray-700 dark:text-gray-300 font-medium mb-1 text-sm">Perfil de Teste</label>
            <select name="tipo" 
                    class="w-full border border-gray-300 dark:border-gray-600 rounded-lg p-2.5 bg-yellow-50 dark:bg-yellow-950/30 text-gray-800 dark:text-yellow-200 font-medium focus:ring-2 focus:ring-indigo-500 outline-none transition-colors duration-300">
                <option value="candidato" class="dark:bg-gray-800 dark:text-gray-100">Candidato (Quero Adotar)</option>
                <option value="administrador" class="dark:bg-gray-800 dark:text-gray-100">Administrador da ONG (Quero Avaliar)</option>
            </select>
        </div>

        {{-- Campo: Senha --}}
        <div>
            <label class="block text-gray-700 dark:text-gray-300 font-medium mb-1 text-sm">Senha</label>
            <input type="password" name="password" required 
                   class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg p-2.5 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-colors duration-300">
            @error('password') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
        </div>

        {{-- Campo: Confirme a Senha --}}
        <div>
            <label class="block text-gray-700 dark:text-gray-300 font-medium mb-1 text-sm">Confirme a Senha</label>
            <input type="password" name="password_confirmation" required 
                   class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg p-2.5 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-colors duration-300">
        </div>

        {{-- Botão de Envio --}}
        <button type="submit" 
                class="w-full bg-indigo-600 text-white py-2.5 rounded-lg font-semibold hover:bg-indigo-700 shadow-sm hover:shadow transition duration-200 mt-2">
            Registrar e Entrar
        </button>
    </form>
</div>
@endsection