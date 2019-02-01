<script type='text/javascript'>

(function()
{
  if( window.localStorage )
  {
    if( !localStorage.getItem( 'firstLoad' ) )
    {
      localStorage[ 'firstLoad' ] = true;
      window.location.reload();
    }  
    else
      localStorage.removeItem( 'firstLoad' );
  }
})();

</script>
<?php  
require "connect.php"; 

if(isset($_GET['apaga'])){
	setcookie('aux','','-1');
}
	
if (isset($_GET['ordem'])) {
    $ordem=" ORDER BY " . $_GET['ordem'];
}else {
    $ordem="";
}

if (isset($_GET['nome'])) {
   setcookie('aux',$_GET['nome'], time() + 30);
}else{
$pnome="";
}

if (isset($_COOKIE['aux'])){
    if (empty($_COOKIE['aux'])){
        $pnome="";
    }else {
        $pnome="&nome=" . $_COOKIE['aux'];
}
}else {
    $pnome="";
}
require "modelo.php";
?>
    <div style="margin-left:33%;padding:70px 0">
        <div class="logo"> Contratos com acréscimos</div>
	</div>
    <!-- Main Form -->       
    <div class="login-form-1">
            <form id="login-form" class="text-left" action="listarContAcre.php" method="get">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="nome" class="sr-only">Nome do Cliente</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                        </div>
                    </div>
                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                       <a href='listarContrato.php'>Listar Contratos</a>
                </div>
            </form>
        </div>
    </div>
    <!-- end:Main Form -->
    <div id="main" class="container-fluid">
	</div>
    <div class='table-responsive col-md-12'>
        <table class='table table-striped'>
            <thead>
                <tr>
<?php
					echo "<th><a href='listarContAcre.php?ordem=num{$pnome}'>Numero do Contrato</a></th>
						  <th><a href='listarContAcre.php?ordem=nome{$pnome}'>Nome do Cliente</a></th>
						  <th><a href='listarContAcre.php?ordem=descricao{$pnome}'>Descrição</a></th>
						  <th><a href='listarContAcre.php?ordem=valor{$pnome}'>Valor</a></th>";
?>
                </tr>
            </thead>
    </div>
	<tbody>	
<?php                  
	if(!empty($_GET['nome'])){    
        $nome = "%" . $_GET['nome'] . "%";
        $sql= "select con.num as num, cli.nome as nome, a.descricao as descricao, a.valorparc as valor from contrato con inner join cliente cli on con.idcliente=cli.id inner join acrescimo a on con.num=a.numcont WHERE upper(nome) LIKE upper(:nome)";		
        $resultado = $con->prepare($sql);
        $resultado->bindParam(':nome', $nome, PDO::PARAM_STR);
        $resultado->execute();
	}else{		
		$sql= "select con.num as num, cli.nome as nome, a.descricao as descricao, a.valorparc as valor from contrato con inner join cliente cli on con.idcliente=cli.id inner join acrescimo a on con.num=a.numcont" . $ordem;
        $resultado = $con->prepare($sql);
        $resultado->execute();
		}
        while ($row = $resultado->fetchObject()) {                
            echo "<tr>";          
            echo "<td><b>{$row->num}</b></td>";
            echo "<td><b>{$row->nome}</b></td>";
			echo "<td><b>{$row->descricao}</b></td>";				
			echo "<td><b>{$row->valor}</b></td>";				
            echo "</tr>";
        }
            ?>
    </tbody>
    </table>
    </div>
    <div class="etc-login-form">
        <br><a href="contratos.php">Voltar</a><br>
		<br><a href="listarContAcre.php?apaga=1">Listar novamente</a> <br>		
    </div>

</body>
</html>
