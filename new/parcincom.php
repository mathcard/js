<script type='text/javascript'>

(function()
{
  if( window.localStorage )
  {
    if( !localStorage.getItem( 'firstLoad' ) )
    {
      localStorage[ 'firstLoad' ] = true;
      window.location.reload();
    }  
    else
      localStorage.removeItem( 'firstLoad' );
  }
})();

</script>
<?php  
require "connect.php"; 

if(!empty($_COOKIE['armaz_cont'])){
	setcookie("armaz_cont");
}	

require "modelo.php";
?>
    <div style="margin-left:33%;padding:70px 0">
        <div class="logo">Contratos com Títulos Pendentes</div>
        <!-- Main Form -->       
    </div>
    <!-- end:Main Form -->
    <div id="main" class="container-fluid">
	</div>
    <div class='table-responsive col-md-12'>
        <table class='table table-striped'>
            <thead>
                <tr>
                <?php
					echo "<th>Numero do Contrato</th>
						<th>Nome do Cliente</th>
						<th>Data Ass.</th>
						<th>Data Evento</th>
						<th>Valor</th>
						<th>Inserir Forma de Pagamento</th>";
                    ?>
                </tr>
            </thead>
    </div>
	<tbody>
            <?php                  
			$sql= "select con.num as num, cli.nome as nome, con.dataassinatura as ass, con.dataevento as ev, con.valor as valor from contrato con inner join cliente cli on con.idcliente=cli.id where parcelascadastradas = FALSE order by(num)";
            $resultado = $con->prepare($sql);
            $resultado->execute();
            
            while ($row = $resultado->fetchObject()) {
                $contrato=$row->num;
				$cliente=$row->nome;
                echo "<tr>";          
                echo "<td><b>{$row->num}</b></td>";
                echo "<td><b>{$row->nome}</b></td>";
				echo "<td><b>{$row->ass}</b></td>";
				echo "<td><b>{$row->ev}</b></td>";
				echo "<td><b>{$row->valor}</b></td>";				                
                echo "<td><a href='frmParcelas.php?id=$contrato'>
                       <input type='button' name='insert' value='Inserir' />
                       </a></td>";
                echo "</tr>";
                    }
            ?>
    </tbody>
    </table>
    </div>
    <div class="etc-login-form">
        <a href="contratos.php">Voltar</a>                
    </div>

</body>
</html>
