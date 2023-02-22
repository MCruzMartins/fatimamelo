<?php

    require_once 'conexao.php';
    require_once 'head.php';


    $pagatual = filter_input(INPUT_GET, "page", FILTER_SANITIZE_NUMBER_INT);
	$pag = (!empty($pagatual)) ? $pagatual : 1;

    $limitereg = 3;

    $inicio = ($limitereg * $pag) - $limitereg;




    $busca = "SELECT nome,telefone,cpf,email,foto,função,pix from
    funcionario LIMIT $inicio , $limitereg";

    $resultado= $conn->prepare($busca);
    $resultado->execute();

    if (($resultado) AND ($resultado->rowCount() != 0)) {
?>

            <table class="table">
                    <thead>
                        <tr>

                        <th>Foto</th>
                        <th>Cpf</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th>função</th>
                        <th>pix</th>
                        
                       
                        </tr>
                    </thead>
            <tbody>

<?php
        while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
           // var_dump($linha);
            extract($linha);
            ?>
                    
                        <tr>
                            <td><img src="<?php echo $foto; ?>" style= width:150px;heigth:150px;></td>
                            <td><?php echo $cpf; ?></td>
                            <td><?php echo $nome; ?></td>
                            <td><?php echo $telefone; ?></td>
                            <td><?php echo $email; ?>
                            <td><?php echo $função; ?>
                            <td><?php echo $pix; ?>
                        </td>
                            <td> 
                                <?php echo "<a href='editar.php?cpf=$cpf'>" ; ?>                    
                                <input type="submit" class="btn btn-primary" name="editar" value="Editar">
                            </td>

                             <td>  
                                <?php echo "<a href='excluir.php?cpf=$cpf'>" ; ?>               
                                <input type="submit" class="btn btn-danger" name="excluir" value="Excluir">
                            </td>
                        </tr>
                        
                   
    <?php
        }
    ?>

        </tbody>
        </table>

<?php

    }



?>