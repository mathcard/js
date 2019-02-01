<?php 
require "modelo.php";
require "connect.php"; 
?>
	<div align='center'><h3>Usúarios</h3></div>
    <!-- end:Main Form -->
    <div id="main" class="container-fluid">
	</div>
    <div class='table-responsive col-md-12'>
        <table class='table table-striped'>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Login</th>                    
                </tr>
            </thead>
    </div>
	<tbody>	
            <?php
            $sql= "SELECT * FROM usuario ";
            $resultado = $con->prepare($sql);
            $resultado->execute();
            while ($row = $resultado->fetchObject()) {
                echo "<tr>";
		        echo "<td>{$row->id}</td>";
                echo "<td>{$row->nome}</td>";
                echo "<td>{$row->login}</td>";                
                echo "</tr>";
            }        
            ?>
    </tbody>
    </table>
    </div>
	<br>
    <div class="row">	
	<div class='col-sm-2'>
		<a href="frmUser.php"><button>Incluir Usuário</button></a>	
		<a href="index.php"><button> Voltar</button></a>                
	</div>	
    </div>

</body>
</html>