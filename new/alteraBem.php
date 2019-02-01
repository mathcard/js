<?php 
require "modelo.php"; 
require "connect.php"; 
if (!isset($_GET['id'])) {
    echo "Esse Bem não existe. Você será redirecionado para a listagem de bens.";
    header ("refresh:3;url=listarBem.php");
}else {
    $numero=$_GET['id'];
    $sql= "SELECT * FROM bem where id=?";
    $resultado = $con->prepare($sql);
    $resultado->bindParam(1, $_GET['id']);
    $resultado->execute();
    $row = $resultado->fetchObject();
?>
    <div id="main" class="container-fluid">
	</div>
    <div class='table-responsive col-md-12'>
        <table class='table table-striped'>
            <thead>
                <tr>
                <?php                    
					echo "<th><b>Código</b></th>";
                    echo "<th><b>Nome</b></th>";					
					echo "<th><b>Descricao</b></th>";					
					echo "<th><b>Data de Aquisição</b></th>";					
					echo "<th><b>Valor</b></th>";
                    ?>
                </tr>
            </thead>
    </div>
	<tbody>
<?php
				echo "<td><b>{$row->id}</b></td>";
                echo "<td><b>{$row->nome}</b></td>";				
				echo "<td><b>{$row->descricao}</b></td>";				
				echo "<td><b>{$row->dtaquisicao}</b></td>";
				echo "<td><b>{$row->valor}</b></td>";				
?>

<script>
window.onload = function(){
    document.getElementById('prnomeDiv').style.display = 'none';
    document.getElementById('prcepDiv').style.display = 'none';
    document.getElementById('prruaDiv').style.display = 'none';
    document.getElementById('prcompDiv').style.display = 'none';
    document.getElementById('prnumDiv').style.display = 'none';
    document.getElementById('prbairroDiv').style.display = 'none';
    document.getElementById('prcityDiv').style.display = 'none';
}
</script>
<script>
function esconde(field,check) {
        document.getElementById(check).onclick = function () {
            if (!this.checked)
                document.getElementById(field).style.display = 'none';
            else
                document.getElementById(field).style.display = 'block';  
        }
    }
</script>

    </tbody>
    </table>
    </div>
    <div style="margin-left:33%;padding:70px 0">
        <div class="logo">Alterar Bem</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" method="post" action="alteraBemin.php">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="cl_nome" class="sr-only">Nome</label>
                            <input type="text" class="form-control" id="cl_nome" name="cl_nome" placeholder="Nome" maxlength="50"   />
                        </div>						
						<div class="form-group">
                            <label for="cl_desc" class="sr-only">Descricao</label>
                            <input type="text" class="form-control" id="cl_desc" name="cl_desc" placeholder="Descricao" maxlength="80" />
                        </div>						
						<div class="form-group">
                            <label for="cl_aquis" class="panel panel-default">Data de Aquisição</label>
                            <input type="date" class="panel panel-default" id="cl_aquis" name="cl_aquis" placeholder="Data de aquisição" />
                        </div>
						<div class="form-group">
                            <label for="cl_valor" class="sr-only">Valor</label>
                            <input type="number" class="form-control" id="cl_valor" name="cl_valor" placeholder="Valor" min="1" step="0.01" />
                        </div>						                                                                                                                       
                        <?php echo "<input type='hidden' id='numero' name='numero' value='{$numero}'/>"; ?>
                    </div>
                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <a href="listarBem.php">Voltar</a>
                </div>
            </form>
        </div>
        <!-- end:Main Form -->
    </div>
    <!-- end:Main Form -->
</body>
<?php } ?>
    </html>