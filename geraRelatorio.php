<!--TODO O SISTEMA FOI DESENVOLVIDO E CRIADO POR 
MAYKE ALISSON MOURA FURTADO 
GRADUADO EM ANALISE E DESENVOLVIMENTO DE SISTEMAS 
-->
<?php

include("conecta.php");


?>

<!doctype html>
<html lang="pt-br">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <link href="css/geraRelatorio.css" rel="stylesheet">

  <title>S Network</title>
</head>
<body>
  <nav class="navbar navbar-fixed-top" id="menu">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
      <a class="navbar-brand" href="index.php">
        <img src="img/logo.png" >
      </a>
    </div>
    <div class="col-md-4"></div>
  </nav>

  <!-- FORMULARIO PARA GERAR RELATORIO -->
  <div class="col-md-12">
    <h1>Selecione você mesmo o profissional que deseja, e faça seu classificados.</h1>
  </div>
  <div class="col-md-3"></div>
  <div class="col-md-6 container">   
    <div id="formRelatorio">
      <form method="post" action="geraPdf.php">
        <div class="row">

          <!-- FUNCAO LISTA PROFICAO -->
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
          <div class="col-md-6">
            <label>Profissão</label>
            <select class="form-control" name="profissao">
              <option>Selecione uma Profissão</option>
              <?php
              $profissoes = listaProfissao($conexao);
              foreach ($profissoes as $profissao) {
                ?>
                <option value="<?=$profissao['nome']?>"><?=$profissao['nome']?></option>
                <?php
              }
              ?>
            </select>
          </div>
          <!-- SELEÇÃO CIDADE -->
          <div class="col-md-6">
            <label>Cidade</label>
            <input type="text" class="form-control" name="cidade" placeholder="Digite sua cidade">
          </div>
        </div>
        <div id="btnBuscar">
          <button type="submit" class="btn btn-outline-secondary">Buscar</button>
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-3"></div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>
