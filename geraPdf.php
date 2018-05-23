<?php

include ('pdf/mpdf.php');
include('conecta.php');


$profissao = $_POST['profissao'];
$cidade = $_POST['cidade'];
$html = "";


$sql = "SELECT * FROM usuario WHERE idProfissao OR idProfissao2 = '$profissao' AND idCidade like '%$cidade%' ";

$resultado = mysqli_query($conexao, $sql);


	while ($registro = mysqli_fetch_assoc($resultado)) {
		$html .= '<li> Nome: '.$registro['nome']. '<br> 1ª Profissão: '.$registro['idProfissao'].'<br> 2º Profissão: '.$registro['idProfissao2']. ' <br>Cidade: '.$registro['idCidade']. '<br> e-mail: '.$registro['email']. '<br> Telefone: '.$registro['telefone']. '<br> Status: '.$registro['disponibilidade']. "</li><hr>";
	}

	

	$pagina = '
				<html>
					<body>
						<h1 style="text-align: center;">Relatório de Profissionais S Network</h1>
						'.$html.'
						<h4 style="text-align: center;">Fonte: http://www.snetwork.com.br</h4>
					</body>
				</html>
		   	  ';
	


$arquivo = "Profissionais01.pdf";

$mpdf = new mPDF();
$mpdf->WriteHTML($pagina);

$mpdf->Output($arquivo, 'I');



?>

