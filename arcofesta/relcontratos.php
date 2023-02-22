



<?php

    require_once 'conexao.php';
    require_once 'head.php';

    ?>


<h1 class="text-center">Relatorio de Contratos </h1>


<?php


    $pagatual = filter_input(INPUT_GET, "page", FILTER_SANITIZE_NUMBER_INT);
	$pag = (!empty($pagatual)) ? $pagatual : 1;

    $limitereg = 3;

    $inicio = ($limitereg * $pag) - $limitereg;




    $busca = "SELECT contrato.Númerocontrato,funcionario.nome as func,cliente.nome,contrato.Dataevento,contrato.preco,contrato.Tipoevento,contrato.cep,contrato.numero,
    contrato.complemento,contrato.cor_uniforme,contrato.Tempo_evento
     from contrato,funcionario,cliente
     where
     funcionario.idcolaborador = contrato.idcolaborador and
     contrato.cpf=cliente.cpf 
     LIMIT $inicio , $limitereg";

    $resultado= $conn->prepare($busca);
    $resultado->execute();

    if (($resultado) AND ($resultado->rowCount() != 0)) {
?>

            <table class="table">
                    <thead>
                        <tr>

                        <th>Contrato</th>
                        <th>Colaborador</th>
                        <th>Cliente</th>
                        <th>Data</th>
                        <th>Preço</th>
                        <th>Evento</th>
                        <th>Cep</th>
                        <th>Numero</th>
                        <th>Complemento</th>
                       
                        <th>Uniforme</th>
                        <th>Tempo</th>
                        
                       
                        </tr>
                    </thead>
            <tbody>

<?php
        while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
          
            extract($linha);
            ?>
                    
                        <tr>
                            <td><?php echo $Númerocontrato; ?></td>
                            <td><?php echo $func; ?></td>
                            <td><?php echo $nome; ?></td>
                            <td><?php echo $Dataevento; ?></td>
                            <td><?php echo $preco; ?>
                            <td><?php echo $Tipoevento; ?>
                            <td><?php echo $cep; ?>
                            <td><?php echo $numero; ?>
                            <td><?php echo $complemento; ?>
                            <td><?php echo $cor_uniforme; ?>
                            <td><?php echo $Tempo_evento; ?>
                        </td>
                            <td> 
                                <?php echo "<a href='editar.php?contrato=$Númerocontrato'>" ; ?>                    
                                <input type="submit" class="btn btn-primary" name="editar" value="Editar">
                            </td>

                             <td>  
                                <?php echo "<a href='excluir.php?contrato=$Númerocontrato'>" ; ?>               
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