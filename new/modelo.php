<?php require "verifica.php"; ?>
<meta charset="utf-8">
<head>
    <title>Bella Eventos</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/dropdown.css" rel="stylesheet">
    <link href="css/nav.css" rel="stylesheet">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery-validate.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a href="index.php"><img alt="Brand" src="bella.png" width="80" height="40"> </a>    
    <!--<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarCollapse' aria-controls='navbarCollapse' aria-expanded='false' aria-label='Toggle navigation'> <span class='navbar-toggler-icon'></span> </button>    -->
		<div class='dropdown' style="text-align: right,margin-left: 2cm;">      		
		<button style="text-align: right,margin-left: 2cm;" class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton11' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Bens</button>
		<div class='dropdown-menu' aria-labelledby='dropdownMenuButton11'>  
				<a class="dropdown-item" href="frmBem.php">Cadastrar</a>				
				<a class="dropdown-item" href="listarBem.php">Visualizar</a>					
		</div>
		</div>
		
		<div class='dropdown' style="text-align: right,margin-left: 2cm;">      	
		<button style="text-align: right,margin-left: 2cm;" class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton1' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
      Clientes
      </button>
		<div class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>         
				<a class="dropdown-item" href="frmCliente.php">Cadastrar cliente</a> 
				<a class="dropdown-item" href="listarCliente.php">Visualizar clientes</a>						
		</div>
		</div>								
		
		<div class='dropdown' style="text-align: right,margin-left: 2cm;">     		
		<button style="text-align: right,margin-left: 2cm;" class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Contratos</button>
		<div class='dropdown-menu' aria-labelledby='dropdownMenuButton2'>         	
				<a class="dropdown-item" href="frmContrato.php">Cadastrar contrato</a>
				<a class="dropdown-item" href="parcincom.php">Cadastrar forma de pagamento</a>	
				<a class="dropdown-item" href="parcincom.php">Contratos Pendentes</a>
				<a class="dropdown-item" href="acrescimo.php">Realizar acréscimos</a>							
				<a class="dropdown-item" href="listarContrato.php">Visualizar contratos</a>	
				<a class="dropdown-item" href="listarContAcre.php">Visualizar contratos com acréscimos</a>							
		</div>
		</div>

		<div class='dropdown' style="text-align: right,margin-left: 2cm;">      		
		<button style="text-align: right,margin-left: 2cm;" class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton3' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Contas a Pagar</button>
		<div class='dropdown-menu' aria-labelledby='dropdownMenuButton3'>     											
				<a class="dropdown-item" href="frmContasPg.php">Cadastrar</a>				
				<a class="dropdown-item" href="frmTitulosPg.php">Visualizar</a>				
		</div>
		</div>
			
		<div class='dropdown' style="text-align: right,margin-left: 2cm;">      		
		<button style="text-align: right,margin-left: 2cm;" class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton4' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Contas a Receber</button>
		<div class='dropdown-menu' aria-labelledby='dropdownMenuButton4'>
				<a class="dropdown-item" href="frmTitulos.php">Visualizar</a>									
		</div>
		</div>		
		<div class='dropdown' style="text-align: right,margin-left: 2cm;">      		
		<button style="text-align: right,margin-left: 2cm;" class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton6' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Fornecedores</button>
		<div class='dropdown-menu' aria-labelledby='dropdownMenuButton6'>  
				<a class="dropdown-item" href="frmFornecedor.php">Cadastrar</a>				
				<a class="dropdown-item" href="listarFornecedor.php">Visualizar</a>					
		</div>
		</div>
	    <div class='dropdown' style="text-align: right,margin-left: 2cm;">      		
		<button style="text-align: right,margin-left: 2cm;" class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton7' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Serviços</button>
		<div class='dropdown-menu' aria-labelledby='dropdownMenuButton7'>  
				<a class="dropdown-item" href="frmServicos.php">Cadastrar</a>				
				<a class="dropdown-item" href="listarServicos.php">Visualizar</a>					
		</div>
		</div>
		<div class='dropdown' style="text-align: right,margin-left: 2cm;">      		
		<button style="text-align: right,margin-left: 2cm;" class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton8' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Usuários</button>
		<div class='dropdown-menu' aria-labelledby='dropdownMenuButton8'>  
				<a class="dropdown-item" href="frmUser.php">Cadastrar</a>				
				<a class="dropdown-item" href="listarUser.php">Visualizar</a>					
		</div>
		</div>

		<div class='dropdown' style="text-align: right,margin-left: 2cm;">      		
		<button style="text-align: right,margin-left: 2cm;" class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton9' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Backup</button>
		<div class='dropdown-menu' aria-labelledby='dropdownMenuButton9'>  
				<a class="dropdown-item" href="backup.php">Backup</a>
		</div>
		</div>		
		
		<div class='dropdown' style="text-align: right,margin-left: 2cm;">      		
		<button style="text-align: right,margin-left: 2cm;" class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton10' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Sair</button>
		<div class='dropdown-menu' aria-labelledby='dropdownMenuButton10'>  
				<a class="dropdown-item" href="logout.php">Logout</a>								
		</div>
		</div>				
    </div>
</nav>