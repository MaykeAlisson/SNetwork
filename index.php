<!--TODO O SISTEMA FOI DESENVOLVIDO E CRIADO POR 
MAYKE ALISSON MOURA FURTADO 
GRADUADO EM ANALISE E DESENVOLVIMENTO DE SISTEMAS 
-->
<?php
include ("conecta.php"); 

session_start();


$erro = isset($_GET['erro']) ? ($_GET['erro']) : 0;

if (isset($_SESSION['usuario'])) {
  $logado = "hidden";  
  $deslogado = "";
}else{
  $logado = "";
  $deslogado = "hidden";
}


?>
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
  <script type="text/javascript" src="js/listaCard.js"></script>
  <script type="text/javascript" src="js/buscaServico.js"></script>
  <script type="text/javascript" src="js/contatoLightbox.js"></script>
  <script type="text/javascript" src="js/meuJavaScript.js"></script>

  <script type="text/javascript">
    $('.logado').hide();
    $('.deslogado').hide();
  </script>
  
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!--CSS-->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link href="css/estilo.css" rel="stylesheet">
  <link href="css/contato.css" rel="stylesheet">
  <link href="css/cadastroUser.css" rel="stylesheet">
  

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
          <!-- botao toggle / MENU PARA TELAS MENORES -->
          <button type="button" class="navbar-toggle collapsed"
          data-toggle="collapse" data-target="#barra-navegacao">
          <span class="sr-only">alterna navegação</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="index.php" class="navbar-brand"><!-- LOGO -->
          <span class="img-logo">S Network</span></a>
        </div>
        <!-- NAV-BAR -->
        <div class="collapse navbar-collapse" id="barra-navegacao">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="#" class="lightboxC">Contato</a></li>
            <li><a href="">Ajuda</a></li>
          </ul>
          <form class="navbar-form navbar-left" role="search" id="formBuscaServico"><!-- INICIO COMPO PESQUISA CATEGORIA -->
            <input type="hidden" name="registros_por_pagina" id="registros_por_pagina" value="5" />
          <input type="hidden" name="offset" id="offset" value="0" />
           <div class="form-group left-inner-addon" id="#buscaSer">
             <i class="glyphicon glyphicon-search"></i>
             <input type="text" id="nomeServico" name="nomeServico" class="form-control" placeholder="Serviço" style="width: 150px"><!-- /CAMPO DE PESQUISA CATEGORIA-->
           </div> 
           <!-- INICIO CAMPO PESQUISA CIDADE -->
           <div class="form-group left-inner-addon">
            <i class="glyphicon glyphicon-map-marker"></i>
            <input type="text" id="nomeLocal" name="nomeLocal" class="form-control"  placeholder="Insira sua localização" style="width: 170px"><!-- /CAMPO PESQUISA CIDADE-->
          </div>
          <button type="button" class="btn btn-default btn-pes" id="btnBuscaPessoa">Pesquisar</button><!-- BOTTON PESQUISA -->
        </form>
        <div>
          <ul class="nav navbar-nav navbar-right">
            <li class="<?= $logado ?>"><a href="cadastro.php">Cadastrar</a></li>
            <li class="dropdown <?= $deslogado ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$_SESSION['nome']?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="sair.php">Sair</a></li>
              </ul>
            </li>
            <li class="dropdown <?= $erro == 1 ? 'open' : '' ?> <?= $logado ?>">
              <a id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entrar</a>
              <ul id="login-dp" class="dropdown-menu">
                <li>
                 <div class="row">
                  <div class="col-md-12">
                    Logar
                    <br /><br />
                    <form class="form" role="form" method="post" action="validar_acesso.php" accept-charset="UTF-8" id="login-nav">
                      <div class="form-group">
                       <label class="sr-only">Usuário</label>
                       <input type="text" class="form-control" name="usuario" id="formLogarEmail" placeholder="Digite seu usuário" required>
                     </div>
                     <div class="form-group">
                       <label class="sr-only">Senha</label>
                       <input type="password" class="form-control" name="senha" id="formLogarSenha" placeholder="Senha" required>
                       <div class="help-block text-right"><a href="">Esqueceu a senha ?</a></div>
                     </div>
                     <div class="form-group">
                       <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                     </div>
                   </form>
                   <?php
                   if ($erro == 1) {
                     echo '<font color="#FF0000">Usuario e ou Senha inválidos(s).</font>';
                   }
                   ?>
                 </div>
                 <div class="bottom text-center">
                  Novo aqui ? <a href="#" class="lightboxCad"><b>Junte-se a nós</b></a>
                  Anunciar Serviço ? <a href="cadastro.php"><b>Aqui</b></a>
                </div>
              </div>
            </li>
          </ul>
        </ul>
      </div>
    </div>   
  </div><!-- /CONTAINER-->
