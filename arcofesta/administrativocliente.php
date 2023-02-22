<?php
    require_once 'head.php';  	
    include_once 'conexao.php';
  
    session_start();
	ob_start();

  
  ?>
<div class="container-fluid cli">
  <h1 class="text-center">Área do Cliente</h1>

  <?php include_once 'menucli.php';?>
  <?php
    echo "Bem vindo(a)" . $_SESSION['nome'];
    if(!isset($_SESSION['nome'])){
        $_SESSION['msg'] = "Erro: Necessário realizar o login para acessar a página!";
        header("Location: logincliente.php");
    }
?>

<h4>

<a href="marcar.php"><button type="submit">Agendar Serviço</button></a>

<!--
    <a href="formulariocliente.php"><button type="submit">Cadastro</button></a>
    <a href="relclientes.php"><button type="submit">Relatório de clientes</button></a>
    <a href="agendaclientes.php"><button type="submit">Agenda</button></a>
    <a href="sair.php"><button type="submit">Sair</button></a>-->

</h4>

</div>


