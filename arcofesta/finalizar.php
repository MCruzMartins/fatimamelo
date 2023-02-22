<?php

    session_start();
    ob_start();

    require_once 'head.php';
    require_once 'conexao.php';

    $totalgeral = 0;


    $busca = "SELECT * from carrinho";       

    $resultado= $conn->prepare($busca);
    $resultado->execute();

    if (($resultado) AND ($resultado->rowCount() != 0)) {
?>
    <h1 class="text-center">Serviços Selecionados</h1>

    <form method="post" action="finalizar.php">
            <table class="table">
                    <thead>
                        <tr>
                        <th>Imagem</th>                        
                        <th>Nome</th>   
                        <th>Função</th>              
                       
                        </tr>
                    </thead>
            <tbody>

<?php
        while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
           // var_dump($linha);
            extract($linha);
            ?>
                    
                        <tr>
                            <td><img src="<?php echo $foto; ?>" style=width:150px;height:150px;></td>
                            <td><?php echo $nome; ?></td>
                            <td><?php echo $funcao; ?></td>
                            <td>  
                                 <input type="hidden" name="idcolaborador" value="<?php echo $idcolaborador; ?>">          
                                <input type="submit" class="btn btn-danger" name="excluir" value="Excluir">
                            </td>
                        </tr>
                        
                   
    <?php
        }
    ?>

        </tbody>
        </table>
        </h5>
        <h4> <a href="contratocliente.php"><button type="button" class="btn btn-primary">Finalizar Contrato</button></a></h4> 
    </form>

<?php


    }



?>
