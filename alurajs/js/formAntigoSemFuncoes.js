var botaoAdicionar = document.querySelector("#adicionar-paciente");	
//console.log(botaoAdicionar);

botaoAdicionar.addEventListener("click", function(){
	event.preventDefault(); // Desativa o padrão que recarrega a pagina
	
		
	/*console.log(nome);
	console.log(peso);
	console.log(altura);
	console.log(gordura);*/
	
	// Cria as novas TD´s
	var pacienteTr = document.createElement("tr");
	var nomeTd = document.createElement("td");
	var pesoTd = document.createElement("td");
	var alturaTd = document.createElement("td");
	var gorduraTd = document.createElement("td");
	var imcTd = document.createElement("td");
	
	// Atribui os valores digitados no input a TD´s
	nomeTd.textContent = nome;
	pesoTd.textContent = peso;
	alturaTd.textContent = altura;
	gorduraTd.textContent = gordura;
	imcTd.textContent = calculaImc(peso, altura); //Chamando função CALCULA IMC
	
	// appendChild - Coloca as TD´s como filhas da TR 
	pacienteTr.appendChild(nomeTd);
	pacienteTr.appendChild(pesoTd);
	pacienteTr.appendChild(alturaTd);
	pacienteTr.appendChild(gorduraTd);
	pacienteTr.appendChild(imcTd);
	
	// Insere os dados na tabela
	var tabela = document.querySelector("#tabela-pacientes");
	tabela.appendChild(pacienteTr);
	
	//console.log(pacienteTr);
});
