@extends('layouts.app')

@section('conteudo')
<div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-8 sm:p-12 rounded-xl shadow-md border border-gray-100 dark:border-gray-700 mt-8 mb-12 transition-colors duration-300">
    
    <!-- Cabeçalho da Página -->
    <div class="text-center mb-8 border-b border-gray-200 dark:border-gray-700 pb-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">Política de Privacidade</h1>
        <p class="text-sm text-gray-500 dark:text-gray-400">Última atualização: Junho de 2026</p>
    </div>

    <!-- Conteúdo da Política -->
    <div class="space-y-6 text-gray-600 dark:text-gray-300 leading-relaxed text-justify">
        
        <p>
            A sua privacidade é de extrema importância para nós. É política do <span class="font-semibold text-indigo-600 dark:text-indigo-400">SafePet</span> respeitar a sua privacidade em relação a qualquer informação sua que possamos coletar no site www.safepet.com e outros sites que possuímos e operamos.
        </p>

        <p>
            Esta política foi desenvolvida em conformidade com as diretrizes de proteção de dados (incluindo a LGPD) para garantir transparência total sobre como tratamos os seus dados pessoais dentro das nossas funcionalidades de adoção e busca de animais perdidos.
        </p>

        <hr class="border-gray-200 dark:border-gray-700 my-4">

        <!-- Seção 1 -->
        <div>
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-2">1. Informações que Coletamos</h2>
            <p class="mb-2">
                Solicitamos informações pessoais apenas quando realmente precisamos delas para lhe fornecer um serviço adequado. Fazemo-lo por meios justos e legais, com o seu conhecimento e consentimento:
            </p>
            <ul class="list-disc list-inside pl-4 space-y-1">
                <li><span class="font-semibold">Dados de Cadastro:</span> Nome, e-mail e senha (criptografada) para permitir a criação e segurança da sua conta.</li>
                <li><span class="font-semibold">Dados dos Anúncios:</span> Informações sobre os pets, fotos, descrição e informações de contato voluntárias para viabilizar as adoções ou reencontros.</li>
            </ul>
        </div>

        <!-- Seção 2 -->
        <div>
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-2">2. Uso das Informações</h2>
            <p class="mb-2">
                Não compartilhamos informações de identificação pessoal publicamente ou com terceiros, exceto quando exigido por lei ou estritamente necessário para o funcionamento do serviço, tais como:
            </p>
            <ul class="list-disc list-inside pl-4 space-y-1">
                <li>Exibir os dados do animal e o contato do responsável na página pública para que potenciais adotantes ou pessoas que encontraram o pet possam entrar em contato.</li>
                <li>Garantir a segurança da plataforma e gerenciar o acesso ao seu painel CRUD.</li>
            </ul>
        </div>

        <!-- Seção 3 -->
        <div>
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-2">3. Retenção e Segurança dos Dados</h2>
            <p>
                Apenas retemos as informações coletadas pelo tempo necessário para fornecer o serviço solicitado. Quando armazenamos dados, os protegemos dentro de meios comercialmente aceitáveis ​​para evitar perdas e roubos, bem como acesso, divulgação, cópia, uso ou modificação não autorizados. Suas senhas são tratadas com algoritmos fortes de hash criptográfico no nosso banco de dados.
            </p>
        </div>

        <!-- Seção 4 -->
        <div>
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-2">4. Links de Terceiros</h2>
            <p>
                O nosso site pode ter links para sites externos que não são operados por nós. Esteja ciente de que não temos controle sobre o conteúdo e práticas desses sites e não podemos aceitar responsabilidade por suas respectivas políticas de privacidade.
            </p>
        </div>

        <!-- Seção 5 -->
        <div>
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-2">5. Direitos do Usuário (LGPD)</h2>
            <p class="mb-2">
                Você é livre para recusar a nossa solicitação de informações pessoais, entendendo que talvez não possamos fornecer alguns dos serviços desejados. Como usuário do SafePet, você tem o direito garantido de:
            </p>
            <ul class="list-disc list-inside pl-4 space-y-1">
                <li>Acessar, atualizar ou corrigir seus dados cadastrais a qualquer momento no seu painel.</li>
                <li>Excluir definitivamente seus anúncios e sua conta do nosso banco de dados através das ferramentas do seu perfil (CRUD).</li>
            </ul>
        </div>

        <!-- Seção 6 -->
        <div>
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-2">6. Compromisso do Usuário</h2>
            <p>
                O usuário se compromete a fazer uso adequado dos conteúdos e da informação que o SafePet oferece no site e com caráter enunciativo, mas não limitativo: não publicar imagens ou informações falsas, não difamar outros usuários e não utilizar dados de terceiros sem autorização prévia.
            </p>
        </div>

    </div>

    <!-- Botões de Navegação -->
    <div class="mt-10 border-t border-gray-200 dark:border-gray-700 pt-6 flex flex-col sm:flex-row justify-between items-center space-y-3 sm:space-y-0 text-sm">
        <a href="{{ route('termos') }}" class="text-gray-500 dark:text-gray-400 hover:underline">
            Conhecer os Termos de Serviço
        </a>
        <a href="{{ route('login') }}" class="font-semibold text-indigo-600 dark:text-indigo-400 hover:underline">
            ← Voltar para o Login
        </a>
    </div>

</div>
@endsection