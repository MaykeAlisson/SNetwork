<?php

include ("conecta.php");


$nomeServico = $_POST['nomeServico'];
$nomeLocal = $_POST['nomeLocal'];

//////////////////////////////////////////////////////////////////////
//======== recupera os parâmetros para definir a quantidade de registros por página =======//
$registros_por_pagina = $_POST['registros_por_pagina'];
$offset = $_POST['offset'];
//////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////////////
//======== recupera o total de registros com base no filtro =======//
$sql = " SELECT COUNT(*) as total_registros FROM usuario WHERE 1=1 ";
$sql.= $nomeServico != "" ? " AND idProfissao LIKE '%$nomeServico%' OR idProfissao2 LIKE '%$nomeServico%' " : "";
$sql.= $nomeLocal != "" ? " AND idCidade  Like '$nomeLocal' " : "";

$resultado_id = mysqli_query($conexao, $sql);

if($resultado_id){
    $registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
    $total_registros = $registro['total_registros'];
} else {
    echo 'Erro ao tentar recuperar o total de registros!';
}


//
//////////////////////////////////////////////////////////////////////

$sql = " SELECT * FROM usuario WHERE 1=1 ";
$sql.= $nomeServico != "" ? " AND idProfissao LIKE '%$nomeServico%' OR idProfissao2 LIKE '%$nomeServico%' " : "";
$sql.= $nomeLocal != "" ? " AND idCidade LIKE '%$nomeLocal%' " : "";

$sql.=" LIMIT $registros_por_pagina OFFSET $offset ";

//echo $sql; //descomentar para exibir a query para efetuar testes

$resultado_id = mysqli_query($conexao, $sql);



if ($resultado_id) {

	while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)) {
		echo '<div class=" cardUser col-md-12">
        <div class="cardNome">
        <span style="word-spacing: -6px;">'.$registro['nome'].'</span>
        </div>
        <div class="cardPro">
        <span class="glyphicon glyphicon-education" style="word-spacing: -7px;"> '.$registro['idProfissao'].'</span>
        <span class="cardPro2 glyphicon glyphicon-education" style="word-spacing: -7px;"> '.$registro['idProfissao2'].'</span>
        </div>
        <div class="cardInfo">
        <ul class="cardUl">
        <li class="cardLi">
        <span class="cardValue glyphicon glyphicon-globe"> '.$registro['idCidade'].'</span>
        <span class="cardValue glyphicon glyphicon-earphone" id="tel"> '.$registro['telefone'].'</span>
        </li>
        </ul>
        <div class="estrelas">
        <ul class="cardUl">
        <li class="cardLi">
        <span class="cardLabel">Status:</span>
        <span class="cardValue"> '.$registro['disponibilidade'].'</span>
        </li>
        <li class="cardLi">
        <span class="cardLabel">Especialização:</span>     
        <span class="cardValue"> '.$registro['observacao'].'</span>         
        </li>          
        </ul>
        </div>
        </div>
        </div>
        ';
    }

     //como o offset (página) inicia em zero, ajusto para que visualmente seja indicado o início em seu respectivo valor +1
     $offset++;
     //descobre a quantidade de páginas com base no total de registros / dividido pela quantidade de registros por página
     $total_paginas = ceil($total_registros / $registros_por_pagina); // a função ceil() arredonda o resultado para o inteiro superior mais próximo
     echo "Página ".ceil($offset / $registros_por_pagina)." de $total_paginas Total de registros: $total_registros";

     echo "<br />";

     //cria os links de paginação
     $pagina_atual = ceil($offset / $registros_por_pagina); //localiza a pagna atual

     for($i = 1; $i <= $total_paginas; $i++) {    
        
        $classe_botao = $pagina_atual == $i ? 'btn-primary' : 'btn-default'; //aplica a classe para o botão da página atual
        echo '<button class="btn '.$classe_botao.' paginar" data-pagina_clicada="'.$i.'">'.$i.'</button>';
     }

     echo "<br /><br />";  

    
}else{
    $msg = mysqli_error($conexao);
	echo $msg;
}

?>
