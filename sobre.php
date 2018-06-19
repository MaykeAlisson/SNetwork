<!--TODO O SISTEMA FOI DESENVOLVIDO E CRIADO POR 
MAYKE ALISSON MOURA FURTADO 
GRADUADO EM ANALISE E DESENVOLVIMENTO DE SISTEMAS 
-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>S Network</title> <!--TITULO DA PAGINA-->
  <link rel="icon"  href="img/favico.png">

  <!-- jquery - link cdn -->
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- javascript - local -->
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/meuJavaScript.js"></script>

  
  
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!--CSS-->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link href="css/sobre.css" rel="stylesheet">


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- BARRA DE NAVEGAÇAO -->
    <nav class="navbar navbar-fixed-top navbar-inverse navbar-transparente">
      <div class="container">
        <!-- HEADER -->
        <div class="navbar-header">
          <ul class="nav navbar-nav">
              <li><a href="index.php">Home</a></li>
            </ul>
          
          </div>
          <!-- NAV-BAR -->
          <div class="collapse navbar-collapse" id="barra-navegacao">
            <div class="col-md-5"></div>
            <a href="index.php" class="navbar-brand"><!-- LOGO -->
            <span class="img-logo">S Network</span></a>
          </div>   
        </div><!-- /CONTAINER-->
      </nav><!-- /NAV -->
      <div class="barra"></div>


      <!-- CONTEUDOS -->
      <section id="servicos">
       <div class="container">
        Pular para o conteúdo principal
        Pronus Engenharia de Software
        Início Cursos Blog Contato
        O que é Gerência de Configuração de Software?

        André Felipe Dias

        2016-05-11

        3 Comments

        Mudanças durante o desenvolvimento de software são inevitáveis; o ambiente no qual o sistema opera muda, o entendimento dos usuários e desenvolvedores sobre o sistema muda, os requisitos mudam. Com tantas mudanças assim, como evitar que o desenvolvimento fique caótico?

        A área da Engenharia de Software que trata esse assunto é a Gerência de Configuração de Software:

        Gerência de Configuração de Software (GCS) é um conjunto de atividades de apoio que permite a absorção ordenada das mudanças inerentes ao desenvolvimento de software, mantendo a integridade e a estabilidade durante a evolução do projeto.

        As atividades da GCS e as respectivas ferramentas de apoio são:

        Controlar e acompanhar mudanças (Controle de Mudança)
        Registrar a evolução do projeto (Controle de Versão)
        Estabelecer a integridade do sistema (Integração Contínua)

        Essas atividades correspondem respectivamente aos CM.SG 2, 1 e 3 do CMMI-DEV

        ferramentas GCS
        Controle e Acompanhamento de Mudanças

        Mudanças aparecem durante todo o desenvolvimento e devem ser registradas, avaliadas e agrupadas de acordo com sua prioridade. Com base nessas informações, é possível planejar melhor o escopo, prazo e o custo de cada iteração. Em seguida, à medida que o desenvolvimento acontece, pode-se acompanhar o estado da solicitação da mudança até sua implementação e até o lançamento de uma versão em produção.

        Existem várias ferramentas disponíveis que executam essas ações. Alguns exemplos (em ordem alfabética) são:

        BitBucket
        Bugzilla
        GitHub
        Jira
        Phabricator
        Redmine
        Trac

        Registro da Evolução do Projeto

        Cada vez que uma solicitação de mudança é implementada, acontece um incremento na evolução do projeto que deve ser registrado no histórico. Este incremento na evolução corresponde a uma configuração:

        Configuração é o estado do conjunto de itens que formam o sistema em um determinado momento.

        As funcionalidades oferecidas pelo controle de versão vão além do simples registro do histórico das configurações. Além do registro das configurações, o controle de versão tem outras responsabilidades importantes: possibilitar a edição concorrente sobre os arquivos e a criação de variações no projeto.

        O controle de versão é a parte principal da GCS. É o elo comum entre o controle de mudança e a integração do projeto.

        Exemplos de ferramentas de controle de versão:

        Git
        Mercurial
        Subversion

        Verificação da Integridade do Sistema

        O objetivo da integração é verificar se a construção do sistema a partir dos itens registrados em uma configuração é bem sucedida.

        Integrar o sistema consiste em construir o sistema a partir dos itens registrados em uma configuração.

        Em termos práticos, a integração é feita através de scripts que automatizam a construção, testes e e também a coleta de métricas de qualidade. As ferramentas de integração contínua acompanham o controle de versão e disparam os scripts cada vez que uma nova configuração é registrada.

        Exemplos de ferramentas de integração contínua:

        BuildBot
        CircleCI
        CodeClimate
        CodeShip
        Concourse
        Drone.io
        Jenkins
        Travis CI

        GCS na Engenharia de Software

        A Gerência de Configuração de Software é a base para as demais áreas de Engenharia de Software: Por isso, aparece como requisito de implementação já no nível inicial de diversos modelos de maturidade de processo de desenvolvimento tais como o CMMI-DEV, SPICE e o MPS-Br.

        áreas da engenharia de software

        Do ponto de vista das ferramentas, a divisão entre as áreas não é muito nítida. As ferramentas de controle de mudança e integração contínua oferecem mais funcionalidades do que as exigidas pela GCS e avançam sobre áreas de Gerência de Projeto e Teste & Qualidade.

        sobreposição de responsabilidades
        Fluxo de Trabalho

        As solicitações de mudança ficam registradas no controle de mudança. Em seguida, um desenvolvedor se torna o responsável pela implementação de uma solicitação e registra a configuração resultante no controle de versão, o que dispara a integração contínua para execução da construção e testes automatizados, além da coleta de métricas da qualidade do código. Os resultados são apresentados imediatamente a toda equipe, que podem tomar as providências necessárias em caso de qualquer problema.

        workflow simplificado
        Considerações Finais

        A Gerência de Configuração de Software é essencial para produzir software de qualidade. Existem diversas ferramentas open source de GCS disponíveis. Por isso, não há desculpa para não usar alguma. E sim, é preciso um esforço inicial para entender os conceitos, definir alguns processos, integrar e aprender a usar as ferramentas, mas é um investimento baixo pelo retorno que oferece.
        Leia também

        Vídeo: Como funciona o controle de versão? (8min)
        Vídeo: Para que serve o controle de versão? (4min)
        Tipos de Ramos do Controle de Versão
        Conceitos Básicos de Controle de Versão de Software — Centralizado e Distribuído
        Vantagens e Desvantagens do Controle de Versão Distribuído

        cmmi
        conceitos
        controle de mudança
        controle de versão
        gerência de configuração de software

        Post anterior
        Próximo post

        Comentários

        Contents © 2017 Pronus Engenharia de Software - Powered by Nikola
      </div>
    </section>

    <!-- RODAPE -->
    <footer id="rodape">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <span class="img-logo">S Network</span>
          </div>
          <div class="col-md-3">
            <h4>company</h4>
            <ul class="nav">
              <li><a href="sobre.php">Sobre</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <h4>links uteis</h4>
            <ul class="nav">
              <li><a href="geraRelatorio.php">Gerar Relatório</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <h4 class="desenvolvedor">Desenvolvido por:</h4>
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <a href="https://br.linkedin.com/in/maykealisson" class="navbar-brand"><!-- LOGO MAMF -->
                <span class="img-logoMamf">< MAMF ></span></a>
              </div>
              <div class="col-md-4"></div>
            </div>

          </div>
        </div>
      </footer>

      <script type="text/javascript">
        $(document).ready( function () {

          $('.btn-pes').click(function(){
            $('#primeiraDiv').hide();
          });

        });  


      </script>


      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
    </body>
    </html>
