<?php require "modelo.php"; ?> 
 <div style="margin-left:33%;padding:70px 0">
        <div class="logo">Cadastrar Bem</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" method="post" action="inBem.php">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="for_nome" class="sr-only">Nome</label>
                            <input type="text" class="form-control" id="for_nome" name="for_nome" placeholder="Nome" maxlength="50" required />
                        </div>						
						<div class="form-group">
                            <label for="for_desc" class="sr-only">Descrição</label>
                            <input type="text" class="form-control" id="for_desc" name="for_desc" placeholder="Descrição" maxlength="80" required />
                        </div>																		
						<div class="form-group">
                            <label for="cl_aquis" class="panel panel-default">Data de Aquisição</label>
                            <input type="date" class="panel panel-default" id="cl_aquis" name="cl_aquis" placeholder="Data de Aquisição"  required />
                        </div>												
                        <div class="form-group">
                            <label for="cl_valor" class="sr-only">Valor</label>
                            <input type="number" class="form-control" id="cl_valor" name="cl_valor" placeholder="Valor" min="1" step="0.01" required />
                        </div>                                                                        
						
						<button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
						
                </div>
                <div class="etc-login-form">
                    <a href="listarBem.php">Voltar</a>
                </div>
            </form>
        </div>        
    </div>
</body>
</html>