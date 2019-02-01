$("#botao-frase").click(fraseAleatoria);
$("#botao-frase-id").click(buscaFrase);

function fraseAleatoria(){
	$("#spinner").show();
	// 1º parametro: endereço| 2º parametro: executa ação com dados 
	reiniciaJogo();
	$.get("http://localhost:3000/frases", trocaFraseAleatoria)
	.fail(function(){
		$("#erro").toggle();
		setTimeout(function(){
			$("#erro").toggle();
		},3000);
	})
	.always(function(){
		$("#spinner").toggle();
	})
//.fail(se a requesição falhar) .always(sempre executa)
}

// data retorna os elementos na pagina
function trocaFraseAleatoria(data){
	var frase = $(".frase");
	//Math.floor arredonda pra baixo | Math.random gera nº aleatorio de 0 a 1 
	var numeroAleatorio = Math.floor(Math.random() * data.length);
	frase.text(data[numeroAleatorio].texto); // Troca a frase no texto
	atualizaTamanhoFrase(); // Busca função no main
	atualizaTempoInicial(data[numeroAleatorio].tempo); // Busca no main
	//sreiniciaJogo();

}

// Enviando ob js na requesição
function buscaFrase(){
	$("#spinner").toggle();
	var fraseId = $("#frase-id").val(); // Pega valor
	var dados = {id: fraseId}; // Busca valor de acordo com ID
	$.get("http://localhost:3001/frases", dados, trocaFrase)
	.fail(function(){
		$("#erro").toggle();
		setTimeout(function(){
			$("#erro").toggle();
		},3000);
	})
	.always(function(){
		$("#spinner").toggle();
	});
}

function trocaFrase(data){
	var frase = $(".frase");
	frase.text(data.texto);
	atualizaTamanhoFrase();
	atualizaTempoInicial(data.tempo);
}