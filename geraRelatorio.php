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
  <link href="css/geraRelatorio.css" rel="stylesheet">


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
        <div class="col-md-12">
          <h1>Selecione você mesmo o profissional que deseja, e faça seu classificados.</h1>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <div id="formRelatorio">
          <form method="post" action="geraPdf.php">
            <div class="row">

              <!-- PROFICAO -->
              <div class="col-md-6">
                <label>Profissão</label>
                <input type="text" class="form-control" name="profissao" placeholder="Didige uma Profissão">            
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
      </div>
    </section>

    

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
    </body>
    </html>
