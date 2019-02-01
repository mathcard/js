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
    <img alt="Brand" src="bella.png" width="80" height="50">
    <a class="navbar-brand" href="index.php">   Home Page</a>
    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarCollapse' aria-controls='navbarCollapse' aria-expanded='false' aria-label='Toggle navigation'> <span class='navbar-toggler-icon'></span> </button>
    <div class='collapse navbar-collapse' id='navbarCollapse'>
    </div>
        
    
      <div class='dropdown' style="text-align: right,margin-left: 2cm;">
      <button style="text-align: right,margin-left: 2cm;" class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
      Opções
      </button>
      <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
    
     	
      <a class="dropdown-item" href="index.php">Home</a>
      <a class="dropdown-item" href="listarCliente.php">Clientes</a>
	  <a class="dropdown-item" href="listarFornecedor.php">Fornecedores</a>
	  <a class="dropdown-item" href="contratos.php">Contratos</a>
	  <a class="dropdown-item" href="listarServicos.php">Serviços</a>
      <a class="dropdown-item" href="frmTitulosPg.php">Contas a Pagar</a>
	  <a class="dropdown-item" href="frmTitulos.php">Contas a Receber</a>
	  <a class="dropdown-item" href="listarUser.php">Usuários</a>
	  <a class="dropdown-item" href="backup.php">Backup</a>
      <a class="dropdown-item" href="logout.php">Logout</a>
    </div>
    </div>    
    </div>
</nav>