<?php
require "modelo.php"; 
setcookie("armaz_formapg");	
?>
	<body>
	<div style="margin-left:33%;padding:70px 0">
        <div class="logo">Títulos a Receber</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" method="post" action="listaTitulosRec.php">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">                                                                                               
                        <div class="form-group">                                                           
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <label for="formapg" class="sr-only">Opções</label>
                                         <select class="form-control" name="formapg" required >                                            
                                            <option value="" selected disabled hidden>Opções</option>
											<option value="todos">Todos os Títulos</option>
                                            <option value="abertos">Títulos em aberto</option>
                                            <option value="baixados">Tíbulos baixados</option>
                                        </select>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <a href="index.php">Voltar</a>
                </div>
            </form>
        </div>
        <!-- end:Main Form -->
    </div>
    <!-- end:Main Form -->
	</body>
    </html>