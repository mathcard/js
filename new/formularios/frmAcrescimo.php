<?php
require "modelo.php"; 
require "connect.php";

$contrato = $_GET['id'];
?>
<div class='table-responsive col-md-12'>
        <table class='table table-striped'>
            <thead>
                <tr>

						<th>Numero do Contrato</th>
						  <th>Nome do Cliente</th>
						  <th>Data Ass.</th>
						  <th>Data Evento</th>
						  <th>Valor</th>
						  

                </tr>
            </thead>
    </div>
<?php
		$sql= "select con.num as num, cli.nome as nome, con.dataassinatura as ass, con.dataevento as ev, con.valor as valor, con.parcelascadastradas as sit from contrato con inner join cliente cli on con.idcliente=cli.id where con.num=$contrato";
            $resultado = $con->prepare($sql);
            $resultado->execute();
		
            while ($row = $resultado->fetchObject()) {
                $contrato=$row->num;				
                echo "<tr>";          
                echo "<td><b>{$row->num}</b></td>";
                echo "<td><b>{$row->nome}</b></td>";
				echo "<td><b>{$row->ass}</b></td>";
				echo "<td><b>{$row->ev}</b></td>";
				echo "<td><b>{$row->valor}</b></td>";
                echo "</tr>";
                    }
            ?>
</tbody>
</table>
</div>
<html>
<body>
 <div style="margin-left:33%;padding:1px 0">       
        <div class="panel-group">
            <form id="login-form" class="text-left" method="post" action="inAcrescimos.php">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">                        
						<br><h3><b> Inserindo Acréscimo Contrato</b></h3><br>
						<div class="row">
						<div class="col-sm-6">
							<label for="dataemi" class="panel panel-default">Data Emissão</label>
							<input type="date" class="panel panel-default" id="dataemi" name="dataemi" required />                        
						</div>
						<div class="col-sm-6">
							<label for="datavenc" class="panel panel-default">Data Vencimento</label>
							<input type="date" class="panel panel-default" id="datavenc" name="datavenc" required />
						</div>							
                        </div>	<br>
						<div class="form-group">
                            <label for="valor" class="sr-only">Valor </label>
                            <input type="number" class="form-control" id="valor" name="valor" placeholder="Valor do acréscimo" min="1" step="0.01" required />
                        </div>
						<div class="login-form">
                            <label for="formapg" class="sr-only">Forma de Pagamento</label>
                            <input type="text" class="form-control" id="formapg" name="formapg" placeholder="Forma de Pagamento Contrato" maxlength="20" required />
                        </div><br>
						<div class="login-form">
                            <label for="desc" class="sr-only">Descrição</label>
                            <input type="text" class="form-control" id="desc" name="desc" placeholder="Descrição" maxlength="50" required />
                        </div>
						
<?php							echo "<input type='hidden' name='contrato' id='contrato' value='$contrato'> "; ?>
                        </div><br>
                    <button type="submit" class="btn btn-info">Salvar</button>
                </div>
                <div class="etc-login-form">
                    <a href="acrescimo.php">Voltar</a>
                </div>
            </form>
        </div>        
    </div>
</body>	
</html>