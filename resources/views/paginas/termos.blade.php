@extends('layouts.app')

@section('conteudo')
<div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-8 sm:p-12 rounded-xl shadow-md border border-gray-100 dark:border-gray-700 mt-8 mb-12 transition-colors duration-300">
    
    <!-- Cabeçalho da Página -->
    <div class="text-center mb-8 border-b border-gray-200 dark:border-gray-700 pb-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">Termos de Serviço</h1>
        <p class="text-sm text-gray-500 dark:text-gray-400">Última atualização: Junho de 2026</p>
    </div>

    <!-- Conteúdo dos Termos -->
    <div class="space-y-6 text-gray-600 dark:text-gray-300 leading-relaxed text-justify">
        
        <p>
            Leia estes Termos de Serviço na íntegra ao usar <span class="font-semibold text-indigo-600 dark:text-indigo-400">www.safepet.com</span>, que pertence e é operado por <span class="font-semibold">safepet.com</span>. Este Acordo documenta os termos e condições legalmente vinculativos associados ao uso do Site em www.safepet.com, incluindo os serviços de busca de pets perdidos e adoção de pets.
        </p>

        <p>
            Ao usar ou acessar o Site de qualquer forma, visualizar ou navegar no Site, ou adicionar seu próprio conteúdo ao Site, você concorda em obedecer a estes Termos de Serviço. Você também concorda com nossa política de privacidade e quaisquer outras políticas que postarmos no <span class="font-semibold">SafePet</span>.
        </p>

        <hr class="border-gray-200 dark:border-gray-700 my-4">

        <!-- Seção 1 -->
        <div>
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-2">1. Propriedade Intelectual</h2>
            <p>
                O Site e todo o seu conteúdo original são de propriedade exclusiva da <span class="font-semibold">safepet.com</span> e são, como tal, totalmente protegidos pelos direitos autorais internacionais apropriados e outras leis de direitos de propriedade intelectual.
            </p>
        </div>

        <!-- Seção 2 -->
        <div>
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-2">2. Criação de Conta</h2>
            <p class="mb-2">
                Para registrar uma conta, você deve ter pelo menos 13 anos de idade. Se você sabe que um usuário tem menos de 13 anos, informe-nos.
            </p>
            <p>
                Você é responsável por tudo o que ocorrer quando alguém fizer login em sua conta, bem como pela segurança da conta. Se você acredita que sua conta está comprometida, entre em contato conosco imediatamente.
            </p>
        </div>

        <!-- Seção 3 -->
        <div>
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-2">3. Terminação</h2>
            <p>
                O <span class="font-semibold">safepet.com</span> se reserva o direito de encerrar seu acesso ao Site, sem qualquer aviso prévio, caso identifique o descumprimento de qualquer uma das regras aqui listadas.
            </p>
        </div>

        <!-- Seção 4 -->
        <div>
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-2">4. Links para Outros Sites</h2>
            <p>
                Nosso site contém uma série de links para outros sites e recursos online que não são propriedade ou controlados por <span class="font-semibold">safepet.com</span>. A plataforma não tem controle e, portanto, não pode assumir responsabilidade pelo conteúdo ou práticas gerais de qualquer um desses sites e/ou serviços de terceiros. Portanto, recomendamos que você leia todos os termos e condições e a política de privacidade de qualquer site que visite como resultado de seguir um link publicado em nosso site.
            </p>
        </div>

        <!-- Seção 5 -->
        <div>
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-2">5. Publicação de Conteúdo</h2>
            <p class="mb-2">
                Você reconhece e concorda que é o único responsável por todos os materiais que aprovar para publicação, exibição e distribuição por nós em conexão com os Serviços, ou que você poste, publique ou distribua em conexão com os Serviços, incluindo, sem limitação, anúncios preparados por nós para você (incluindo todas as informações, marcas registradas e fotografias contidas em tais anúncios), informações, dados, texto, software, links, fotografias, imagens, gráficos, vídeo, mensagens, arquivos e quaisquer outros materiais ("Conteúdo do usuário").
            </p>
            <p>
                Você representa, garante e concorda que nenhum Conteúdo do Usuário enviado por você ou por meio de sua conta irá: violar ou infringir os direitos de terceiros, incluindo direitos autorais, marcas registradas, privacidade, publicidade ou outros direitos pessoais ou de propriedade; conter material calunioso ou difamatório; ou violar ou encorajar a violação de quaisquer leis, regulamentos, regras ou códigos profissionais federais, estaduais ou locais.
            </p>
        </div>

        <!-- Seção 6 -->
        <div>
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-2">6. Diretrizes de Postagem</h2>
            <p class="mb-3">
                O <span class="font-semibold">SafePet</span> mantém um conjunto de diretrizes de postagem para promover um ambiente de comunidade positivo, seguro e útil. Em caso de violação de qualquer uma das diretrizes a seguir, nos reservamos o direito de remover conteúdo ou banir usuários das propriedades sociais da plataforma:
            </p>
            <ul class="list-disc list-inside pl-4 space-y-2">
                <li>O <span class="font-semibold">SafePet</span> não participa de disputas de adoção ou custódia. Se você acredita que alguém está com a custódia indevida de um animal de estimação, a plataforma não é o lugar para resolver essa disputa.</li>
                <li>A plataforma serve exclusivamente como um meio para conectar pessoas que desejam adotar um pet com aqueles que precisam encontrar um novo lar para seus animais ou localizar animais perdidos.</li>
                <li>Não inclua informações de identificação pessoal sobre outros indivíduos em sua postagem pública.</li>
                <li>Por favor, não use palavrões ou termos ofensivos.</li>
                <li>Apenas imagens do seu animal de estimação ou de um animal que você encontrou devem ser enviadas. Por favor, não envie imagens de cunho pessoal ou comercial desassociados ao escopo do site.</li>
                <li>Você deve ser maior de 18 anos para postar anúncios no <span class="font-semibold">SafePet</span>.</li>
                <li>Por favor, não poste o mesmo animal de estimação mais de uma vez e evite incluir links externos desnecessários na mensagem postada.</li>
            </ul>
        </div>

        <!-- Seção 7 -->
        <div>
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-2">7. Adoção de Pets</h2>
            <p class="mb-2">
                Usuários interessados em adotar um pet através do <span class="font-semibold">SafePet</span> devem seguir as diretrizes estabelecidas nesta seção. Todos os pets disponíveis para adoção devem ser listados com informações claras e precisas sobre a condição do animal, requisitos para adoção e qualquer outra informação relevante fornecida pelo doador do pet.
            </p>
            <p>
                O <span class="font-semibold">SafePet</span> não é responsável pela condição de saúde dos pets, negociações externas ou transferência física de custódia, mas oferece o serviço de listagem gratuita como um facilitador entre o doador e o adotante. Todas as interações devem respeitar a privacidade e a segurança dos envolvidos.
            </p>
        </div>

    </div>

    <!-- Botão de Voltar para o Login ou Home -->
    <div class="mt-10 border-t border-gray-200 dark:border-gray-700 pt-6 text-center">
        <a href="{{ route('login') }}" class="inline-flex items-center text-sm font-semibold text-indigo-600 dark:text-indigo-400 hover:underline">
            ← Voltar para a página de Login
        </a>
    </div>

</div>
@endsection