<?php
    require_once 'head.php';
?>

<form method="POST" action="controlecliente.php">
<div class="container bg-white">
    <div class="row">
        <div class="col-md-12 text-center">     
             <h3>Cadastro de Cliente</h3>
        </div>
    </div>

<form>
  
<div class="row">
    <div class="col-md-4"> 
        <div class="form-group">
            <label for="cpf">Cpf</label>
            <input type="text" class="form-control" name="cpf">   
        </div>
    </div>

    <div class="col-md-8"> 
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome">
        </div>
    </div>
</div>

  <div class="form-group">
    <label for="Nascimento">Nascimento</label>
    <input type="date" class="form-control" name="Nascimento">
  </div>

  <div class="form-group">
    <label for="telefone">Telefone</label>
    <input type="text" class="form-control" name="Telefone">
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="email">
  </div>

  <div class="form-group">
    <label for="senha">senha</label>
    <input type="text" class="form-control" name="senha">
  </div>

  
  <input type="submit" class="btn btn-primary" name="btncad" value="Enviar">
</form>

</div>







<?php
    require_once 'footeradm.php';
?>