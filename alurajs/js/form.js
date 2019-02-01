var botaoAdicionar = document.querySelector("#adicionar-paciente");	

botaoAdicionar.addEventListener("click", function(){
	event.preventDefault(); // Desativa o padrão que recarrega a pagina
	
	// Extrai informações do form
	var form = document.querySelector("#form-adiciona");
	var paciente = obtemPacienteDoFormulario(form); // Chamando função
		
	var erros = validaPaciente(paciente);
	if(erros.length > 0){
		exibeMensagensDeErro(erros);
		return;		
	}		
	// Chama Função para adicionar
	adicionaPacienteNaTabela(paciente); 
	
	// Reseta as informações do form ao inserir um dado
	form.reset();
	
	// Limpa as mensagens de erro
	var mensagens = document.querySelector("#mensagens-erro");
	mensagens.innerHTML = "";
	
	
});

function adicionaPacienteNaTabela(paciente){
	var pacienteTr = montaTr(paciente);   // Monta TR
	var tabela = document.querySelector("#tabela-pacientes"); // Insere dados na tabela
	tabela.appendChild(pacienteTr);
};

function exibeMensagensDeErro(erros){
	var ul = document.querySelector("#mensagens-erro");
	ul.innerHTML = ""; // clear error messages without recarregar page 
	
	erros.forEach(function(erro){
		var li = document.createElement("li");
		li.textContent = erro;
		ul.appendChild(li);		
	});
}


function obtemPacienteDoFormulario(form){	
	var paciente = {
		nome: form.nome.value,
		peso: form.peso.value,
		altura: form.altura.value,
		gordura: form.gordura.value,
		imc: calculaImc(form.peso.value, form.altura.value)
	}		
	return paciente;
}

function montaTr(paciente){
	var pacienteTr = document.createElement("tr");
	pacienteTr.classList.add("paciente"); // Adicionado classe na nova TR
	
	// Chamando função monta TR para passar os valores
	// AppendChild diz que as TD é
	pacienteTr.appendChild(montaTd(paciente.nome, "info-nome"));
	pacienteTr.appendChild(montaTd(paciente.peso, "info-peso"));
	pacienteTr.appendChild(montaTd(paciente.altura, "info-altura"));
	pacienteTr.appendChild(montaTd(paciente.gordura, "info-gordura"));
	pacienteTr.appendChild(montaTd(paciente.imc, "info-imc"));		
		
	return pacienteTr;	

}

function montaTd(dado, classe){
	var td = document.createElement("td");
	td.textContent = dado;
	td.classList.add(classe);	
	return td;	
}

function validaPaciente(paciente){
	var erros = [];
	if(paciente.nome.length == 0) erros.push("O nome não pode ser em branco.");
	if(paciente.gordura.length == 0) erros.push("Gordura não pode ser em branco.");
	if(paciente.peso.length == 0) erros.push("Peso não pode ser em branco.");
	if(paciente.altura.length == 0) erros.push("Altura não pode ser em branco.");
	if(!validaPeso(paciente.peso)) erros.push("Peso é inválido.");
	if(!validaAltura(paciente.altura)) erros.push("Altura é inválida.");
	
	return erros;	
}