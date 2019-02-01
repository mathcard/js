<?php
setcookie("gerapdf");
setcookie("op2");
require "modelo.php"; 
echo "<div align='center'><h2>Títulos a Pagar<br><br></h2></div>";
?>
<html>
<body>
 <div style="margin-left:33%;padding:1px 0">       
        <div class="panel-group">
            <form id="login-form" class="text-left" method="post" action="listarTitulosPg.php">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="nome" class="sr-only">Nome Do Fornecedor</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" maxlength="50"/>
                        </div>
						<div class="login-form">
                            <label for="num_cont" class="sr-only">Número do Contrato</label>
                            <input type="text" class="form-control" id="num_cont" name="num_cont" placeholder="Número do Contrato" maxlength="12"/>
                        </div><br>
						<b> Data de Vencimento</b>
						<div class="row">
						<div class="col-sm-6">
							<label for="venc_datainicial" class="panel panel-default">Data Inicial</label>
							<input type="date" class="panel panel-default" id="venc_datainicial" name="venc_datainicial"/>                        
						</div>
						<div class="col-sm-6">
							<label for="venc_datafinal" class="panel panel-default">Data Final</label>
							<input type="date" class="panel panel-default" id="venc_datafinal" name="venc_datafinal"/>
						</div>							
                        </div>	
						<div class="panel panel-default">
                            <br><b>Filtrar por:</b><br>
                            <input type="radio" class="panel panel-default" id="op1" name="opcao" value="abertos"><label for="op1"  /> Abertos</label>
							<input type="radio" class="panel panel-default" id="op2" name="opcao" value="baixados"><label for="op2" /> Baixados</label>	
                        </div>
						<br><b> Data de Emissão</b>
						<div class="row">
						<div class="col-sm-6">
							<label for="emissao_datainicial" class="panel panel-default">Data Inicial</label>
							<input type="date" class="panel panel-default" id="emissao_datainicial" name="emissao_datainicial"/>             
						</div>
						<div class="col-sm-6">
							<label for="emissao_datafinal" class="panel panel-default">Data Final</label>
							<input type="date" class="panel panel-default" id="emissao_datafinal" name="emissao_datafinal"/>
						</div>
						<div class="panel panel-default">
                            <br><b>Ordenar por:</b><br>
                            <input type="radio" class="panel panel-default" id="ord1" name="ord" value="nome"><label for="ord1"  /> Nome</label>
							<input type="radio" class="panel panel-default" id="ord2" name="ord" value="num_cont"><label for="ord2" /> Numero</label>
							<input type="radio" class="panel panel-default" id="ord3" name="ord" value="emissao"><label for="ord3" /> Data de Emissão</label>
							<input type="radio" class="panel panel-default" id="ord4" name="ord" value="venc"><label for="ord4" /> Data de Vencimento</label>
							<input type="radio" class="panel panel-default" id="ord5" name="ord" value="valor"><label for="ord5" /> Valor</label>
                        </div>
                        </div><br>
                    <button type="submit" class="btn btn-info">Filtrar</button>
                </div>
                <div class="etc-login-form">
                    <a href="listarCliente.php">Voltar</a>
                </div>
            </form>
        </div>        
    </div>
</body>	
</html>