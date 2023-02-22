<?php

    session_start();
    ob_start();

    $_SESSION["quant"]+=1;

    require_once 'conexao.php';

    $cesta = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //var_dump($cesta);
   
    $idcolaborador = $cesta["idcolaborador"];

    $sql = "SELECT * from funcionario WHERE idcolaborador = $idcolaborador LIMIT 1";
    $resultado = $conn->prepare($sql);
    $resultado -> execute();

    if(($resultado) and ($resultado->rowCount()!=0)){
        $linha=$resultado->fetch(PDO::FETCH_ASSOC);
        extract($linha);
        
        $sql2="INSERT into carrinho(idcolaborador,nome,funcao,foto)
        values(:idcolaborador,:nome,:funcao,:foto)";
        $salvar = $conn->prepare($sql2);
        $salvar->bindParam(':idcolaborador', $idcolaborador, PDO::PARAM_INT);
        $salvar->bindParam(':nome', $nome, PDO::PARAM_STR);
        $salvar->bindParam(':funcao', $função, PDO::PARAM_STR);
        $salvar->bindParam(':foto', $foto, PDO::PARAM_STR);
        $salvar->execute();


    } 


    echo "<script>
    alert('Profissional adicionado com sucesso!');
    parent.location = 'marcar.php';
    </script>";
    
  
?>