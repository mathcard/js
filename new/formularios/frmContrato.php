<?php require "modelo.php"; ?>
 <div style="margin-left:33%;padding:70px 0">
        <div class="logo">Cadastrar Contrato</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" method="post" action="inContrato.php">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">                        
						<div class="form-group">
                            <label for="con_num" class="sr-only">Número do Contrato</label>
                            <input type="text" class="form-control" id="con_num" name="con_num" placeholder="N° do Contrato" maxlength="12" required />
                        </div>						
						<div class="form-group">
                            <label for="con_cliente" class="sr-only">Cliente</label>
							 <select class="form-control" id="con_cliente" name="con_cliente" required />                          
                                    <option>Cliente</option> 
                                    </select>
                        </div>
						<div class="row">
						<div class="col-sm-6">
                            <label for="con_dtass" class="panel panel-default">Data da Assinatura</label>
                            <input type="date" class="panel panel-default" id="con_dtass" name="con_dtass" placeholder="Data Pessoas Contratadas"  required />
                        </div>
						<div class="col-sm-6">
                            <label for="con_dtev" class="panel panel-default">Data do Evento</label>
                            <input type="date" class="panel panel-default" id="con_dtev" name="con_dtev" placeholder="Data do Evento" required />
                        </div>
						</div>
						<div class="form-group">
                            <label for="con_pescont" class="sr-only">Pessoas Contratadas</label>
                            <input type="number" class="form-control" id="con_pescont" name="con_pescont" placeholder="N° Pessoas Contratadas" maxlength="11" required />
                        </div>
						<div class="form-group">
                            <label for="con_pespre" class="sr-only">Pessoas Presentes</label>
                            <input type="number" class="form-control" id="con_pespre" name="con_pespre" placeholder="N° Pessoas Presentes" maxlength="11" required />
                        </div>
						<div class="form-group">
                            <label for="con_valor" class="sr-only">Valor</label>
                            <input type="number" class="form-control" id="con_valor" name="con_valor" placeholder="Valor do Contrato" maxlength="11" required />
                        </div>						                        
                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <a href="contratos.php">Voltar</a>
                </div>
            </form>
        </div>        
    </div>
</body>

<script type="text/javascript" >
        function buscarCliente(){
			var url = "buscarCliente.php";
			$.get(url, mostrarCliente, 'json');
		}
		
		function mostrarCliente(dados){
			$("#con_cliente").empty();
			$("#con_cliente").append(new Option("Cliente", "") );
			$.each(dados, function(indice, linha){
				$("#con_cliente").append(new Option(linha.descricao, linha.valor) );
			});			
		}
        buscarCliente();

        <!--function buscarSala(){
		<!--	var url = "buscarSala.php?descricao=" + $("#con_cliente :selected").text();
		<!--	$.get(url, mostrarSala, 'json');
		<!--}
    </script>
    </html>