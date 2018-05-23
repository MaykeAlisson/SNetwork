<?php

include('conecta.php');


session_start();
$usuario = $_SESSION['usuario'];


$sql = "delete from usuario where usuario = '$usuario' ";

$execulta_sql = mysqli_query($conexao, $sql);

header('Location: index.php');


?>