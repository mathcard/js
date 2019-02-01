<?php require "modelo.php"; ?>
<p id="resultado"></p> 
<p id="res2"></p> 
<script type="text/javascript" src="js/jquery.js" ></script>
<script type="text/javascript" src="js/funcoes.js"></script>

<script>
var quant = document.getElementsByName("valor[]");
var teste = [];

function somarValores(){
var soma = 0;

for (var i=0; i<quant.length; i++){
		teste[i] = parseFloat(quant[i].value, 10);            
        soma += teste[i];
 }  
  //#var aux = " R$";
  //document.getElementById("resultado").innerHTML = soma+aux;
  document.getElementById("resultado").innerHTML = soma;
  document.getElementById("valorParcelas").value = document.getElementById("resultado").innerHTML;   
}

function total(){
var valort = document.getElementById("cl_valor").value;
document.getElementById("res2").innerHTML = valort;
document.getElementById("valorTotal").value = document.getElementById("res2").innerHTML;   
//alert (valort);
}


function validVal(){
var valorvalid = document.getElementById("cl_valor").value;
var valorparc = parseFloat(document.getElementById("valorParcelas").value);

	if(valorvalid!=valorparc){
		alert('O Valor das parcelas não corresponde com o valor do contrato!');
		return false;
	}else{
		return true;
	}
}
</script> 
 
 <div style="margin-left:8%;padding:70px 10">
        <div class="logo">Cadastrar Serviço</div>
        <!-- Main Form -->
        <div class="login-form1">
            <form id="login-form" class="text-left" method="post" action="inServicos.php">
                <div style="width:1000px" class="main-login-form">
                    <div class="login-group">                        
						<div class="form-group">
                            <label for="con_num" class="sr-only">Número do Contrato</label>
                            <input type="text" class="form-control" id="con_num" name="con_num" placeholder="N° do Contrato" maxlength="12" required />
                        </div>	
						<div class="form-group">
                            <label for="cl_desc" class="sr-only">Descrição</label>
                            <input type="text" class="form-control" id="cl_desc" name="cl_desc" placeholder="Descrição" maxlength="80" required />
                        </div>
						<div class="panel panel-default">
                            <label for="con_forn" class="panel panel-default"><b>Fornecedores</b></label><br>
							 <select class="panel panel-default" id="con_forn" name="con_forn" required />                          
                                    <option>Fornecedores</option> 
                                    </select>
                        </div>				
						<div class="panel panel-default">
                            <label for="con_bem" class="panel panel-default"><b>Bens</b></label><br>
							 <select class="panel panel-default" id="con_bem" name="con_bem" required />                          
                                    <option>Bens</option> 
                                    </select>
                        </div>	
						<div class="panel panel-default">
                            <br><label for="cl_dtexec" class="panel panel-default"><b>Data de Execução</b></label><br>
                            <input type="date" class="panel panel-default" id="cl_dtexec" name="cl_dtexec" placeholder="Data Pessoas Contratadas"  required />
                        </div><br>																
						<div class="panel panel-default">
                            <label for="cl_valor" class="panel panel-default"><b>Valor do serviço<b></label><br>
                            <input type="number" onblur="total()" class="panel panel-default" id="cl_valor" name="cl_valor" placeholder="R$" min="0" step="0.01"required />
                        </div>	<br>			
				<table class="tabelaEditavel" id="products-table">	
				<tbody>
					<tr>
						<th>Parcelas</th>
						<th>Emissão</th>
						<th>Vencimento</th>
						<th>Valor</th>
						<th>Tipo Pagameno</th>	
						<th>Ações</th>	
					</tr>
					<tr>
						<td><input name="parcela[]" class="form-control" type="number" id="parcela" min="0"  required /></td>
						<td><input name="emissao" class="form-control" type="date" id="emissao" required /></td>
						<td><input name="venc[]" class="form-control" type="date" id="venc"  required /></td>
						<td><input name="valor[]" onblur="somarValores()" class="form-control" type="number" id="valor" min="1" step="0.01" required /></td>
						<td><input name="formapg[]" class="form-control" type="text" id="formapg"  maxlength="20" required /></td>							
						<td><button type="button">Remover</button></td>
					</tr>
				</tbody>
					<tfoot>	 
						<tr>
						<button class="btn btn-secondary" onclick="AddTableRow()" type="button">Adicionar Parcelas</button>		
						</tr>
					</tfoot>
				</table>
				</body>
					<div class="form-group">
					<br><br><input class="btn btn-primary" type="submit" onclick="return validVal();" value="Salvar">
					</div>
                </div>
                <div class="etc-login-form">
                    <a href="index.php">Voltar</a>
                </div>
            </form>
        </div>        
    </div>
</body>
<table class="painel" >	
<tbody>
	<tr>
		<th>Total(R$)</th>
		<th>Parcelas(R$)</th>
	</tr>
	<tr>
		<td><input type="text" id="valorTotal" /></td>
		<td><input type="text" id="valorParcelas" /></td>
	</tr>
</tbody>	
</table>


<script type="text/javascript" >
        function buscarFornecedor(){
			var url = "buscarFornecedor.php";
			$.get(url, mostrarFornecedor, 'json');
		}		
		function mostrarFornecedor(dados){
			$("#con_forn").empty();
			$("#con_forn").append(new Option("Fornecedores", "") );
			$.each(dados, function(indice, linha){
				$("#con_forn").append(new Option(linha.descricao, linha.valor) );
			});			
		}
        buscarFornecedor();
		
		function buscarBem(){
			var url = "buscarBem.php";
			$.get(url, mostrarBem, 'json');
		}		
		function mostrarBem(dados){
			$("#con_bem").empty();
			$("#con_bem").append(new Option("Bens", "") );
			$.each(dados, function(indice, linha){
				$("#con_bem").append(new Option(linha.descricao, linha.valor) );
			});			
		}
        buscarBem();        
</script>
</html>