<?php
include ("conecta.php");

// ESTE CODIGO E RESPONSAVEL POR USAR O ID DO ESTADO SELECIONADO E BUSCAR
// AS CIDADES RELACIONADAS A ESTE ESTADO,
// E CRIAR OS OPTION COM ESTAS CIDADES 

$id = $_GET['id'];
$sql = mysqli_query($conexao, " select * from cidades where estados_cod_estados='$id' order by nome");
while ($row = mysqli_fetch_array($sql)) {
	$nome = $row['nome'];
	$id = $row['cod_cidades'];

	echo '<option value="'.$nome.'" class="cidades">'.$nome.'</option>';
}
?>