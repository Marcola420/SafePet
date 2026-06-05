@extends('layouts.app')

@section('conteudo')
<section class="bg-white dark:bg-gray-800 py-16 px-4 sm:px-6 lg:px-8 rounded-2xl shadow-sm transition-colors duration-300">
    <div class="max-w-6xl mx-auto">
        
        <div class="text-center mb-12">
            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl">
                Sobre Nós 🐾
            </h2>
            <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500 dark:text-gray-400">
                Conheça a história do SafePet e o nosso propósito de transformar vidas através da adoção responsável.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
            <div>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                    Quem Somos?
                </h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-4">
                    O <strong>SafePet</strong> nasceu do amor pelos animais e da urgência em dar uma segunda chance para pets abandonados e resgatados. Nossa plataforma funciona como uma ponte digital entre abrigos, protetores independentes e famílias que estão prontas para abrir o coração e o lar.
                </p>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    Acreditamos que todo animal merece um final feliz, com petiscos, carinho e uma caminha quentinha. Aqui, facilitamos o processo para que ele aconteça de forma segura e responsável.
                </p>
            </div>
            
            <div class="relative">
                <img class="rounded-2xl shadow-xl w-full object-cover h-64 md:h-80" 
                     src="https://images.unsplash.com/photo-1543466835-00a7907e9de1?auto=format&fit=crop&q=80&w=800" 
                     alt="Cachorro feliz">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-600 transition-colors duration-300">
                <div class="text-3xl mb-3">🎯</div>
                <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Nossa Missão</h4>
                <p class="text-gray-600 dark:text-gray-300 text-sm">
                    Conectar pets que precisam de um lar a famílias incríveis, promovendo a adoção consciente e combatendo o abandono.
                </p>
            </div>

            <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-600 transition-colors duration-300">
                <div class="text-3xl mb-3">👁️‍🗨️</div>
                <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Nossa Visão</h4>
                <p class="text-gray-600 dark:text-gray-300 text-sm">
                    Ser a plataforma de adoção de referência, zerando o número de animais sem lar através da tecnologia e conscientização.
                </p>
            </div>

            <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-600 transition-colors duration-300">
                <div class="text-3xl mb-3">❤️</div>
                <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Nossos Valores</h4>
                <p class="text-gray-600 dark:text-gray-300 text-sm">
                    Amor e respeito aos animais, transparência no processo de adoção, responsabilidade social e empatia em cada match.
                </p>
            </div>
        </div>

    </div>
</section>
@endsection