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
        <div class="logo">Listar Clientes</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" action="listarCliente.php" method="get">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="nome" class="sr-only">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                        </div>
                    </div>
                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                       <a href='frmCliente.php'>Incluir Cliente</a>
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
                    echo "<th><a href='listarCliente.php?ordem=id{$pnome}'>Código</a></th>";
                    echo "<th><a href='listarCliente.php?ordem=nome{$pnome}'>Nome</a></th>";
					echo "<th><a href='listarCliente.php?ordem=profissao{$pnome}'>Profissão</a></th>";
					echo "<th><a href='listarCliente.php?ordem=rg{$pnome}'>RG</a></th>";
					echo "<th><a href='listarCliente.php?ordem=cpf{$pnome}'>CPF</a></th>";
					echo "<th><a href='listarCliente.php?ordem=fone1{$pnome}'>Telefone 1</a></th>";
					echo "<th><a href='listarCliente.php?ordem=fone2{$pnome}'>Telefone 2</a></th>";
					echo "<th><a href='listarCliente.php?ordem=email{$pnome}'>Email</a></th>";		
					echo "<th><a href='listarCliente.php?ordem=cep{$pnome}'>CEP</a></th>";
                    echo "<th><a href='listarCliente.php?ordem=logradouro{$pnome}'>Logradouro</a></th>";
                    echo "<th><a href='listarCliente.php?ordem=numero{$pnome}'>Numero</a></th>";
                    echo "<th><a href='listarCliente.php?ordem=complemento{$pnome}'>Complemento</a></th>";
                    echo "<th><a href='listarCliente.php?ordem=bairro{$pnome}'>Bairro</a></th>";
                    echo "<th><a href='listarCliente.php?ordem=cidade{$pnome}'>Cidade</a></th>";
                    echo "<th class='actions text-center'>Ação</th>";
                    ?>
                </tr>
            </thead>
    </div>
	<tbody>	
            <?php
if(!empty($_GET['nome'])){    
        $nome = "%" . $_GET['nome'] . "%";
        $sql= "SELECT * FROM cliente WHERE upper(nome) LIKE upper(:nome)" . $ordem;
        $resultado = $con->prepare($sql);
        $resultado->bindParam(':nome', $nome, PDO::PARAM_STR);
        $resultado->execute();           
    }else{
                $sql= "select * from cliente " . $ordem;
                $resultado = $con->prepare($sql);
                $resultado->execute();
                #$total = $resultado->rowCount();
                }
                
            while ($row = $resultado->fetchObject()) {
                $id=$row->id;
                echo "<tr>";          
                echo "<td><b>{$row->id}</b></td>";
                echo "<td><b>{$row->nome}</b></td>";
				echo "<td><b>{$row->profissao}</b></td>";
				echo "<td><b>{$row->rg}</b></td>";
				echo "<td><b>{$row->cpf}</b></td>";
				echo "<td><b>{$row->fone1}</b></td>";
				echo "<td><b>{$row->fone2}</b></td>";
				echo "<td><b>{$row->email}</b></td>";
                echo "<td><b>{$row->cep}</b></td>";
                echo "<td><b>{$row->logradouro}</b></td>";
                echo "<td><b>{$row->numero}</b></td>";
                echo "<td><b>{$row->complemento}</b></td>";
                echo "<td><b>{$row->bairro}</b></td>";
                echo "<td><b>{$row->cidade}</b></td>";
                echo "<td><a href='alteraCliente.php?id=$id'>
                       <input type='button' name='insert' value='Editar' />
                       </a></td>";
                echo "</tr>";
                    }
            ?>
    </tbody>
    </table>
    </div>
    <div class="etc-login-form">
        <a href="index.php">Voltar</a>                
		<a href="listarCliente.php?apaga=1">Listar novamente</a> 
		<!--<a href="listarCliente.php?apaga=1" onClick="SetCookies('aux','','-1')">Listar novamente</a> -->
    </div>
</body>
</html>