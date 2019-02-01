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
        <div class="logo">Listar Serviços</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" action="listarServicos.php" method="get">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="nome" class="sr-only">Pesquisar:</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do bem">
                        </div>
                    </div>
                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                       <a href='frmServicos.php'>Incluir Serviço</a>
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
                    echo "<th><a href='listarServicos.php?ordem=numcont{$pnome}'>Contrato</a></th>";
                    echo "<th><a href='listarServicos.php?ordem=idforn{$pnome}'>Fornecedor</a></th>";					
					echo "<th><a href='listarServicos.php?ordem=nome{$pnome}'>Bem</a></th>";					
					echo "<th><a href='listarServicos.php?ordem=descricao{$pnome}'>Descricão</a></th>";
					echo "<th><a href='listarServicos.php?ordem=dataexec{$pnome}'>Data Execução</a></th>";
					echo "<th><a href='listarServicos.php?ordem=valor{$pnome}'>Valor </a></th>";
					#echo "<th class='actions text-center'>Ação</th>";
                    ?>
                </tr>
            </thead>
    </div>
	<tbody>
	
            <?php
if(!empty($_GET['nome'])){
    
        $nome = "%" . $_GET['nome'] . "%";
        #$sql= "SELECT * FROM servicos WHERE upper(nome) LIKE upper(:nome)" . $ordem;
		$sql = "select s.numcont as contrato, f.nome as forn, b.nome as nome, s.descricao as descricao, s.dataexec as dataex, s.valor as valor from servicos s inner join fornecedor f on s.idforn=f.id inner join bem b on s.idbem=b.id WHERE upper(b.nome) LIKE upper(:nome)" .$ordem;
        $resultado = $con->prepare($sql);
        $resultado->bindParam(':nome', $nome, PDO::PARAM_STR);
        $resultado->execute();    
    }else{
                $sql = "select s.numcont as contrato, f.nome as forn, b.nome as nome, s.descricao as descricao, s.dataexec as dataex, s.valor as valor from servicos s inner join fornecedor f on s.idforn=f.id inner join bem b on s.idbem=b.id" .$ordem;
				#$sql= "select * from servicos  " . $ordem;
                $resultado = $con->prepare($sql);
                $resultado->execute();                
                }                
            while ($row = $resultado->fetchObject()) {
                #$id=$row->id;
                echo "<tr>";          
                echo "<td><b>{$row->contrato}</b></td>";
                echo "<td><b>{$row->forn}</b></td>";			
				echo "<td><b>{$row->nome}</b></td>";				
				echo "<td><b>{$row->descricao}</b></td>";				
				echo "<td><b>{$row->dataex}</b></td>";
				echo "<td><b>{$row->valor}</b></td>";				
                #echo "<td><a href='alteraBem.php?id=$id'>
                 #      <input type='button' name='insert' value='Editar' />
                 #      </a></td>";
                echo "</tr>";
                    }
            ?>
    </tbody>
    </table>
    </div>
    <div class="etc-login-form">
        <a href="index.php">Voltar</a>     
		<a href="listarServicos.php?apaga=1">Listar novamente</a>           
    </div>
</body>
</html>