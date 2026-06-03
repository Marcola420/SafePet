@extends('layouts.app')

@section('conteudo')
<div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-md border border-gray-100 mt-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Crie sua Conta</h2>
    
    <form action="{{ route('cadastro') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-700 font-medium mb-1">Nome Completo</label>
            <input type="text" name="name" required class="w-full border border-gray-300 rounded-lg p-2.5">
        </div>
        <div>
            <label class="block text-gray-700 font-medium mb-1">E-mail</label>
            <input type="email" name="email" required class="w-full border border-gray-300 rounded-lg p-2.5">
            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700 font-medium mb-1">Perfil de Teste (Exclusivo TCC)</label>
            <select name="tipo" class="w-full border border-gray-300 rounded-lg p-2.5 bg-yellow-50 font-medium">
                <option value="candidato">Candidato (Quero Adotar)</option>
                <option value="administrador">Administrador da ONG (Quero Avaliar)</option>
            </select>
        </div>
        <div>
            <label class="block text-gray-700 font-medium mb-1">Senha</label>
            <input type="password" name="password" required class="w-full border border-gray-300 rounded-lg p-2.5">
            @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700 font-medium mb-1">Confirme a Senha</label>
            <input type="password" name="password_confirmation" required class="w-full border border-gray-300 rounded-lg p-2.5">
        </div>
        <button type="submit" class="w-full bg-indigo-600 text-white py-2.5 rounded-lg font-semibold hover:bg-indigo-700 transition">Registrar e Entrar</button>
    </form>
</div>
@endsection