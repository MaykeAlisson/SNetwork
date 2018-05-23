<?php

session_start();

include ("conecta.php"); 

$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);


$usuario = mysqli_real_escape_string($conexao, $usuario);

$sql = " SELECT * FROM usuario where usuario = '$usuario' and senha = '$senha' ";

$resultado_sql = mysqli_query($conexao, $sql);

if ($resultado_sql) {
	$dados_usuario = mysqli_fetch_array($resultado_sql);

	if (isset($dados_usuario['usuario'])) {

		$_SESSION['id'] = $dados_usuario['id'];
		$_SESSION['nome'] = $dados_usuario['nome'];
		$_SESSION['usuario'] = $dados_usuario['usuario'];
		$_SESSION['email'] = $dados_usuario['email'];
		$_SESSION['idProfissao'] = $dados_usuario['idProfissao'];
		$_SESSION['idProfissao2'] = $dados_usuario['idProfissao2'];
		$_SESSION['observacao'] = $dados_usuario['observacao'];
		$_SESSION['idCidade'] = $dados_usuario['idCidade'];
		$_SESSION['idEstado'] = $dados_usuario['idEstado'];
		$_SESSION['nascimento'] = $dados_usuario['nascimento'];
		$_SESSION['telefone'] = $dados_usuario['telefone'];
		$_SESSION['disponibilidade'] = $dados_usuario['disponibilidade'];
		$_SESSION['avaliacao'] = $dados_usuario['avaliacao'];
		$_SESSION['criacao'] = $dados_usuario['criacao'];

		header('Location: perfil.php');

	}else{
		header('Location: index.php?erro=1');
	}
}else{
	echo "Erro na execuçao da consulta, favor entrar em contato com o admin do site";
}


?>