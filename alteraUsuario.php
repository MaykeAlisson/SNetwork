<?php
//INCLUI CONEXAO COM BANCO DE DADOS
include("conecta.php") ;
//INICIA SESSÃO
session_start();

//VARIAVEIS QUE RECEBE DADOS VIA POST DO FORMULARIO
$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$estado = $_POST['estados'];
$cidade = $_POST['cidades'];
$telefone = $_POST['telefone'];
$profissao = $_POST['profissao'];
$profissao2 = $_POST['profissao2'];
$observacao = $_POST['observacao'];
$disponibilidade = $_POST['radio'];



// QUERY QUE REALIZA UPDATE DOS DADOS DO USUARIO 
$sql = "update usuario set nome = '$nome', email = '$email', idEstado = '$estado', idCidade = '$cidade', telefone = '$telefone', idProfissao = '$profissao', idProfissao2 = '$profissao2', observacao = '$observacao', disponibilidade = '$disponibilidade' where id = '$id' ";

//TESTA SE A QUERY FOI EXECUTADA
if (mysqli_query($conexao, $sql)) {

echo "Suas Informações seram atualizadas!";

unset($_SESSION['usuario']);
unset($_SESSION['senha']);

header('Location: index.php');
//CASO A QUERY NAO TENHA SEJA EXECUTADA 
}else{

	$msg = mysqli_error($conexao);

	echo $msg;
}

//FINALIZA CONEXAO
mysqli_close($conexao);

?>