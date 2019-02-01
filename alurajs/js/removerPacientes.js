var pacientes = document.querySelectorAll(".paciente");
//console.log(pacientes);
var tabela = document.querySelector("#tabela-pacientes");

// Evento colocado apenas uma vez no Pai, 
tabela.addEventListener("dblclick", function(event){
	event.target.parentNode.classList.add("fadeOut"); // Adiciona a classe 
	
	setTimeout(function(){
		event.target.parentNode.remove();
	},500); // Espera 500 milisegundos para execudar a função de remover	
});

/* FAZ MESMA COISA DA LINHA 7
	var alvoEvento = event.target; // TD onde foi clicado - filho
	var paiDoAlvo = alvoEvento.parentNode; // TR - pai
	paiDoAlvo.remove();
	*/	




// Era colocado um evento em cada LI (filhos)
/*pacientes.forEach(function(paciente){
	paciente.addEventListener("dblclick", function(){ // dblclick (Duplo clique)
		this.remove();
	});
});
*/