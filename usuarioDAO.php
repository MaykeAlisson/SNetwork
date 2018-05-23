<?php

include("conecta.php") ;

session_start();


$nome = $_POST['nome'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
$senha =md5($_POST['senha']);
$pergunta = $_POST['pergunta'];
$resposta = $_POST['resposta'];
$estado = $_POST['estados'];
$cidade = $_POST['cidades'];
$profissao = $_POST['profissao'];
$profissao2 = $_POST['profissao2'];
$sexo = $_POST['radio'];
$nascimento = implode('-', array_reverse(explode('/', $_POST["nascimento"]))) ;
$telefone = $_POST['telefone'];



$usuario_existe = false;


      //VERIFICA SE O USUARIO JA EXISTE
$sql = "select *from usuario where usuario = '$usuario'";
if($resultado_id = mysqli_query($conexao, $sql)){

  $dados_usuario = mysqli_fetch_array($resultado_id);

  if(isset($dados_usuario['usuario'])){
    $usuario_existe = true;
  }

}else{
  echo "Erro ao tentar localizar o registro de usuario";
}


if ($usuario_existe) {

  $retorno_get = "erro_usuario=1&";
  header('Location: cadastro.php?'.$retorno_get);
  die();
}





$sql = " insert into usuario(nome, email, usuario, senha, idPergunta, resposta, idEstado, idCidade, idProfissao, idProfissao2, sexo, nascimento, telefone) values ('$nome', '$email', '$usuario', '$senha', '$pergunta', '$resposta', '$estado', '$cidade', '$profissao', '$profissao2', '$sexo', '$nascimento', '$telefone') ";


if (mysqli_query($conexao, $sql)) {
  
  $query = " select *from usuario where usuario = '$usuario' ";
  $consulta = mysqli_query($conexao, $query);

  $dadosUsuario = mysqli_fetch_array($consulta);


  if (isset($dadosUsuario['usuario'])) {
    
    $_SESSION['id'] = $dadosUsuario['id'];
    $_SESSION['nome'] = $dadosUsuario['nome'];
    $_SESSION['usuario'] = $dadosUsuario['usuario'];
    $_SESSION['email'] = $dadosUsuario['email'];
    $_SESSION['idProfissao'] = $dadosUsuario['idProfissao'];
    $_SESSION['idProfissao2'] = $dadosUsuario['idProfissao2'];
    $_SESSION['observacao'] = $dadosUsuario['observacao'];
    $_SESSION['idCidade'] = $dadosUsuario['idCidade'];
    $_SESSION['idEstado'] = $dadosUsuario['idEstado'];
    $_SESSION['nascimento'] = $dadosUsuario['nascimento'];
    $_SESSION['telefone'] = $dadosUsuario['telefone'];
    $_SESSION['disponibilidade'] = $dadosUsuario['disponibilidade'];
    $_SESSION['avaliacao'] = $dadosUsuario['avaliacao'];
    $_SESSION['criacao'] = $dadosUsuario['criacao'];

    header('Location: perfil.php');

  }else{

    header('Location: index.php?erro=1');

  }

}else{

  $msg = mysqli_error($conexao);
  echo $msg;

}

mysqli_close($conexao);

?>



