<?php

    require_once 'conexao.php';
    require_once 'head.php';


    $id = filter_input(INPUT_GET, "cpf", FILTER_SANITIZE_NUMBER_INT);

    $busca = "SELECT * from funcionario where cpf = $id LIMIT 1";

    $resultado= $conn->prepare($busca);
    $resultado->execute();

    if (($resultado) AND ($resultado->rowCount() != 0)) {
        $linha = $resultado->fetch(PDO::FETCH_ASSOC);
     
        extract($linha);
       
    }
    else{
        $_SESSION['msg'] = "Funcionário não encontrado!";
        header("Location : relfuncionarios.php");
    }


?>


<form method="POST" action="controlefuncionario.php"enctype="multipart/form-data">
    <div class="container">
        <div class="row">
                <div class="col-md-12 text-center">
                    <h3>Controle de Funcionários</h3>
                </div>
        </div>

        <div class="row">
          <div class="col-md-12 text-center">
                   <img src="<?php echo $foto; ?>" style=width:150px;height:150px;>
            </div>
        </div>


        
        <div class="row">
            <div class="col-md-2">        
                <div class="form-group">            
                     <label for="cpf">Cpf</label>
                      <input type="text" name="cpf" class="form-control" onkeypress="$(this).mask('000.000.000-00');" value="<?php echo $cpf; ?>"  > 
       
                </div>
            </div>         

            <div class="col-md-2">        
                <div class="form-group">            
                    <label for="Nome">Nome</label>
                    <input type="text" name="Nome" class="form-control">
                </div>
           
            </div>
           

            <div class="col-md-3">
                <div class="form-group">
                    <label for="Telefone">Telefone</label>
                    <input type="text" name="telefone" class="form-control" onkeypress="$(this).mask('(00)00000-0000')"
                        value="<?php echo $telefone; ?>"   
                    >
                </div>
            </div>

            <div class="col-md-2">            
                <div class="form-group">
                    <label for="cep">Cep</label>
                    <input type="text" name="cep" class="form-control" id="cep" onblur="pesquisacep(this.value);"
                         value="<?php echo $cep; ?>"   
                    >                    
                </div>
    
            </div>
        </div>
        
        <div class="row">           

            <div class="col-md-3">
                <div class="form-group">
                        <label for="exampleInputEmail1">Endereço de email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Seu email"
                            value="<?php echo $email; ?>" >  
                                        
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="Função">Selecione Sua função</label><p>
                    <select name="funcao">
                        <option value="copeiro">Copeiro</option>
                        <option value="garçon">Garçon</option>
                        <option value="fritadeira">Fritadeira</option>

                    </select>
                </div>
            </div>




        </div>

        
            
        <div class="row">   
            <div class="col-md-12 text-right">
                <div class="form-group">
                   
                    <input type="submit" class="btn btn-primary" value="Enviar" name="btneditar">
                </div>  
            </div>
        </div>
    </div>
  
</form>

<?php
require_once 'footeradm.php';

?>
