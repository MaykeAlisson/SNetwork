<?php

include ('pdf/mpdf.php');
include('conecta.php');


$profissao = $_POST['profissao'];
$cidade = $_POST['cidade'];
$html = "";


$sql = " SELECT * FROM usuario WHERE idProfissao like '%$profissao%' OR idProfissao2 like '%$profissao%' AND idCidade LIKE '%$cidade%' ";


$resultado = mysqli_query($conexao, $sql);


	while ($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
		
		$html .= $registro['nome'] ."<br>";
		$html .= $registro['idProfissao'] ."<br>";
		$html .= $registro['idProfissao2'] ."";
		$html .= $registro['cidade'] ."<br>";
		$html .= $registro['email'] ."<br>";
		$html .= $registro['telefone'] ."<br>";
		$html .= $registro['disponibilidade'] ."<hr>";

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

