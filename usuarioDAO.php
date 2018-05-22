<?php
include("conecta.php") ;
include("banco_usuario.php") ;

session_start();

$nome = $_POST["nome"];
$estado = $_POST["estados"];
$cidade = $_POST["cidades"];
$profissao = $_POST["profissao"];
$sexo = $_POST["radio"];
$nascimento = implode('-', array_reverse(explode('/', $_POST["nascimento"]))) ;
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$senha =md5($_POST["senha"]);


$email_existe = false;


      //VERIFICA SE O USUARIO JA EXISTE
$sql = "select *from usuario where email = '$email'";
if($resultado_id = mysqli_query($conexao, $sql)){

      $dados_usuario = mysqli_fetch_array($resultado_id);

      if(isset($dados_usuario['email'])){
            $email_existe = true;
      }

}else{
      echo "Erro ao tentar localizar o registro de usuario";
}


if ($email_existe) {

      $retorno_get = "erro_email=1&";
      header('Location: cadastro.php?'.$retorno_get);
      die();
}



if (insereUsuario($conexao, $nome, $email, $senha, $estado, $cidade, $profissao, $sexo, $nascimento, $telefone)) { 

      $novoEmail = $email;

      $sql = " SELECT * FROM usuario WHERE email = '$novoEmail' ";

      $resultado_sql = mysqli_query($conexao, $sql);

      if ($resultado_sql) {
            $dados_usuario = mysqli_fetch_array($resultado_sql);

            var_dump($dados_usuario);
      }

     /*$novoId = $id;
      $novoNome = $nome;
      $novoEmail = $email;
      $novaSenha = $senha;
      $novoEstado = $estado;
      $novoCidade = $cidade;
      $novoProfissao = $profissao;
      $novoSexo = $sexo;
      $novoNascimento = $nascimento;
      $novoTelefone = $telefone;
      $novoObservacao = $observacao;
      $novoDisponibilidade = $disponibilidade;
      $novoAvaliacao = $avaliacao;
      $novoCriacao = $criacao;
      


      $_SESSION['id'] = $novoId;
      $_SESSION['nome'] = $novoNome;
      $_SESSION['email'] = $novoEmail;
      $_SESSION['idProfissao'] = $novoProfissao;
      $_SESSION['observacao'] = $novoObservacao;
      $_SESSION['idCidade'] = $novoCidade;
      $_SESSION['idEstado'] = $novoEstado;
      $_SESSION['nascimento'] = $novoNascimento;
      $_SESSION['telefone'] = $novoTelefone;
      $_SESSION['disponibilidade'] = $novoDisponibilidade;
      $_SESSION['avaliacao'] = $novoAvaliacao;
      $_SESSION['criacao'] = $novoCriacao;


      header('Location: perfil.php');*/

      
             }else{ // CASO DER ERRO

             	$msg = mysqli_error($conexao);
             	
             } 

             mysqli_close($conexao);

             ?>

             

