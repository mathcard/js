<?php 
require "modelo.php"; 
require "connect.php"; 
if (!isset($_GET['id'])) {
    echo "Esse cliente não existe. Você será redirecionado para a listagem de clientes.";
    header ("refresh:3;url=listarCliente.php");

}else {
    $numero=$_GET['id'];
    $sql= "SELECT * FROM cliente where id=?";
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
					echo "<th><b>Profissão</b></th>";
					echo "<th><b>RG</b></th>";
					echo "<th><b>CPF</b></th>";
					echo "<th><b>Telefone 1</b></th>";
					echo "<th><b>Telefone 2</b></th>";
					echo "<th><b>Email</b></th>";		
					echo "<th><b>CEP</b></th>";
                    echo "<th><b>Logradouro</b></th>";
                    echo "<th><b>Numero</b></th>";
                    echo "<th><b>Complemento</b></th>";
                    echo "<th><b>Bairro</b></th>";
                    echo "<th><b>Cidade</b></th>";
                    ?>
                </tr>
            </thead>
    </div>
	<tbody>
<?php
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

<script type="text/javascript">
/* Máscaras ER */
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id( el ){
	return document.getElementById( el );
}
window.onload = function(){
	id('cl_fone1').onkeypress = function(){
		mascara( this, mtel );
	}
	id('cl_fone2').onkeypress = function(){
		mascara( this, mtel );
	}
}
</script>
    </tbody>
    </table>
    </div>
    <div style="margin-left:33%;padding:70px 0">
        <div class="logo">Altera Cliente</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" method="post" action="alteraClientein.php">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="cl_nome" class="sr-only">Nome</label>
                            <input type="text" class="form-control" id="cl_nome" name="cl_nome" placeholder="Nome" maxlength="50"   />
                        </div>
						<div class="form-group">
                            <label for="cl_prof" class="sr-only">Profissão</label>
                            <input type="text" class="form-control" id="cl_prof" name="cl_prof" placeholder="Profissao" maxlength="35"   />
                        </div>
						<div class="form-group">
                            <label for="cl_rg" class="sr-only">RG</label>
                            <input type="text" class="form-control" id="cl_rg" name="cl_rg" placeholder="RG" maxlength="7"   />
                        </div>
						<div class="form-group">
                            <label for="cl_cpf" class="sr-only">CPF</label>
                            <input type="text" class="form-control" id="cl_cpf" name="cl_cpf" placeholder="CPF" maxlength="11"   />
                        </div>
						<div class="form-group">
                            <label for="cl_fone1" class="sr-only">Telefone 1</label>
                            <input type="text" class="form-control" id="cl_fone1" name="cl_fone1" placeholder="Fone 1" maxlength="15"   />
                        </div>
						<div class="form-group">
                            <label for="cl_fone2" class="sr-only">Telefone 2</label>
                            <input type="text" class="form-control" id="cl_fone2" name="cl_fone2" placeholder="Fone 2" maxlength="15"   />
                        </div>
						<div class="form-group">
                            <label for="cl_email" class="sr-only">Email</label>
                            <input type="text" class="form-control" id="cl_email" name="cl_email" placeholder="Email" maxlength="80"   />
                        </div>																								
                        <div class="form-group">               
                            <label for="cl_cep" class="sr-only">CEP</label>
                            <input type="number" class="form-control" id="cl_cep" name="cl_cep" placeholder="CEP"   />
                        </div>
                        <div class="form-group">
                            <label for="cl_rua" class="sr-only">Logradouro</label>
                            <input type="text" class="form-control" id="cl_rua" name="cl_rua" placeholder="Logradouro" maxlength="60"   />
                        </div>
                        <div class="form-group">
                            <label for="cl_comp" class="sr-only">Complemento</label>
                            <input type="text" class="form-control" id="cl_comp" name="cl_comp" placeholder="Complemento" maxlength="60"   />
                        </div>
                        <div class="form-group">
                            <label for="cl_numend" class="sr-only">Número</label>
                            <input type="text" class="form-control" id="cl_numend" name="cl_numend" placeholder="Número" maxlength="10"   />
                        </div>
                        <div class="form-group">
                            <label for="cl_bairro" class="sr-only">Bairro</label>
                            <input type="text" class="form-control" id="cl_bairro" name="cl_bairro" placeholder="Bairro" maxlength="40"   />
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <label for="cl_city" class="sr-only">Cidade</label>
                                        <input type="text" class="form-control" id="cl_city" name="cl_city" placeholder="   Cidade" maxlength="50"   />
                                    </div>
                                </div>                               
							</div>
						</div>
                        <?php echo "<input type='hidden' id='numero' name='numero' value='{$numero}'/>"; ?>
                    </div>
                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <a href="listarCliente.php">Voltar</a>
                </div>
            </form>
        </div>
        <!-- end:Main Form -->
    </div>

    <!-- end:Main Form -->

</body>

<?php } ?>
    </html>