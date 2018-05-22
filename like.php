<?php

include("conecta.php");

$like_id_usuario = $_POST['like_id_usuario'];

$sql = " UPDATE usuario SET avaliacao = avaliacao + 1 WHERE id = $like_id_usuario ";

mysqli_query($conexao, $sql);


?>