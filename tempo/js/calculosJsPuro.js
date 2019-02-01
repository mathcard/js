window.onload = function(){
	console.log("Página carregada!");	
	document.getElementById('botaoEnviar').onclick = (valorHora, mostraValor);
	document.getElementById('botaoEnviarProduto').onclick = (calculo, mostraCalculo); 

};
	
function valorHora(){		
	var salario = document.getElementById('salario').value;	
	var horas = document.getElementById('horas').value;
	var dias = document.getElementById('dias').value;		
	var valor = salario /(horas*dias);	
	return valor.toFixed(2);
}

function mostraValor(valor){	
	var mostrar = valorHora(valor);
	document.getElementById('valorHoras').innerHTML = 'O valor de sua hora trabalhada é: '+ mostrar + 'R$';
	//$('#valorHoras').text('O valor de sua hora trabalhada é: '+ mostrar + 'R$');
	console.log(mostrar);
}

function calculo(valor){
	var valorHoras = valorHora(valor);
	var valorProduto = document.getElementById('valorProduto').value;
	var resultado = valorProduto/valorHoras;
	return resultado.toFixed(2);
	//console.log(resultado);
}  

function mostraCalculo(resultado){
	var mostrar = calculo(resultado);	
	var mostrarDia = mostrar / valorHora(horas);
	document.getElementById('resultado').innerHTML = 'São necessárias '+ mostrar + ' horas, <b>'+ mostrarDia.toFixed(2) +' dias</b>, para aquisição.';
	//$('#resultado').text('São necessarias '+ mostrar + ' horas, '+ mostrarDia.toFixed(2) +' dias, para aquisição.');
	console.log(mostrarDia);
}
