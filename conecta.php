<?php 

$conexao = mysqli_connect('localhost', 'root', 'jesus', 'snetwork');// REALIZA A CONEXAO COM O BANCO

mysqli_set_charset($conexao, 'utf8');// DEFINE O TIPO DE CARACTERES UTILIZADOS 


// TESTE DE ERRO DE CONEXAO
if (mysqli_connect_errno()) {
	echo "Erro ao tentar se conectar ao Banco de Dados".mysqli_connect_errno();
} 

?>