</nav><!-- /NAV -->
<div class="barra"></div>

<!--CONTATO-->
<div class="background" ></div>
<div class="box"><div class="close">X</div>
<h1>Entre em contato</h1>
<p>
  Para Dúvidas, Elogios, Críticas e/ou sugestões.
</p>
<form class="form" action="contatoDAO.php" method="post">
  <div class="input-wrap">
    <label class="input-label">Nome</label>
    <input type="text" class="input" name="nome" required>
  </div>
  <div class="input-wrap">
    <label class="input-label">Email</label>
    <input type="email" class="input" name="email" required>
  </div>
  <div class="input-wrap">
    <label class="input-label">Mensagem</label>
    <textarea class="textarea" name="textarea" required></textarea>
  </div>
  <div class="input-wrap">
    <input class="form-submit btnContato" type="submit" value="Enviar">
  </div>
</form>  
</div><!-- //FIM CONTATO -->


<!-- DESCRIÇÃO SISTEMA -->

<div class="container capa" id="primeiraDiv">  
 <h1 class="texto-capa">A qualquer hora, em qualquer lugar</h1>
 <center>
  <p class="desc">
   Com todos os dados nas nuvens, a gestão do seu serviço fica mais fácil e prática. Você tem acesso à todas as informações a hora que quiser, de onde quiser e de qualquer dispositivo que esteja conectado à internet.
 </p>
</center>
<div class="text-center">
 <img src="img/plataformas.png" class="img" class="img-responsive" >
</div>
</div>  <!-- /CONTAINER-->

<!-- CONTEUDOS -->
<section id="servicos">
  <div class="container">
    <div class="row">

      <!-- SO PARA VOCE -->
      <div class="col-md-2" id="historico">
        Só para
        <br>
        <span class="voce">você</span>
        <section style="margin-bottom: 50px; margin-top: 30px;">
          <header>
            <h2 class="SectionTitle">Últimos serviços acessados</h2>
          </header>
          <main id="searchdServico"></main>
        </section>
        <section style="margin-bottom: 50px;">
          <header>
            <h2 class="SectionTitle">Últimos termos pesquisados</h2>
          </header>
          <main id="searchdTermos"></main>
        </section>
      </div>
      <!-- ULTIMOS SERVIÇOS -->
      <div class="col-md-7" class="sectionCard">
        <div class="row" id="addTxt">
          <h4>
            Últimos Serviços Adicionados 
          </h4>
        </div>
        <div class="row" id="addCard">
          <!-- INICIO DO CARD-->  
          

          
          <div class="container">
            <div class="row">
              <div class="col-md-7">
                <div id="div_resultado_paginacao"></div>
              </div>
            </div>    
          </div>
        </div><!-- /row-->
      </div><!-- /sectionCard-->

      <!-- MENU SERVIÇOS -->
      <?php
      function listaProfissao($conexao){
        $profissoes = array();
        $resultadoP = mysqli_query($conexao, "select * from profissao");
        while ($profissao = mysqli_fetch_assoc($resultadoP)) {
          array_push($profissoes, $profissao);
        }
        return $profissoes;
      }
      ?>
      <div class="col-md-3" id="divCate">
        <div class="row" id="catTxt">
          Serviços
        </div>
        <div id="categoria">
          <ul class="navbar" >
            <?php
            $profissoes = listaProfissao($conexao);
            foreach ($profissoes as $profissao) {
              ?>
              <li><a href="" value="$profissoes['id']"><?=$profissao['nome']?></a></li>
              <?php
            }
            ?>
          </ul>
        </div>
      </div>

    </div>
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
          <li><a href="">Sobre</a></li>
          <li><a href="">Novidades</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <h4>links uteis</h4>
        <ul class="nav">
          <li><a href="geraRelatorio.php">Gerar Relatório</a></li>
          <li><a href="">Ajuda</a></li>
          <li><a href="#" class="lightbox">Contato</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <ul class="nav">
          <li class="item-rede-social"><a href=""><img src="img/facebook.png"></a></li>
          <li class="item-rede-social"><a href=""><img src="img/twitter.png"></a></li>
          <li class="item-rede-social"><a href=""><img src="img/instagram.png"></a></li>
        </ul>
        <h4 class="desenvolvedor">Desenvolvido por:</h4>
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <a href="https://www.google.com.br/" class="navbar-brand"><!-- LOGO MAMF -->
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
