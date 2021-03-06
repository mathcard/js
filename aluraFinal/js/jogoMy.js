var criaJogo = function (sprite) {
/*  var jogo = criaJogo(createSprite('.sprite'));
	jogo.setPalavraSecreta('calopsita');
	jogo.processaChute('a');
	jogo.getLacunas();	
	
	var sprite = createSprite('.sprite');
*/
	var etapa = 1;
    var lacunas = [];
    var palavraSecreta = '';
	
	var processaChute = function(chute){		
	console.log ("chute: "+chute);
		
	letras = palavraSecreta.split('');
	//console.log(letras);
			
		for (var i = 0; i < letras.length; i++) {
            var acertou = false;				
		
			if(chute == letras[i]){
				console.log('oi');
				lacunas[i] = chute;
				acertou = true;
			}
			
			if(acertou != true){
				var sprite = createSprite('.sprite');
				sprite.nextFrame();
				console.log('aqui');
			}
		//	console.log('aqui nao');
        }
	};
		
    // adiciona uma lacuna em branco para cada letra da palavraSecreta
    var criaLacunas = function () {
        for (let i = 0; i < palavraSecreta.length; i++) {
            lacunas.push('');
        }
		// OU poderia executar isso:    lacunas = Array(palavraSecreta.length).fill('');

    };

    // muda o estado da variável etapa para indicar a próxima e última etapa
    var proximaEtapa = function () {

        etapa = 2;
    };

    // guarda a palavra secreta, cria as lacunas e vai para a próxima etapa
    var setPalavraSecreta = function (palavra) {

        palavraSecreta = palavra;
        criaLacunas();
        proximaEtapa();
    };

    // única maneira de termos acesso às lacunas fora da função `criaJogo()`
    var getLacunas = function () {

        return lacunas;
    };

    // permite consultar em qual etapa o jogo se encontra
    var getEtapa = function () {

        return etapa;
    };

    /* 
    Tornou acessível apenas as funções que fazem sentido serem chamadas por quem utilizar nosso jogo. 
        A função `proximaEtapa()` é de uso interno e só foi criada para melhorar a legibilidade e manutenção do código, a 
        mesma coisa para a função `criaLacunas()`. 
    */    
    return {
        setPalavraSecreta: setPalavraSecreta, 
        getLacunas: getLacunas,
        getEtapa: getEtapa,
		processaChute: processaChute
    }
};