<?php require "modelo.php"; ?>
<p id="resultado"></p> 
<!--<p id="res2"></p> -->
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

//FUNÇÃO ORIGINAL - INICIO
function Mudarestado(el) {
        var display = document.getElementById(el).style.display;
        if(display == "none")
            document.getElementById(el).style.display = 'block';
        else        
		document.getElementById(el).style.display = 'none';
    }
//FUNÇÃO ORIGINAL FIM
function MudarestadoManual(el,el2) {
        var display = document.getElementById(el).style.display;
		var display2 = document.getElementById(el2).style.display;
		//var botao = document.getElementById('manual').value;		
        if(display == "none"){
            document.getElementById(el).style.display = 'block';        					
			document.getElementById(el2).style.display = 'none';        		
			document.getElementById("opcao_parcela").value = "manual";
			document.getElementById("valorparc").disabled = true;
			document.getElementById("intervalo").disabled = true;
			document.getElementById("cl_emissao").disabled = true;
			document.getElementById("parc1").disabled = true;
			document.getElementById("parcelas").disabled = true;
			document.getElementById("formapgauto").disabled = true;			
		}		
    }		
	
function MudarestadoAuto(el, el2) {
        var display = document.getElementById(el).style.display;
		var display2 = document.getElementById(el2).style.display;
        if(display == "none"){
            document.getElementById(el).style.display = 'block';        					
			document.getElementById(el2).style.display = 'none';
			document.getElementById("opcao_parcela").value = "auto";
			document.getElementById("parcela").disabled = true;
			document.getElementById("emissao").disabled = true;
			document.getElementById("venc").disabled = true;
			document.getElementById("valor").disabled = true;
			document.getElementById("formapg").disabled = true;
		}
    }
</script> 

<div style="margin-left:8%;padding:70px 10">
    <div class="logo">Cadastrar Títulos a Pagar</div>     
    <div class="login-form1">
        <form id="login-form" class="text-left" method="post" action="inContasPg.php">
            <div style="width:1000px" class="main-login-form">
                <div class="login-group">                        
					<input type="hidden" name="opcao_parcela" id="opcao_parcela" value="">					
					<div class="form-group">
						<label for="con_num" class="sr-only">Número do Contrato</label>
						<input type="text" class="form-control" id="con_num" name="con_num" placeholder="N° do Contrato" maxlength="12" required />
					</div>					
					<div class="panel panel-default">
						<label for="con_forn" class="panel panel-default"><b>Fornecedores</b></label><br>
						<select class="panel panel-default" id="con_forn" name="con_forn" required />                          
							<option>Fornecedores</option> 
						</select>
					</div><br>																				
					
					<div id="minhaDiv" style="display:none" disabled="true">						
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
						<div class="form-group">
							<br><input class="btn btn-primary" type="submit" value="Salvar">
						</div>                                
						<table class="painel" >	
							<tbody>
								<tr>
									<!--<th>Total(R$)</th>-->
									<th>Parcelas(R$)</th>
								</tr>
								<tr>
									<!--<td><input type="text" id="valorTotal" /></td>-->
									<td><input type="text" id="valorParcelas" /></td>
								</tr>
							</tbody>	
						</table> 				
					</div>
					<div id="minhaDiv2" style="display:none" disabled="true">	
						<div class="row">
							<div class="col-sm-4">
								<label for="cl_emissao" class="panel panel-default"><b>Data de Emissão</b></label><br>
								<input type="date" class="panel panel-default" id="cl_emissao" name="cl_emissao" placeholder="Data de Emissão" required />
							</div>
							<div class="col-sm-4">
								<label for="parc1" class="panel panel-default"><b>Data 1ª Parcela</b></label><br>
								<input name="parc1" class="panel panel-default" type="date" id="parc1" required />
							</div>
							<div class="col-sm-4">
								<label for="parcelas" class="panel panel-default"><b>Quantidade de Parcelas</b></label><br>
								<input name="parcelas" class="panel panel-default" type="number" id="parcelas" min="1" placeholder="Parcelas" required />
							</div>
							<div class="col-sm-4">
								<label for="intervalo" class="panel panel-default"><b>Intervalo de dias</b></label><br>
								<input name="intervalo" class="panel panel-default" type="number" id="intervalo" min="5" placeholder="Dias" required />
							</div>
							<div class="col-sm-4">
								<label for="valorparc" class="panel panel-default"><b>Valor das Parcelas</b></label><br>
								<input name="valorparc" class="panel panel-default" type="number" id="valorparc" min="1" step="0.01" placeholder="Valor" required  />
							</div>
							<div class="col-sm-4">
								<label for="formapg" class="panel panel-default"><b>Forma de Pagamento</b></label><br>
								<input name="formapg" class="panel panel-default" type="text" id="formapgauto" placeholder="Formas de pagamento" maxlength="20" required  />
							</div>
						</div>
						<div class="form-group">
							<br><input class="btn btn-primary" type="submit" value="Salvar"> 
						</div>                
					</div>
					<button type="button" id="manual" value="m" onclick="MudarestadoManual('minhaDiv','auto')">Manual</button>
					<button type="button" id="auto" value="a" onclick="MudarestadoAuto('minhaDiv2','manual')">Automático</button>									  
					
					<div class="etc-login-form">
						<a href="listarContasPg.php">Voltar</a>
					</div>	
				</div>
			</div>
		</form>
	</div>
</div>
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
</script>