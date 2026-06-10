@extends('layouts.app')

@section('conteudo')
<div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-md border border-gray-100 dark:border-gray-700 mt-6 transition-colors duration-300">
    <div class="flex items-center space-x-4 mb-6">
        <span class="text-3xl">📋</span>
        <div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Formulário Socioambiental</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Candidatura para adoção do pet: <strong class="text-indigo-600 dark:text-indigo-400">{{ $animal->nome }}</strong></p>
        </div>
    </div>
    
    <form action="{{ route('adocao.submeter', $animal->id) }}" method="POST" class="space-y-6">
        @csrf
        
        <div class="bg-gray-50 dark:bg-gray-900/50 p-5 rounded-xl border border-gray-200 dark:border-gray-700 transition-colors duration-300">
            <h2 class="text-lg font-bold text-gray-700 dark:text-gray-200 mb-4 border-b dark:border-gray-700 pb-2">📍 Seu Endereço</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">CEP</label>
                    <input type="text" id="cep" name="cep" required maxlength="9" placeholder="00000-000" class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg p-2.5 text-gray-900 dark:!text-white focus:ring-2 focus:ring-indigo-500 outline-none transition" onblur="buscarCep()">
                    <span id="cep-feedback" class="text-xs text-indigo-600 dark:text-indigo-400 hidden mt-1">Buscando CEP...</span>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Logradouro (Rua/Av)</label>
                    <input type="text" id="logradouro" name="logradouro" required class="w-full border border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-800/80 text-gray-800 dark:!text-gray-300 rounded-lg p-2.5 font-medium" readonly>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Número</label>
                    <input type="text" id="numero" name="numero" required class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg p-2.5 text-gray-900 dark:!text-white focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Bairro</label>
                    <input type="text" id="bairro" name="bairro" required class="w-full border border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-800/80 text-gray-800 dark:!text-gray-300 rounded-lg p-2.5 font-medium" readonly>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Cidade</label>
                    <input type="text" id="cidade" name="cidade" required class="w-full border border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-800/80 text-gray-800 dark:!text-gray-300 rounded-lg p-2.5 font-medium" readonly>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">UF</label>
                    <input type="text" id="uf" name="uf" required class="w-full border border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-800/80 text-gray-800 dark:!text-gray-300 rounded-lg p-2.5 font-medium" readonly>
                </div>
            </div>
        </div>

        <div class="bg-gray-50 dark:bg-gray-900/50 p-5 rounded-xl border border-gray-200 dark:border-gray-700 transition-colors duration-300">
            <h2 class="text-lg font-bold text-gray-700 dark:text-gray-200 mb-4 border-b dark:border-gray-700 pb-2">🏠 Rotina e Residência</h2>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Qual é o seu tipo de residência?</label>
                    <select name="tipo_residencia" required class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg p-2.5 text-gray-900 dark:!text-white focus:ring-2 focus:ring-indigo-500 outline-none">
                        <option value="Casa com quintal telado/fechado" class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">Casa com quintal telado/fechado</option>
                        <option value="Casa sem quintal ou sem portões fechados" class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">Casa sem quintal ou sem portões fechados</option>
                        <option value="Apartamento com tela de proteção" class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">Apartamento com telas de proteção</option>
                        <option value="Apartamento sem tela de proteção" class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">Apartamento sem tela de proteção</option>
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Em média, quantas horas por dia o pet ficará sozinho em casa?</label>
                    <select name="tempo_sozinho" required class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg p-2.5 text-gray-900 dark:!text-white focus:ring-2 focus:ring-indigo-500 outline-none">
                        <option value="Menos de 2 horas" class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">Menos de 2 horas</option>
                        <option value="De 2 a 5 horas" class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">De 2 a 5 horas</option>
                        <option value="Mais de 6 horas" class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">Mais de 6 horas</option>
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Você possui outros animais de estimação atualmente?</label>
                    <select name="outros_pets" required class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg p-2.5 text-gray-900 dark:!text-white focus:ring-2 focus:ring-indigo-500 outline-none">
                        <option value="Não possuo outros pets" class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">Não possuo outros pets</option>
                        <option value="Sim, possuo cão(s)" class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">Sim, possuo cão(s)</option>
                        <option value="Sim, possuo gato(s)" class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">Sim, possuo gato(s)</option>
                        <option value="Sim, possuo cão e gato" class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">Sim, possuo cão e gato</option>
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Todos os moradores da residência estão de acordo com a adoção?</label>
                    <select name="concordancia_casa" required class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg p-2.5 text-gray-900 dark:!text-white focus:ring-2 focus:ring-indigo-500 outline-none">
                        <option value="Sim, todos estão cientes e de acordo" class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">Sim, todos estão cientes e de acordo</option>
                        <option value="Não, alguns ainda têm dúvidas ou não sabem" class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">Não, alguns ainda têm dúvidas ou não sabem</option>
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Está ciente e seguro de que terá condições de arcar com os custos do pet?</label>
                    <select name="consciencia_financeira" required class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg p-2.5 text-gray-900 dark:!text-white focus:ring-2 focus:ring-indigo-500 outline-none">
                        <option value="Sim, compreendo perfeitamente os custos de um animal" class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">Sim, compreendo perfeitamente os custos de um animal</option>
                        <option value="Tenho receio sobre custos médicos elevados" class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">Tenho receio sobre custos médicos elevados</option>
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Caso precise viajar ou se mudar de residência, o que pretende fazer com o pet?</label>
                    <textarea name="plano_viagem" rows="2" required placeholder="Ex: Deixarei em hotelzinho, com parentes ou levarei comigo na mudança..." class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg p-2.5 text-gray-900 dark:!text-white focus:ring-2 focus:ring-indigo-500 outline-none placeholder-gray-400 dark:placeholder-gray-500"></textarea>
                </div>

                <div>
                    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Como pretende reagir caso o pet chore, morda objetos ou urine no lugar errado?</label>
                    <textarea name="comportamento_animal" rows="2" required placeholder="Descreva brevemente como pretende lidar com o período de adaptação e educação do pet..." class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg p-2.5 text-gray-900 dark:!text-white focus:ring-2 focus:ring-indigo-500 outline-none placeholder-gray-400 dark:placeholder-gray-500"></textarea>
                </div>

                <div>
                    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Justifique por que você deseja adotar este animal e descreva sua rotina:</label>
                    <textarea name="descricao" rows="3" required minlength="10" placeholder="Insira no mínimo 10 caracteres detalhando suas motivações..." class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg p-2.5 text-gray-900 dark:!text-white focus:ring-2 focus:ring-indigo-500 outline-none placeholder-gray-400 dark:placeholder-gray-500"></textarea>
                </div>
            </div>
        </div>

        <div class="bg-indigo-50 dark:bg-indigo-950/40 p-4 rounded-xl text-xs text-indigo-800 dark:text-indigo-300 border border-indigo-100 dark:border-indigo-900/60 transition-colors duration-300">
            ⚠️ Ao submeter, este pet ficará reservado temporariamente e sua solicitação passará pelo status <strong>"Em Análise"</strong> pela equipe da ONG SafePet.
        </div>

        <div class="flex space-x-4">
            <a href="{{ route('vitrine.show', $animal->id) }}" class="w-1/3 text-center bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 py-3 rounded-lg font-semibold hover:bg-gray-200 dark:hover:bg-gray-600 transition shadow-sm">Cancelar</a>
            <button type="submit" class="w-2/3 bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 shadow-md transition">Enviar Questionário Seguro</button>
        </div>
    </form>
</div>

<script>
    function buscarCep() {
        let cep = document.getElementById('cep').value.replace(/\D/g, '');
        let feedback = document.getElementById('cep-feedback');
        
        if (cep.length !== 8) return;

        feedback.classList.remove('hidden');

        fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(response => response.json())
            .then(data => {
                feedback.classList.add('hidden');
                if (!data.erro) {
                    document.getElementById('logradouro').value = data.logradouro;
                    document.getElementById('bairro').value = data.bairro;
                    document.getElementById('cidade').value = data.localidade;
                    document.getElementById('uf').value = data.uf;
                    
                    document.getElementById('numero').focus();
                } else {
                    alert('CEP não encontrado! Verifique o número digitado.');
                    limparCamposCep();
                }
            })
            .catch(error => {
                feedback.classList.add('hidden');
                console.error('Erro ao buscar o CEP:', error);
                alert('Erro de conexão ao buscar o CEP.');
            });
    }

    function limparCamposCep() {
        document.getElementById('logradouro').value = '';
        document.getElementById('bairro').value = '';
        document.getElementById('cidade').value = '';
        document.getElementById('uf').value = '';
    }
</script>
@endsection