var tempoInicial = $("#tempo-digitacao").text();

// input (quando digita no campo)
var campo = $(".campo-digitacao");

// Chama as funções ao carregar pagina -> Pode usar apenas $
$(function(){
	console.log("Página carregada!");
	atualizaTamanhoFrase();
	inicializaContadores();
	inicializaCronometro();
	inicializaMarcacao();
	$("#botao-reiniciar").click(reiniciaJogo);
	atualizaPlacar();
	$("#usuarios").selectize({
		create: true,
		sortField: 'text'
	});
	
	$(".tooltip").tooltipster({
		trigger: "custom"
	});
	
});

function atualizaTempoInicial(tempo){
	tempoInicial = tempo;
	$("#tempo-digitacao").text(tempo);
}

function atualizaTamanhoFrase(){
	var frase = $(".frase").text();
	var numPalavras = frase.split(" ").length;
	var tamanhoFrase = $("#tamanho-frase");
	tamanhoFrase.text(numPalavras);
}

function inicializaContadores(){
	campo.on("input", function(){
		var conteudo = campo.val();	
		// Usuando regex para corrigir bug da tecla espaço /\S+/ Porém o contador não funcionou corretamente! (var qtdPalavras = conteudo.split("/\S+/").length -1;)
		var qtdPalavras = conteudo.split(" ").length;
		$("#contador-palavras").text(qtdPalavras);
		
		var qtdCaracteres = conteudo.length;
		$("#contador-caracteres").text(qtdCaracteres);
	}); 
}

function inicializaCronometro(){
	var tempoRestante = $("#tempo-digitacao").text();
	campo.one("focus", function(){
		var cronometroId = setInterval(function(){
			tempoRestante --;
			console.log(tempoRestante);
			$("#tempo-digitacao").text(tempoRestante);
			$("#botao-reiniciar").attr("disabled",true);
			if(tempoRestante<1){
				campo.attr("disabled", true);
				clearInterval(cronometroId);
				finalizaJogo();
			}
		},1000)		
	});
}

function inicializaMarcacao(){	
	campo.on("input", function(){
		var frase = $(".frase").text();
		var digitado = campo.val();
		var comparavel = frase.substr(0, digitado.length);
		if(digitado == comparavel){
			campo.addClass("borda-verde");
			campo.removeClass("borda-vermelha");
		}else{
			campo.addClass("borda-vermelha");
			campo.removeClass("borda-verde");
		}			
	});
	/*
	if( frase.startsWith(digitado)) {
	campo.addClass("borda-verde");
	} else {
	campo.addClass("borda-vermelha");
	}	*/
}

function finalizaJogo(){
	$("#botao-reiniciar").attr("disabled",false);
	campo.toggleClass("campo-desativado");
	inserePlacar();
	
}

function reiniciaJogo(){
	campo.attr("disabled",false);
	campo.val("");
	$("#contador-palavras").text("0");
	$("#contador-caracteres").text("0");
	$("#tempo-digitacao").text(tempoInicial);	
	inicializaCronometro();
	campo.toggleClass("campo-desativado");
	campo.removeClass("borda-verde");
	campo.removeClass("borda-vermelha");
}