@extends('layouts.app')
@section('conteudo')
<div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-md border border-gray-100 mt-12">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Acesse sua Conta</h2>
    
    <form action="{{ route('login') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-700 font-medium mb-1">E-mail</label>
            <input type="email" name="email" required class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-500 outline-none">
            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700 font-medium mb-1">Senha</label>
            <input type="password" name="password" required class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-500 outline-none">
        </div>
        <button type="submit" class="w-full bg-indigo-600 text-white py-2.5 rounded-lg font-semibold hover:bg-indigo-700 transition">Entrar</button>
    </form>
    <p class="text-center text-sm text-gray-600 mt-4">Não possui conta? <a href="{{ route('cadastro') }}" class="text-indigo-600 font-semibold underline">Cadastre-se</a></p>
</div>
@endsection