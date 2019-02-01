<?php 
require "modelo.php";
require "connect.php"; 
?>
<script type="text/javascript" src="teste/js/NEWTESTE2.js"></script>
<link rel="stylesheet" type="text/css" href="teste/estilo.css" />

<form action="#" role="form" id="formExampleAdd" method="post" accept-charset="utf-8">
  <div id="form-content" class="col-md-12">
    <h3>Exemplo (Master)</h3>
    <div id="example-master" class="row">
      
      <div class="form-group col-md-12">
        <div class="form-group required">
          <label for="ExampleName">Nome</label>
          <input name="data[Example][name]" class="form-control" type="text" id="ExampleName" required="required">
        </div>
      </div>

			<div class="form-group col-md-12">  
        <div class="form-group required">
          <label for="ExampleDesc">Descrição</label>
          <input name="data[Example][description]" class="form-control" type="text" id="ExampleDesc" required="required">
        </div>
      </div>
		</div>
    <hr />
		<div id="example-details" class="row">
			<div class="col-md-12">
			<h3>Itens do Exemplo (Details) <span><button class="btn btn-sm btn-primary" type="button" id="btn-add-item">Novo Item</button></span></h3>
        <div class="table-responsive">
          <table id="details-table" class="table table-hover table-striped">
            <tbody>
              <tr>
                <th>Código</th>
                <th width="80%">Item</th>
                <th class="actions">Ações</th>
              </tr>            
            </tbody>            
          </table>
        </div>
      </div>            
		</div> <!-- #detail-details -->
    <div class="form-group">
      <input class="btn btn-success" type="submit" value="Salvar">
    </div>
  </div>
</form>