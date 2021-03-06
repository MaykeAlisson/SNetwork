<!--TODO O SISTEMA FOI DESENVOLVIDO E CRIADO POR 
MAYKE ALISSON MOURA FURTADO 
GRADUADO EM ANALISE E DESENVOLVIMENTO DE SISTEMAS 
-->
<?php
include ("conecta.php"); 
session_start();


if(!isset($_SESSION['usuario'])){
  header('Location: index.php?erro=1');
}



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Dashboard</title> <!--TITULO DA PAGINA-->
  <link rel="icon"  href="img/favico.png">

  <!-- jquery - link cdn -->
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script type="text/javascript" src="js/funcao.js"></script>
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!--CSS-->
  <link href="css/perfil.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   <!-- BARRA DE NAVEGAÇAO -->
   <nav class="navbar navbar-inverse navbar-transparente">
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
        </ul>
        <div class="dropPerfil">
          <ul class=" nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$_SESSION['nome']?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="sair.php">Sair</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>   
    </div><!-- /CONTAINER-->
  </nav><!-- /NAV -->

  <!--MENU LATERAL DO PERFIL -->
  <div class=" col-md-2" id="menuPerfil">
    <div class="imgPerfil">
      <img src="img/imgPerfil.png">
    </div>
    <div class="nomePerfil">
      <span class="glyphicon glyphicon-user" aria-hidden="true" style="word-spacing: -6px;"> <?=$_SESSION['nome']?> </span>
    </div>
    <div class="emailPerfil">
      <span class="glyphicon glyphicon-envelope" aria-hidden="true"> <?=$_SESSION['email']?> </span>
    </div>
    <div class="senhaPerfil">
      <span class="glyphicon glyphicon-lock"> ***** </span>
    </div>
    <div class="profissaoPerfil">
      <span class="glyphicon glyphicon-education" style="word-spacing: -6px;"> <?=$_SESSION['idProfissao']?> </span>
    </div>
    <div class="profissaoPerfil">
      <span class="glyphicon glyphicon-education" style="word-spacing: -6px;"> <?=$_SESSION['idProfissao2']?> </span>
    </div>
    <div class="observacaoPerfil">
      <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="word-spacing: -6px;"> <?=$_SESSION['observacao']?></span>
    </div>
    <div class="localPerfil">
      <span class="glyphicon glyphicon-globe" aria-hidden="true" style="word-spacing: -6px;"> <?=$_SESSION['idCidade']?></span>
    </div>
    <div class="nascimentoPerfil">
      <span class="glyphicon glyphicon-calendar"> <?=$_SESSION['nascimento']?> </span>
    </div>
    <div class="telefonePerfil">
      <span class="glyphicon glyphicon-earphone"> <?=$_SESSION['telefone']?></span>
    </div>
    <div class="statusPerfil">
      <span class="glyphicon glyphicon-refresh"> <?=$_SESSION['disponibilidade']?> </span>
    </div>
    <div class="likePerfil">
      <span class="glyphicon glyphicon-thumbs-up" style="word-spacing: -6px;"> Em Breve </span>
    </div>
    <div class="ajudaPerfil">
      <a href="" class="glyphicon glyphicon-question-sign"> Ajuda </a>
    </div>
    <div class="sairPerfil">
      <a href="sair.php" class="glyphicon glyphicon-off"> Sair </a>
    </div>
    <div class="deletarPerfil">
      <a href="deletar.php" class="glyphicon glyphicon-trash" style="word-spacing: -6px;"> Excluir Conta </a>
    </div>
  </div>
  <div class="col-md-10" >
    <div class="col-md-12" id="textForm">
      <h3>Meus Dados</h3>
    </div>
    <div id="formPerfil">
      <form method="post" action="alteraUsuario.php">
        <div class="form-row">
          <div class="form-group col-md-4">
            <input type="hidden" name="id" value="<?=$_SESSION['id']?>">
            <label>Nome</label>
            <input type="text" class="form-control" name="nome" id="" value="<?=$_SESSION['nome']?>">
          </div>
          <div class="form-group col-md-4">
            <label>Email</label>
            <input type="email" class="form-control" name="email" id="" value="<?=$_SESSION['email']?>">
          </div>
          <div class="col-md-4 form-group">
            <label>Senha</label>
            <input type="password" class="form-control" disabled name="" id="" value="******" style="width:200px;font-size: 13px" >
          </div>
        </div>
        <div class="form-row">
          <!--FUNCAO LISTA ESTADO -->
          <?php
          function listaEstado($conexao){
            $estados = array();
            $resultado = mysqli_query($conexao, "select * from estados");
            while ($estado = mysqli_fetch_assoc($resultado)) {
              array_push($estados, $estado);
            }
            return $estados;
          } 
          ?>
          <div class="col-md-4 form-group" id="perfilFormEstado">
            <label for="cod_estados">Estado</label>
            <select name="estados" id="estados" class="form-control" required="required">
              <option selected="">Selecione seu Estado</option>
              <?php 
              $estados = listaEstado($conexao);
              foreach ($estados as $estado) {
                $esseEOEstado = $_SESSION['idEstado'] == $estado['cod_estados'];
                $selecao = $esseEOEstado ? "selected='selected'" : "";
                ?>
                <option value="<?=$estado['cod_estados']?>" <?=$selecao?>><?=$estado['sigla']?>-<?=$estado['nome']?></option> 
                <?php
              }
              ?>
            </select>
          </div>
          <div class="col-md-4 form-group">
            <label for="cod_cidades">Cidade</label>
            <select name="cidades" id="cidades" class="form-control" required="required">
              <option selected="">Selecione primeiro um Estado</option>
            </select>
          </div>
          <div class="col-md-4 form-group">
            <label>Telefone</label>
            <input type="text" class="form-control" name="telefone" id="" value="<?=$_SESSION['telefone']?>" style="width:150px;font-size: 13px">
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-4 form-group" id="perfilFormNascimento">
            <script type='text/javascript'>
              function MascaraData(obj) 
              {
               switch (obj.value.length) 
               {
                case 2:
                obj.value = obj.value + "/";
                break;
                case 5:
                obj.value = obj.value + "/";
                break;
              }
            }
          </script>
          <label>Nascimento</label>
          <input type="text" class="form-control"
          disabled name="" id="" maxlength="10"  size="14"  onKeyPress='MascaraData(this);' autocomplete="off" value="<?=$_SESSION['nascimento']?>" style="width:130px;font-size: 13px">
        </div>
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
        <div class="col-md-4 form-group">
         <label for="inputProfissao">1ª Profissão</label>
         <select name="profissao" id="profissao" class="form-control" required="required">
          <option selected="">Selecione sua 1ª Profissão</option>
          <?php
          $profissoes = listaProfissao($conexao);
          foreach ($profissoes as $profissao) {
            $essaEhAProfissao = $_SESSION['idProfissao'] == $profissao['nome'];
            $selecao = $essaEhAProfissao ? "selected='selected'" : "";
            ?>
            <option value="<?=$profissao['nome']?>" <?=$selecao?>><?=$profissao['nome']?></option>
            <?php
          }
          ?>
        </select>
      </div>
      <div class="col-md-4 form-group">
        <label>2° Profissão</label>
        <select name="profissao2" id="profissao2" class="form-control" required="required" style="width: 200px;">
          <option selected="">Selecione sua 1ª Profissão</option>
          <?php
          $profissoes = listaProfissao($conexao);
          foreach ($profissoes as $profissao) {
            $essaEhAProfissaoB = $_SESSION['idProfissao2'] == $profissao['nome'];
            $selecaoB = $essaEhAProfissaoB ? "selected='selected'" : "";
            ?>
            <option value="<?=$profissao['nome']?>" <?=$selecaoB?>><?=$profissao['nome']?></option>
            <?php
          }
          ?>
        </select>
      </div>
      <div class="col-md-4 form-group" id="perfilObservacao">
        <label>Especialização</label>
        <input type="text" class="form-control" name="observacao" value="<?=$_SESSION['observacao']?>" style="width:200px;font-size: 13px">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 form-group">
        <label>Status</label>
        <br />
        <input class="form-check-input" type="radio" name="radio" value="Ativo" id="" checked="">
        <label>Ativo</label>
        <input class="form-check-input" type="radio" name="radio" value="Ocupado" id="">
        <label>Ocupado</label>
      </div>
      <div class="col-md-4 form-group" id="perfilFormLike">
        <label>Avaliação</label>
        <input type="text" class="form-control" disabled name="" value="Em Breve"  style="width:150px;font-size: 13px">
      </div>
    </div>
    <button type="submit" class="btn btn-info" id="btnAtualizar">Atualizar</button>
  </form>
</div>
</div>






<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>