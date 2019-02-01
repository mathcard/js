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
#antiga T02.php
require "modelo.php";
require "connect.php"; 

if(empty($_COOKIE['armaz_formapg'])){
	$op = $_POST['formapg'];
	setcookie("armaz_formapg", $op);	
}else{
	$op = $_COOKIE['armaz_formapg'];
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

if($op=='todos'){
	$sql ="select p.registro as registro, c.nome as nome, p.numcont as numcont, p.parcela as parcela, p.valorparc as valorparc, p.dataemissao as dataemissao, p.datavenc as datavenc, p.datapg as datapg, p.valorreb as valorreb from parcelas p inner join contrato con on p.numcont = con.num inner join cliente c on c.id = con.idcliente" .$ordem;
	
	$sql2="select p.registro as registro, c.nome as nome, p.numcont as numcont, p.parcela as parcela, p.valorparc as valorparc, p.dataemissao as dataemissao, p.datavenc as datavenc, p.datapg as datapg, p.valorreb as valorreb from parcelas p inner join contrato con on p.numcont = con.num inner join cliente c on c.id = con.idcliente WHERE upper(nome) LIKE upper(:nome)";
	
}elseif($op=='baixados'){
	$sql ="select p.registro as registro, c.nome as nome, p.numcont as numcont, p.parcela as parcela, p.valorparc as valorparc, p.dataemissao as dataemissao, p.datavenc as datavenc, p.datapg as datapg, p.valorreb as valorreb from parcelas p inner join contrato con on p.numcont = con.num inner join cliente c on c.id = con.idcliente where datapg is not null " .$ordem;
	
	$sql2="select p.registro as registro, c.nome as nome, p.numcont as numcont, p.parcela as parcela, p.valorparc as valorparc, p.dataemissao as dataemissao, p.datavenc as datavenc, p.datapg as datapg, p.valorreb as valorreb from parcelas p inner join contrato con on p.numcont = con.num inner join cliente c on c.id = con.idcliente WHERE upper(nome) LIKE upper(:nome) and datapg is not null";
}elseif($op=='abertos'){
	$sql ="select p.registro as registro, c.nome as nome, p.numcont as numcont, p.parcela as parcela, p.valorparc as valorparc, p.dataemissao as dataemissao, p.datavenc as datavenc, p.datapg as datapg, p.valorreb as valorreb from parcelas p inner join contrato con on p.numcont = con.num inner join cliente c on c.id = con.idcliente where datapg is null" .$ordem;
	
	$sql2="select p.registro as registro, c.nome as nome, p.numcont as numcont, p.parcela as parcela, p.valorparc as valorparc, p.dataemissao as dataemissao, p.datavenc as datavenc, p.datapg as datapg, p.valorreb as valorreb from parcelas p inner join contrato con on p.numcont = con.num inner join cliente c on c.id = con.idcliente WHERE upper(nome) LIKE upper(:nome) and datapg is null";
	#$sql="select * from parcelas where datapg is null order by(registro)";		
}

?>    

<div style="margin-left:33%;padding:70px 0">
        <div class="logo">Todos os Contratos</div>
	</div>
    <!-- Main Form -->       
    <div class="login-form-1">
            <form id="login-form" class="text-left" action="listaTitulosRec2.php" method="get">
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
                       <a href='frmContrato.php'>Incluir Contrato</a>
                </div>
            </form>
        </div>
<!-- end:Main Form -->
    <div class='table-responsive col-md-12'>
        <table class='table table-striped'>
            <thead>
                <tr>
<?php
                    echo "<th><a href='listaTitulosRec2.php?ordem=registro{$pnome}'>Registro</a></th>";
					echo "<th><a href='listaTitulosRec2.php?ordem=nome{$pnome}'>Nome</a></th>";
                    echo "<th><a href='listaTitulosRec2.php?ordem=numcont{$pnome}'>Num. Contrato</a></th>";
					echo "<th><a href='listaTitulosRec2.php?ordem=parcela{$pnome}'>Parcela</a></th>";
					echo "<th><a href='listaTitulosRec2.php?ordem=valorparc{$pnome}'>Valor</a></th>";
					echo "<th><a href='listaTitulosRec2.php?ordem=dataemissao{$pnome}'>Emissão</a></th>";
					echo "<th><a href='listaTitulosRec2.php?ordem=datavenc{$pnome}'>Vencimento</a></th>";
					echo "<th><a href='listaTitulosRec2.php?ordem=datapg{$pnome}'>Data PG</a></th>";
					echo "<th><a href='listaTitulosRec2.php?ordem=valorreb{$pnome}'>Valor Recebido</a></th>";							
                    if($op=='abertos'){
						echo "<th class='actions text-center'>Ação</th>";
					}
?>
                </tr>
            </thead>
    </div>
	<tbody>	
<?php
if(!empty($_GET['nome'])){    
        $nome = "%" . $_GET['nome'] . "%";
        #$sql= "SELECT * FROM cliente WHERE upper(nome) LIKE upper(:nome)" . $ordem;
        $resultado = $con->prepare($sql2);
        $resultado->bindParam(':nome', $nome, PDO::PARAM_STR);
        $resultado->execute();        
    }else{        
		$resultado = $con->prepare($sql);
		$resultado->execute();
		}                
        while ($row = $resultado->fetchObject()) {
            $id=$row->registro;
            echo "<tr>";          
            echo "<td><b>{$row->registro}</b></td>";
            echo "<td><b>{$row->nome}</b></td>";
			echo "<td><b>{$row->numcont}</b></td>";
			echo "<td><b>{$row->parcela}</b></td>";
			echo "<td><b>{$row->valorparc}</b></td>";
			echo "<td><b>{$row->dataemissao}</b></td>";
			echo "<td><b>{$row->datavenc}</b></td>";
			echo "<td><b>{$row->datapg}</b></td>";				
			echo "<td><b>{$row->valorreb}</b></td>";		
            if($op=='abertos'){
			echo "<td><a href='baixaTitulos.php?id=$id'>
                   <input type='button' name='insert' value='Baixar' />
					</a></td>"; }
            echo "</tr>";
            }
?>
    </tbody>
    </table>
    </div>
    <div class="etc-login-form">
        <a href="opTitulosRec.php">Voltar</a>  
		<br><a href="listaTitulosRec2.php" onClick="SetCookies('aux','','-1')">Listar novamente</a><br>          
    </div>
</body>
</html>