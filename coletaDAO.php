<?php 

include("conecta.php");



$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$sexo = $_POST['radio'];
$nascimento =$_POST['nascimento'];
$cep = $_POST['cep'];


$sql = " insert into coleta(nome, telefone, email, sexo, nascimento, cep) values ('$nome', '$telefone', '$email', '$sexo', '$nascimento', '$cep') ";


if (mysqli_query($conexao, $sql)) {

	echo "Usuario inserido com sucesso";

}else{

	$msg = mysqli_error($conexao);
	echo $msg;

}

mysqli_close($conexao);

?>