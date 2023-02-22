<?php
<?php

require_once 'conexao.php';
require_once 'head.php';


$id = filter_input(INPUT_GET, "matricula", FILTER_SANITIZE_NUMBER_INT);

$sql = "DELETE From funcionario where matricula = $id Limit 1"
$resultado= $conn->prepare($sql);
$resultado->execute();

if (($resultado) AND ($resultado->rowCount() != 0)) {
    echo "<script>
    alert('Colaborador excluido!');
    parent.location = 'relfuncionarios.php';
    </script>";
 }else{
        echo "<script>
        alert('Não foi possivel excluir');
        parent.location = 'relfuncionarios.php';
        </script>";
    
}
?>