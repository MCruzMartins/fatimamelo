<?php

    require_once 'conexao.php';
    require_once 'head.php';


    $pagatual = filter_input(INPUT_GET, "page", FILTER_SANITIZE_NUMBER_INT);
	$pag = (!empty($pagatual)) ? $pagatual : 1;

    $limitereg = 3;

    $inicio = ($limitereg * $pag) - $limitereg;




    $busca = "SELECT idcolaborador,nome,telefone,cpf,email,foto,função,pix from
    funcionario LIMIT $inicio , $limitereg";

    $resultado= $conn->prepare($busca);
    $resultado->execute();
    ?>    

    <div class="container-fluid imagens">
    <div class="row">
    <?php       
    while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {           
        extract($linha);                          
    
    ?>     
           <a href="finalizar.php"><button type="button" class="btn btn-primary">Finalizar Contrato</button></a>
    
        <div class="col-md-3 text-center">
                <img src="<?php echo $foto; ?>" style=width:18rem;height:18rem;>                    
                    <h4><?php echo $nome; ?></h4>
                    <h5>Função: <?php echo $função; ?></h5>  
                    <form action="carrinhocliente.php" method="post">
        
                     
                      <input type="hidden" name="idcolaborador" value="<?php echo $idcolaborador; ?>">
                    <input type="submit" class="btn btn-primary" value="Selecionar">
                    
                   </form>

        </div>
                     

        <?php      
    
    }     
    
  
        
        ?>


    </div>
  </div>
























   