<?php
  
	//RESPONSAVEL POR REALIZAR O INSERT DE UM NOVO USUARIO
	//NO BANCO DE DADOS, RECUPERANDO OS DADOS ENVIADO PELO FORMULARIO DE CADASTRO

function insereUsuario($conexao, $nome, $email, $senha, $estado, $cidade, $profissao, $sexo, $nascimento, $telefone)
 {
 	$query = "INSERT INTO usuario (nome, email, senha, idEstado, idCidade, idProfissao, sexo, nascimento, telefone) VALUES ('$nome', '$email', '$senha', '$estado', '$cidade', '$profissao', '$sexo', '$nascimento', '$telefone')";
 	return mysqli_query($conexao, $query);
 	echo $query;

 	
 } 

