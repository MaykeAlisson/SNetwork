<!--TODO O SISTEMA FOI DESENVOLVIDO E CRIADO POR 
MAYKE ALISSON MOURA FURTADO 
GRADUADO EM ANALISE E DESENVOLVIMENTO DE SISTEMAS 
-->
<?php
include ("conecta.php"); 

session_start();

$erro_usuario = isset($_GET['erro_usuario']) ? $_GET['erro_usuario'] : 0;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Inscrever-se</title> <!--TITULO DA PAGINA-->
  <link rel="icon"  href="img/favico.png">

  <!-- jquery - link cdn -->
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <!-- jquery - link local -->
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/funcao.js"></script>


  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!--CSS-->
  <link href="css/cadastro.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!--BARRA DE NAVEGAÇÃO-->
    <nav class="navbar navbar-inverse" id="barra">
      <div class="container">
        <a href="index.php">
          <span class="img-logo">S Network</span><!--LOGO SISTEMA-->
        </a>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
          <label id="possuiConta">já tem uma conta?</label>
          <a href="" id="logar">Iniciar sessão </a>
        </div>
      </div>
    </div>
    <section class="container">
      <h3>Cadastre seu perfil na S Network e aproveite ao maximo nossos serviços</h3>
    </section>
    <div class="col-md-2"></div>
    <div class="col-md-8" id="formulario"> 
      <form method="post" action="usuarioDAO.php" id="formCadastro">
        <div class="form-row">
          <!-- CAMPO NOME -->
          <div class="form-group col-md-4">
            <label for="nome">Primeiro Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required="requered" placeholder="Primeiro Nome" id="formNome">
          </div>
          <!--CAMPO EMAIL -->
          <div class="form-group col-md-8">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" id="formEmail" required="requered">
          </div>
          <!--CAMPO USUARIO / SENHA -->
          <div class="form-group col-md-6">
            <label>Usuário</label>
            <input class="form-control" type="text" name="usuario" id="" placeholder="Digite seu usuário" required>
            <?php
            if ($erro_usuario) {
             echo '<font style="color: #FF0000">Usuário já cadastrado!</font>';
           } 
           ?>
         </div>
         <div class="form-group col-md-6">
          <label for="senha">Senha:</label>
          <input type="password" class="form-control" id="senha" name="senha" size="15" maxlength="15" placeholder="Senha" required="requered">
        </div>

        <!-- CAMPO PERGUNTA -->
        <?php
        function listaPergunta($conexao){
          $perguntas = array();
          $resultadoP = mysqli_query($conexao, "select * from pergunta");
          while ($pergunta = mysqli_fetch_assoc($resultadoP)) {
            array_push($perguntas, $pergunta);
          }
          return $perguntas;
        }
        ?>        
        <div class="form-group col-md-7">
          <label for="pergunta">Pergunta</label>
          <select name="pergunta" id="pergunta" class="form-control" required="required">
            <option selected="">Escolha sua pergunta secreta</option>
            <?php
            $perguntas = listaPergunta($conexao);
            foreach ($perguntas as $pergunta) {
             ?>
             <option value="<?=$pergunta['id']?>"><?=$pergunta['pergunta']?></option>
             <?php
           }
           ?>
         </select>
       </div>

       <!-- CAMPO RESPOSTA -->
       <div class="form-group col-md-5">
        <label for="resposta">Resposta Pergunta secreta</label>
        <input class="form-control" type="text" name="resposta" id="resposta" placeholder="Digite sua resposta" required>
      </div>

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
      <!--CAMPO ESTADO -->
      <div class="form-group col-md-6">
        <label for="cod_estados">Estado</label>
        <select name="estados" id="estados" class="form-control" required="required">
          <option selected="">Selecione seu Estado</option>
          <?php 
          $estados = listaEstado($conexao);
          foreach ($estados as $estado) {
            ?>
            <option value="<?=$estado['cod_estados']?>"><?=$estado['sigla']?>-<?=$estado['nome']?></option> 
            <?php
          }
          ?>
        </select>
      </div>

      <!--CAMPO CIDADE -->
      <div class="form-group col-md-6">
        <label for="cod_cidades">Cidade</label>
        <select name="cidades" id="cidades" class="form-control" required="required">
          <option selected="">Selecione primeiro um Estado</option>
        </select>
      </div>

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
      <!--CAMPO PROFICAO 1 -->
      <div class="form-group col-md-6">
        <label for="inputProfissao">1ª Profissão</label>
        <select name="profissao" id="profissao" class="form-control" required="required">
          <option selected="">Selecione sua 1ª Profissão</option>
          <?php
          $profissoes = listaProfissao($conexao);
          foreach ($profissoes as $profissao) {
            ?>
            <option value="<?=$profissao['nome']?>"><?=$profissao['nome']?></option>
            <?php
          }
          ?>
        </select>
        <small id="" class="form-text text-muted">Obrigatório</small>
      </div>

      <!--CAMPO PROFICAO 2 -->
      <div class="form-group col-md-6">
        <label for="inputProfissao">2ª Profissão</label>
        <select name="profissao2" id="profissao" class="form-control">
          <option selected="" value="Não Possui">Selecione sua 2ª Profissão</option>
          <?php
          $profissoes = listaProfissao($conexao);
          foreach ($profissoes as $profissao) {
            ?>
            <option value="<?=$profissao['nome']?>"><?=$profissao['nome']?></option>
            <?php
          }
          ?>
        </select>
        <small id="" class="form-text text-muted">Opcional</small>
      </div>

      <!--CAMPO SEXO -->
      <div class="form-group col-md-4">
        <label for="sexo">Sexo:</label><br>
        <input class="form-check-input" type="radio" name="radio" value="M" id="formMasculino" checked="">
        <label>Masculino</label>
        <input class="form-check-input" type="radio" name="radio" value="F" id="formFeminino">
        <label>Feminino</label>
      </div>

      <!--CAMPO NASCIMENTO -->
      <script type='text/javascript'>
        function mascaraData(val) {
          var pass = val.value;
          var expr = /[0123456789]/;

          for (i = 0; i < pass.length; i++) {
    // charAt -> retorna o caractere posicionado no índice especificado
    var lchar = val.value.charAt(i);
    var nchar = val.value.charAt(i + 1);

    if (i == 0) {
      // search -> retorna um valor inteiro, indicando a posição do inicio da primeira
      // ocorrência de expReg dentro de instStr. Se nenhuma ocorrencia for encontrada o método retornara -1
      // instStr.search(expReg);
      if ((lchar.search(expr) != 0) || (lchar > 3)) {
        val.value = "";
      }

    } else if (i == 1) {

      if (lchar.search(expr) != 0) {
        // substring(indice1,indice2)
        // indice1, indice2 -> será usado para delimitar a string
        var tst1 = val.value.substring(0, (i));
        val.value = tst1;
        continue;
      }

      if ((nchar != '/') && (nchar != '')) {
        var tst1 = val.value.substring(0, (i) + 1);

        if (nchar.search(expr) != 0)
          var tst2 = val.value.substring(i + 2, pass.length);
        else
          var tst2 = val.value.substring(i + 1, pass.length);

        val.value = tst1 + '/' + tst2;
      }

    } else if (i == 4) {

      if (lchar.search(expr) != 0) {
        var tst1 = val.value.substring(0, (i));
        val.value = tst1;
        continue;
      }

      if ((nchar != '/') && (nchar != '')) {
        var tst1 = val.value.substring(0, (i) + 1);

        if (nchar.search(expr) != 0)
          var tst2 = val.value.substring(i + 2, pass.length);
        else
          var tst2 = val.value.substring(i + 1, pass.length);

        val.value = tst1 + '/' + tst2;
      }
    }

    if (i >= 6) {
      if (lchar.search(expr) != 0) {
        var tst1 = val.value.substring(0, (i));
        val.value = tst1;
      }
    }
  }

  if (pass.length > 10)
    val.value = val.value.substring(0, 10);
  return true;
}
</script>
<div class="form-group col-md-4">
  <label>Nascimento:</label>
  <input class="form-control" type="text" name="nascimento" id="nascimento" placeholder="dd/mm/aaaa" maxlength="10"  size="14"  onkeypress="mascaraData(this)" autocomplete="off" required="required" style="width: 110px">       
