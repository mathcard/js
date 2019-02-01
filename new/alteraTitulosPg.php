<?php 
require "modelo.php"; 
require "connect.php"; 
if (!isset($_POST['alteratitulo'])) {
    echo "Esse Título não existe. Você será redirecionado para a listagem de bens.";
    header ("refresh:3;url=listarTitulosPg.php");
}else {
    $numero=$_POST['alteratitulo'];	
    $sql= "SELECT f.nome AS nome, c.numcont AS numcont, c.parcela AS parcela,  c.datavenc AS datavenc, c.valorparc AS valorparc, c.formapg AS formapg FROM contasapagar c INNER JOIN fornecedor f ON c.idforn = f.id where c.registro=?";
    $resultado = $con->prepare($sql);
    $resultado->bindParam(1, $_POST['alteratitulo']);
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
					echo "<th><b>Fornecedor</b></th>";
					echo "<th><b>Num. Contrato</b></th>";
					echo "<th><b>Parcela</b></th>";					
					echo "<th><b>Data Venc.</b></th>";					
					echo "<th><b>Valor</b></th>";
					echo "<th><b>Descricao</b></th>";					
                    ?>
                </tr>
            </thead>
    </div>
	<tbody>
<?php
				echo "<td><b>{$row->nome}</b></td>";
                echo "<td><b>{$row->numcont}</b></td>";				
				echo "<td><b>{$row->parcela}</b></td>";				
				echo "<td><b>{$row->datavenc}</b></td>";
				echo "<td><b>{$row->valorparc}</b></td>";				
				echo "<td><b>{$row->formapg}</b></td>";				
?>
    </tbody>
    </table>
    </div>
    <div style="margin-left:33%;padding:70px 0">
        <div class="logo">Alterar Título</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" method="post" action="alteraTitulosPgin.php">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">                        
						<div class="form-group">
                            <label for="cl_desc" class="sr-only">Forma de Pagamento</label>
                            <input type="text" class="form-control" id="cl_desc" name="cl_desc" placeholder="Forma de pagamento" maxlength="20" />
                        </div>						
						<div class="form-group">
                            <label for="data_venc" class="panel panel-default">Data de Vencimento</label>
                            <input type="date" class="panel panel-default" id="data_venc" name="data_venc" placeholder="Data de vencimento" />
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
                    <a href="listarTitulosPg.php">Voltar</a>
                </div>
            </form>
        </div>
        <!-- end:Main Form -->
    </div>
    <!-- end:Main Form -->
</body>
<?php } ?>
    </html>