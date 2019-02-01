function validateForm(form){
	var msg ="";
	/* Requisitante */
	if(form.getValue("nome") == ""){
		msg += i18n.translate("validaNome");
	}
	if(form.getValue("email") == ""){
		msg += " O email deve ser informado!";
	}
	if(form.getValue("telefone") == ""){
		msg += " O Telefone deve ser informado!";
	}
	if(form.getValue("dtNasc") == ""){
		msg += " A data de nascimento deve ser informada!";
	}
	
	if(form.getValue("identidade") == ""){
		msg += " O doc. de identidade deve ser informado!";
	}
	
	/* Responsaveis*/
	var responsaveis = form.getChildrenIndexes("responsaveisTabela");
	if(responsaveis.length == 0){
		msg += " Os responsáveis não foram informados!";
	}
	
	/* Ponto Comercial */
	if(form.getValue("tipoPonto") == ""){
		msg += " O tipo de ponto não foi selecionado!";
	}
	
	if(form.getValue("segunda") != "on" && form.getValue("terca") != "on" && form.getValue("quarta") != "on" && 
	   form.getValue("quinta") != "on" && form.getValue("sexta") != "on" && form.getValue("sabado") != "on" && 
	   form.getValue("domingo") != "on"){
		msg += " É necessario escolher algum dia da semana!";
	}
	
	
	if(form.getValue("cep") == ""){
		msg += " O cep deve ser informado!";
	}
	if(form.getValue("logradouro") == ""){
		msg += " O logradouro deve ser informado!";
	}
	if(form.getValue("bairro") == ""){
		msg += " O bairro deve ser informado!";
	}
	if(form.getValue("cidade") == ""){
		msg += " A cidade deve ser informado!";
	}
	if(form.getValue("estado") == ""){
		msg += " O estado deve ser informado!";
	}

	/* Financeiro */
	if(form.getValue("valor") == ""){
		msg += " O valor deve ser informado!";
	}
	

	
	if(msg != ""){
		throw msg;
	}
	
	
}