</div>

<!--CAMPO TELEFONE -->    
<div class="form-group col-md-4">
  <label>Telefone:</label>
  <script type="text/javascript">
   /* Máscaras ER */
   function mascara(o,f){
     v_obj=o
     v_fun=f
     setTimeout("execmascara()",1)
   }
   function execmascara(){
     v_obj.value=v_fun(v_obj.value)
   }
   function mtel(v){
      v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
      v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
     v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
     return v;
   }
   function id( el ){
     return document.getElementById( el );
   }
   window.onload = function(){
     id('telefone').onkeyup = function(){
      mascara( this, mtel );
    }
  }
</script>
<input class="form-control" type="text" name="telefone"  placeholder="(00) 00000-0000" maxlength="15" id="telefone" required="requered" style="width: 140px">
</div>
<!--INICIO TERMOS DE USO -->
<div class="checkbox col-md-12">
  <label>
    <input type="checkbox" required="requered"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Aceito os Termos do Serviços. <span class="caret"></span></a>
    <ul class="dropdown-menu">
      <h5><b> . Limitação da responsabilidade </b></h5>
      <i>Os materiais são fornecidos neste website sem nenhuma garantia explícita ou implícita. Em nenhum caso a S Network ou os seus colaboradores serão responsabilizados por quaisquer danos, incluindo lucros cessantes, interrupção de negócio, ou perda de informação que resultem do uso ou da incapacidade de usar os materiais. A S Network não garante a precisão ou integridade das informações.</i>
      <br/>
      <h5><b> . Informações enviadas pelos usuários e colaboradores</b></h5>
      <i>Qualquer informação publicadas neste site serão considerados informação não confidencial, e qualquer violação aos direitos dos seus criadores não será de responsabilidade da S Network. É terminantemente proibido transmitir, trocar ou pulbicar, através deste website, qualquer material de cunho obsceno, difamatório ou ilegal, bem como textos de terceiros sem a autorização do autor. A S Network reserva-se o direito de restringir o acesso às informações enviadas por terceiros aos seus usuários.  
      A S Network poderá, mas não é obrigado, a monitorar, revistar e restringir o acesso a qualquer área no site onde usuários transmitem e trocam informações entre si, incluindo, mas não limitado a, salas de chat, centro de mensagens ou outros foruns de debates, podendo retirar do ar ou retirar o acesso a qualquer destas informações ou comunicações.  Porém, a S Network não é responsável pelo conteúdo de qualquer uma das informações trocadas entre os usuários, sejam elas lícitas ou ilícitas.</i>
    </ul>
  </label>
</div><!-- FIM TERMOS DE USO -->
<div class="form-group"></div>
<button type="submit" class="btn btn-info" id="btnCadastro">Cadastrar</button>
</div>
</form><!--FIM DO FORMULARIO DE CADASTRO-->



</div>
<div class="col-md-2"></div>





<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>