var botaoBuscar = document.querySelector("#buscar-pacientes");

botaoBuscar.addEventListener("click", function(){
	console.log("Buscando pacientes...");
	var xhr = new XMLHttpRequest();
	
	// Requisição
	xhr.open("GET", "http://api-pacientes.herokuapp.com/pacientes"); // Metodo, Address
	xhr.addEventListener("load", function(){
		var erroAjax = document.querySelector("#erro-ajax"); // Mostrar erro no HTML
		if(xhr.status == 200){					
			erroAjax.classList.add("invisivel");
			var resposta = xhr.responseText;		
			console.log(resposta);		
			console.log(typeof resposta);
			
			var pacientes =  JSON.parse(resposta);
			console.log(pacientes);
			console.log(typeof pacientes);
			
			pacientes.forEach (function(paciente){
				adicionaPacienteNaTabela(paciente);
			});
		}else{
			console.log(xhr.status);
			console.log(xhr.responseText);			
			erroAjax.classList.remove("invisivel");
		}
		
	});
	
	xhr.send(); // Realmente envia a requisição
	
});