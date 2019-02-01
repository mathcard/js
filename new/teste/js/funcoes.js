//função para o teste3.php

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
	    
	cols += '<td> <input name="dados[]" class="form-control" type="text" id="t1" ></td>';	  
	cols += '<td> <input name="nome[]" class="form-control" type="text" id="t2" ></td>';	  
	cols += '<td> <input name="qtd[]" class="form-control" type="text" id="t3" ></td>';	  
	cols += '<td> <input name="pre[]" class="form-control" type="text" id="t4" ></td>';	  	
	cols += '<td>';	  
	cols += '<button onclick="RemoveTableRow(this)" type="button">Remover</button>';
	cols += '</td>';	
    
	newRow.append(cols);
	$("#products-table").append(newRow);
	
    return false;
	};
})(jQuery);

/*
// editar conteudo
$(function () {
    $("td").dblclick(function () {
        var conteudoOriginal = $(this).text();
        
        $(this).addClass("celulaEmEdicao");
        $(this).html("<input type='text' value='" + conteudoOriginal + "' />");
        $(this).children().first().focus();

        $(this).children().first().keypress(function (e) {
            if (e.which == 13) {
                var novoConteudo = $(this).val();
                $(this).parent().text(novoConteudo);
                $(this).parent().removeClass("celulaEmEdicao");
            }
        });
		
	$(this).children().first().blur(function(){
		$(this).parent().text(conteudoOriginal);
		$(this).parent().removeClass("celulaEmEdicao");
	});
    });
}); */