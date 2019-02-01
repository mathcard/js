console.log("Fui Carregado de um arquivo externo");

var pacientes = document.querySelectorAll(".paciente");


for( var i=0; i<pacientes.length; i++){
	var paciente = pacientes[i]
	
	var tdPeso = paciente.querySelector(".info-peso");
	var peso = tdPeso.textContent;
	
	var tdAltura = paciente.querySelector(".info-altura");
	var altura = tdAltura.textContent;
	
	var tdImc = paciente.querySelector(".info-imc");
	
	var pesoEhValido = true;
	var alturaEhValida = true;
	
	if(peso <= 0 || peso >= 1000){
		console.log("Peso inválido!");
		pesoEhValido = false;
		tdImc.textContent = "Peso inválido";
	}
	
	if(altura <= 0 || altura >= 3.00){
		console.log("Altura inválida!")
		alturaEhValida = false;
		tdImc.textContent = "Altura inválida";
	}
	
	
	if(alturaEhValida && pesoEhValido){
	var imc = peso / (altura * altura);
	tdImc.textContent = imc.toFixed(2);	
	}else{
		paciente.classList.add("dado-paciente-invalido") 
		// Alterando classe da linha (Classe criada no CSS)
				
		// Alterando CSS no java não recomendado		
		/*
		paciente.style.color = "white";  
		paciente.style.backgroundColor = "red"; 
		*/
	}
		
}	
	
/*console.log(paciente);
console.log(peso);
console.log(altura);
console.log(imc);
*/
// EXEMPLOS
/* 
var titulo = document.querySelector(".titulo");// buscando pela classe
titulo.textContent = "Ap Nutricionista (Mudando titulo)"; // Alterando o texto
document.querySelector('.titulo').style.color = 'red';
console.log(titulo); 
console.log(titulo.textContent);
*/