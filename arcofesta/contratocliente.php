<?php
    require_once 'head.php';
    require_once 'conexao.php';
?>

<form method="POST" action="contratocliente.php">
    <div class="container">
        <div class="row">
                <div class="col-md-12 text-center">
                    <h3>Formulário de Contrato</h3>
                </div>
        </div>
            
</div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="datadoevento">Data do evento</label>
                    <input type="text" name="datadoevento" class="form-control" >
                    
                </div>
        
            </div>
            <div class="col-md-2">        
                <div class="form-group">            
                    <label for="tempoevento">Tempo do Evento</label>
                    <select name="Tempo de evento">
                    <option value="">5horas</option>
                    <option value="">6horas</option>
                    <option value="">7horas</option>
                    <option value="">8horas</option>
                    <option value="">9horas</option>
                    <option value="">10horas</option>
            
                </select>
                </div>
            </div>

             <div class="col-md-2">        
                <div class="form-group">            
                    <label for="preco">Preço</label>
                    <input type="text" name="preco" class="form-control">
                </div>
            </div>
            

            <div class="col-md-2">        
                <div class="form-group">            
                    <label for="tipodoevento">Tipo do evento</label>
                    <select name="Evento">
                    <option value="">15 anos</option>
                    <option value="">Infantil</option>
                    <option value="">Casamento/Bodas</option>
                    <option value="">Empresarial</option>
                    <option value="">Escolar</option>
                    <option value="">Outros</option>
                </select>
                 
                </div>
            </div>

            <div class="col-md-2">        
                <div class="form-group">            
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" class="form-control" id="cep" onblur="pesquisacep(this.value);">
                </div>
            </div>

            <div class="col-md-2">        
                <div class="form-group">            
                    <label for="numero">Número</label>
                    <input type="text" name="numero" class="form-control">
                </div>
            </div>
            <div class="col-md-2">        
                <div class="form-group">            
                    <label for="complemento">Complemento</label>
                    <input type="text" name="complemento" class="form-control">
                </div>
            </div>
            <div class="col-md-2">        
                <div class="form-group">            
                    <label for="Nome">Quem irá recepcionar a equipe?</label>
                    <input type="text" name="Nome" class="form-control">
                </div>
            </div>
            <div class="col-md-2">        
                <div class="form-group">            
                    <label for="cpfcliente">Telefone de quem irá recepcionar</label>
                    <input type="text" name="cpfcliente" class="form-control">
                </div>
            </div>
            
            <div class="col-md-2">        
                <div class="form-group">            
                   
                    
                </div>
            </div>
        </div>
        <div class="row">
           
            <div class="col-md-3">
                <div class="form-group">
                    <label for="cor_uniforme">Cor do Uniforme</label>
                    <select name="cor_uniforme" class="form-control">
                        <?php

                            $sql = "SELECT * from contrato";
                            $resultado=$conn->prepare($sql);
                            $resultado->execute();

                            if(($resultado) && ($resultado->rowCount()!=0)){
                                while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
                                    extract($linha);

                           
                        ?>                    
                    
                    <option value="<?php echo $contrato;?>"><?php echo $contrato;  ?></option>
                        

                    <?php
                                }
                            }
                            ?>

                    </select>                


                </div>
            </div>
  
             
                   
        <div class="row">   
            <div class="col-md-10 text-right">
                <div class="form-group">
                   
                <h4> <a href="controlefinaliza"><button type="button" class="btn btn-primary">Enviar</button></a></h4> 
                </div>  
            </div>
        </div>
    </div>
  
    <script>
    alert('Contrato enviado');
    </script>;

</form>