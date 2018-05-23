<?php

include("conecta.php");

$like_id_usuario = $_POST['like_id_usuario'];
$estrela = $_POST['estrelas'];

echo $estrela;

$sql = " UPDATE usuario SET avaliacao = {$estrela} WHERE id = $like_id_usuario ";


$resultado = mysqli_query($conexao, $sql);


if ($resultado) {
	echo $sql;
}else{
	$erro = mysqli_error($conexao);

	echo $sql;
}


?>