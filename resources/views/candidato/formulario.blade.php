@extends('layouts.app')

@section('conteudo')
<div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow-md border border-gray-100 mt-6">
    <div class="flex items-center space-x-4 mb-6">
        <span class="text-3xl">📋</span>
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Formulário Socioambiental</h1>
            <p class="text-sm text-gray-500">Candidatura para adoção do pet: <strong>{{ $animal->nome }}</strong></p>
        </div>
    </div>
    
    <form action="{{ route('adocao.submeter', $animal->id) }}" method="POST" class="space-y-6">
        @csrf
        
        <div class="bg-gray-50 p-5 rounded-xl border border-gray-200">
            <h2 class="text-lg font-bold text-gray-700 mb-4 border-b pb-2">📍 Seu Endereço</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">CEP</label>
                    <input type="text" id="cep" name="cep" required maxlength="9" placeholder="00000-000" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-500 outline-none transition" onblur="buscarCep()">
                    <span id="cep-feedback" class="text-xs text-indigo-600 hidden mt-1">Buscando CEP...</span>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-gray-700 font-semibold mb-1">Logradouro (Rua/Av)</label>
                    <input type="text" id="logradouro" name="logradouro" required class="w-full border border-gray-300 bg-gray-100 rounded-lg p-2.5" readonly>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Número</label>
                    <input type="text" id="numero" name="numero" required class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Bairro</label>
                    <input type="text" id="bairro" name="bairro" required class="w-full border border-gray-300 bg-gray-100 rounded-lg p-2.5" readonly>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Cidade</label>
                    <input type="text" id="cidade" name="cidade" required class="w-full border border-gray-300 bg-gray-100 rounded-lg p-2.5" readonly>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">UF</label>
                    <input type="text" id="uf" name="uf" required class="w-full border border-gray-300 bg-gray-100 rounded-lg p-2.5" readonly>
                </div>
            </div>
        </div>

        <div>
            <h2 class="text-lg font-bold text-gray-700 mb-4 border-b pb-2 mt-2">🏠 Rotina e Residência</h2>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Qual é o seu tipo de residência?</label>
                    <select name="tipo_residencia" required class="w-full border border-gray-300 rounded-lg p-2.5">
                        <option value="Casa">Casa com quintal telado/fechado</option>
                        <option value="Apartamento">Apartamento com telas de proteção</option>
                        <option value="Outro">Outro tipo de residência</option>
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Em média, quantas horas por dia o pet ficará sozinho em casa?</label>
                    <select name="tempo_sozinho" required class="w-full border border-gray-300 rounded-lg p-2.5">
                        <option value="Menos de 2 horas">Menos de 2 horas</option>
                        <option value="De 2 a 6 horas">De 2 a 6 horas</option>
                        <option value="Mais de 6 horas">Mais de 6 horas</option>
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Você possui outros animais de estimação atualmente?</label>
                    <select name="tem_outros_pets" required class="w-full border border-gray-300 rounded-lg p-2.5">
                        <option value="Não">Não possuo outros pets</option>
                        <option value="Sim, Gato(s)">Sim, possuo gato(s)</option>
                        <option value="Sim, Cachorro(s)">Sim, possuo cachorro(s)</option>
                        <option value="Sim, Outros">Sim, outros animais</option>
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Justifique por que você deseja adotar este animal e descreva sua rotina:</label>
                    <textarea name="motivo_adocao" rows="3" required minlength="10" placeholder="Insira no mínimo 10 caracteres detalhando suas motivações..." class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-500 outline-none"></textarea>
                </div>
            </div>
        </div>

        <div class="bg-indigo-50 p-4 rounded-xl text-xs text-indigo-800 border border-indigo-100">
            ⚠️ Ao submeter, este pet ficará reservado temporariamente e sua solicitação passará pelo status <strong>"Em Análise"</strong> pela equipe da ONG SafePet.
        </div>

        <div class="flex space-x-4">
            <a href="{{ route('vitrine.show', $animal->id) }}" class="w-1/3 text-center bg-gray-100 text-gray-700 py-3 rounded-lg font-semibold hover:bg-gray-200 transition">Cancelar</a>
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
                    
                    // Joga o foco pro usuário digitar o número da casa
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