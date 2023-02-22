<?php

    session_start();
    ob_start();

    $_SESSION["Quantidade"]+=1;

    require_once 'conexao.php';

    $cesta = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //var_dump($cesta);
   
    $iditem = $cesta["iditem"];
    $Quantidade = $cesta["Quantidade"];

    $sql = "SELECT * from iditem WHERE codigopeca = $codigopeca LIMIT 1";
    $resultado = $conn->prepare($sql);
    $resultado -> execute();

    if(($resultado) and ($resultado->rowCount()!=0)){
        $linha=$resultado->fetch(PDO::FETCH_ASSOC);
        extract($linha);
        
        $sql2="INSERT into iditem(iditem,idcolaborador,Quantidade,Numerocontrato,preco)
        values(:codigopeca,:nome,:quantcomprada,:preco,:foto)";
        $salvar = $conn->prepare($sql2);
        $salvar->bindParam(':iditem', $iditem, PDO::PARAM_INT);
        $salvar->bindParam(':idcolaborador', $idcolaborador, PDO::PARAM_STR);
        $salvar->bindParam(':Quantidade', $Quantidade, PDO::PARAM_INT);
        $salvar->bindParam(':Numerocontrato', $Numerocontrato, PDO::PARAM_STR);
        $salvar->bindParam(':preco', $preco, PDO::PARAM_STR);
        $salvar->execute();


    } 

    header("Location:iditem.php");


?>