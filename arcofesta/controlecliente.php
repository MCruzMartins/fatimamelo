<?php

    include_once 'conexao.php';

    $dadoscad = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    var_dump($dadoscad);

		if(!empty($dadoscad["btncad"])){
           
            

            $vazio = false;

            $dadoscad = array_map('trim', $dadoscad);
            if (in_array("", $dadoscad)) {
                $vazio = true;
               
                echo "<script>
                alert('Preencher todos os campos!');
                parent.location = 'formulariocliente.php';
                </script>";

            } else if(!filter_var($dadoscad['email'], FILTER_VALIDATE_EMAIL)) {
                $vazio = true;
                echo "<script>
                alert('Informe um email válido!');
                parent.location = 'formulariocliente.php';
                </script>";
            }
            
            if(!$vazio){

            
            $senha = password_hash($dadoscad['senha'], PASSWORD_DEFAULT);

            $sql = "insert into cliente(cpf,nome,nascimento,telefone,
           email,senha)values
            (:cpf,:nome,:nascimento,:telefone,:email,
            :senha)";

        	$salvar= $conn->prepare($sql);
            $salvar->bindParam(':cpf', $dadoscad['cpf'], PDO::PARAM_STR);
            $salvar->bindParam(':nome', $dadoscad['nome'], PDO::PARAM_STR);
            $salvar->bindParam(':nascimento', $dadoscad['Nascimento'], PDO::PARAM_STR);
            $salvar->bindParam(':telefone', $dadoscad['Telefone'], PDO::PARAM_STR);
            $salvar->bindParam(':email', $dadoscad['email'], PDO::PARAM_STR);
            $salvar->bindParam(':senha', $senha, PDO::PARAM_STR);
            $salvar->execute();

            if ($salvar->rowCount()) {
                echo "<script>
                alert('Cadastrado com Sucesso!');
                parent.location = 'formulariocliente.php';
                </script>";
                unset($dadoscad); 
            } else {
                echo "<script>
                alert('Erro : Usuário não cadastrado!');
                parent.location = 'formulariocliente.php';
                </script>";
		    
            }

        }

        }


        if(!empty($dadoscad["btncad"])){
           
            // var_dump($dadoscad);
 
             $vazio = false;
 
             $dadoscad = array_map('trim', $dadoscad);
            
             if(!filter_var($dadoscad['email'], FILTER_VALIDATE_EMAIL)) {
                 $vazio = true;
                 echo "<script>
                 alert('Informe um email válido!');
                 parent.location = 'formulariocliente.php';
                 </script>";
             }
             
             if(!$vazio){
 

 $sql = "UPDATE cliente set cpf = :cpf, nome = :nome, nascimento= :nascimento,
        telefone = :telefone, email = :email, senha = :senha, 
        WHERE cpf =:email";
         
        $salvar= $conn->prepare($sql);
            $salvar->bindParam(':cpf', $dadoscad['cpf'], PDO::PARAM_STR);
            $salvar->bindParam(':nome', $dadoscad['nome'], PDO::PARAM_STR);
            $salvar->bindParam(':nascimento', $dadoscad['nascimento'], PDO::PARAM_STR);
            $salvar->bindParam(':telefone', $dadoscad['telefone'], PDO::PARAM_STR);
            $salvar->bindParam(':email', $dadoscad['email'], PDO::PARAM_STR);
            $salvar->bindParam(':senha', $dadoscad['senha'], PDO::PARAM_INT);
          
            if ($salvar->rowCount()) {
                echo "<script>
                alert('Dados Atualizados!');
                parent.location = 'relcliente.php';
                </script>";
                unset($dadoscad); 
            } else {
                echo "<script>
                alert('Erro : Funcionário não encontrado!');
                parent.location = 'relcliente.php';
                </script>";
            }


        }
    }

?>

      
