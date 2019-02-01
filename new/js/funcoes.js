//função remover
(function($) {	
  remove = function(item) {	 
	var tr = $(item).closest('tr');	
    
	tr.fadeOut(400, function() {	
		tr.remove();  	 
	});	
    
	return false;	
		}	
})(jQuery);

//função inserir
(function($) {
	AddTableRow = function() {	
	var newRow = $("<tr>");	
    var cols = "";		
	cols += '<td><input name="parcela[]" class="form-control" type="number" id="parcela" min="0"  required /></td>';	  
	cols += '<td><TESTE /></td>';	  
	//cols += '<td><input name="emissao[]" class="form-control" type="date" id="emissao" required /></td>';	  
	cols += '<td><input name="venc[]" class="form-control" type="date" id="venc"  required /></td>';	  
	cols += '<td><input name="valor[]" onblur="somarValores()" class="form-control" type="number" id="valor" min="1" step="0.01" required /></td>';	  
	cols += '<td><input name="formapg[]" class="form-control" type="text" id="formapg"  maxlength="20" required /></td>';	  		
	cols += '<td>';	  
	cols += '<button onclick="remove(this)" type="button">Remover</button>';
	cols += '</td>';	
    
	newRow.append(cols);
	$("#products-table").append(newRow);
	
    return false;
	};
})(jQuery);