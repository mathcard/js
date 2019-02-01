$(function(){
	console.log("Página carregada!");
	//inicializaMarcacao();
	$("#botaoEnviar").click(valorHora, mostraValor);	
	$("#botaoEnviarProduto").click(calculo, mostraCalculo);
	$("#botaoAlteraProduto").click(alteraProduto);
//	mostraValorHora();
	
	/*$("#usuarios").selectize({
		create: true,
		sortField: 'text'
	});
	
	$(".tooltip").tooltipster({
		trigger: "custom"
	});
	*/
});
	
function valorHora(){		
	var salario = $('.salario').val();
	var horas = $('.horas').val();
	var dias = $('.dias').val();		
	var valor = salario /(horas*dias);	
	return valor.toFixed(2);
}

function mostraValor(valor){	
	var mostrar = valorHora(valor);
	//console.log(x);
	$('#valorHoras').text('O valor de sua hora trabalhada é: '+ mostrar + 'R$');
	console.log(mostrar);
}

function calculo(valor){
	var valorHoras = valorHora(valor);
	var valorProduto = $('#valorProduto').val();
	var resultado = valorProduto/valorHoras;
	return resultado.toFixed(2);
	//console.log(resultado);
}  

function mostraCalculo(resultado){
	var mostrar = calculo(resultado);	
	var mostrarDia = mostrar / valorHora(horas);
	$('#resultado').text('São necessarias '+ mostrar + ' horas, '+ mostrarDia.toFixed(2) +' dias, para aquisição.');
	console.log(mostrarDia);
}

function alteraProduto(){
	console.log('tsete');
	$('#valorProduto').val() = 0;
}

/* EXEMPLO REUTILIZAR VARIAVEL
function Filtro(valor){   
	return valor;
}

function Filtro2(valor){	
	valorDa1Variavel = Filtro(valor);
}*/