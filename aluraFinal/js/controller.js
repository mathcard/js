var criaController = function (jogo) {

    var $entrada = $('#entrada');
    var $lacunas = $('.lacunas');

    var exibeLacunas = function () {
        $lacunas.empty();
		jogo.getLacunas().forEach(function(lacuna){
			$('<li>').addClass('lacuna').append(lacuna).appendTo($lacunas);
		});
    };

    var mudaPlaceHolder = function (texto) {
		$entrada.attr('placeholder', texto);        
    };

    var guardaPalavraSecreta = function () {
		try{
			jogo.setPalavraSecreta($entrada.val().trim());
			$entrada.val('');
			mudaPlaceHolder('chuta');
			exibeLacunas();			
		}catch(err){
			alert(err.message);
		}
    };

	var reinicia = function(){
		jogo.reinicia();
        $lacunas.empty();
        mudaPlaceHolder('palavra secreta');
		alert('eba');
	}
	var lerChute = function(){
		
        try{
			var chute = $entrada.val().trim().substr(0, 1);
			$entrada.val('');
			jogo.processaChute(chute);
			exibeLacunas();
			
			if(jogo.ganhouOuPerdeu()){
				setTimeout(function(){
					if(jogo.ganhou()){
						alert('Parabéns, você ganhou');
					}else if(jogo.perdeu()){
						alert('Que pena, tente novamente');
					}
					reinicia();							
				},200);
			}
		}catch(err){
			alert(err.message);
		}	
	};
	
    var inicia = function () {

        $entrada.keypress(function (event) {
            if (event.which == 13) {
                switch (jogo.getEtapa()) {
                    case 1:
                        guardaPalavraSecreta();
						//mudaPlaceHolder();						
                        break;
                    case 2:
                        lerChute();
                        break;
                }
            }
        });
    }
    return { inicia: inicia };
};


//criaController(criaJogo(createSprite('.sprite'))).inicia();