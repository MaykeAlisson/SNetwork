<?php
//INCLUI CONEXAO COM O BANCO DE DADOS
include('conecta.php');

//INICIA SESSÃO
session_start();
$usuario = $_SESSION['usuario'];

//QUERY RESPONSAVEL POR DELETAR USUARIO
$sql = "delete from usuario where usuario = '$usuario' ";

$execulta_sql = mysqli_query($conexao, $sql);
//DIRECIONA USUARIO 
header('Location: index.php');


?>