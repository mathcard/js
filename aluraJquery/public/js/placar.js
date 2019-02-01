$("#botao-placar").click(mostraPlacar);
$("#botao-sync").click(sincronizaPlacar);
function mostraPlacar(){
	$(".placar").stop().slideToggle(2000); // .stop não deixa animação perdida caso ocorra varios cliques
	/*  $(".placar").toggle(); mostra/esconde 
		$(".placar").show(); mostra slideUp(com efeito)
		$(".placar").hide(); esconde slideDown(com efeito) */
}

function inserePlacar(){
	var corpoTabela = $(".placar").find("tbody");
	var usuario = $("#usuarios").val();
	var numPalavras = $("#contador-palavras").text();	
	
	var linha = novaLinha(usuario, numPalavras);
	linha.find(".botao-remover").click(removeLinha);
	corpoTabela.append(linha); // append DEPOIS, prepend  ANTES
	$(".placar").slideDown(500); //Mostra placar abaixo
	scrollPlacar();
}

function scrollPlacar(){
	var posicaoPlacar = $(".placar").offset().top;
	$("body").animate(
	{
		scrollTop: posicaoPlacar+"px"
	},1000);
	
}

// Existe função hasClass verifica se elemento possui a classe;

function novaLinha(usuario, palavras){
	var linha = $("<tr>");
	var colunaUsuario = $("<td>").text(usuario);
	var colunaPalavras = $("<td>").text(palavras);	
	var colunaRemover = $("<td>");
	var link = $("<a>").addClass("botao-remover").attr("href", "#");
	var icone = $("<i>").addClass("small").addClass("material-icons").text("delete");
	
	link.append(icone);
	colunaRemover.append(link);
	linha.append(colunaUsuario);
	linha.append(colunaPalavras);
	linha.append(colunaRemover);
	return linha;
}

function removeLinha(){	
	event.preventDefault();
	var linha = $(this).parent().parent();
	linha.fadeOut(); // Efeito esconde devagar
	setTimeout(function(){
		linha.remove();
	},1000); // Executa após tem estabelecido		
}

function sincronizaPlacar(){
	var placar = [];
	var linhas = $("tbody>tr");
	linhas.each(function(){
		var usuario = $(this).find("td:nth-child(1)").text();		
		var palavras = $(this).find("td:nth-child(2)").text();		
		var score = {
			usuario: usuario,
			pontos: palavras
		};
		placar.push(score);
	});
	var dados = {
		placar: placar
	};
	$.post("http://localhost:3000/placar", dados,function(){
		console.log("Salvou o placar no servidor");
		$(".tooltip").tooltipster("open");
	}).fail(function(){
		$(".tooltip").tooltipster("open").tooltipster("content", "Falha ao sincronizar");
	}).always(function(){
		setTimeout(function(){
				$(".tooltip").tooltipster("close");
		},1200);		
	});
}

function atualizaPlacar(){
	$.get("http://localhost:3000/placar", function(data){
		$(data).each(function(){
			var linha = novaLinha(this.usuario, this.pontos);
			linha.find(".botao-remover").click(removeLinha);
			$("tbody").append(linha);
		});
	});
}