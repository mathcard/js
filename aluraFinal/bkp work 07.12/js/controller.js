var criaController = function (jogo) {

    var $entrada = $('#entrada');
    var $lacunas = $('.lacunas');

    var exibeLacunas = function () {
        
		console.log('falta implementar');
    };

    var mudaPlaceHolder = function (texto) {
		$entrada.attr({placeholder:"Chute"});        
    };

    var guardaPalavraSecreta = function () {
		var palavra = $entrada.val();
        console.log(palavra);
    };

    var inicia = function () {

        $entrada.keypress(function (event) {
            if (event.which == 13) {
                switch (jogo.getEtapa()) {
                    case 1:
                        guardaPalavraSecreta();
						//mudaPlaceHolder();
						alert('etapa 1 - falta implementar');
                        break;
                    case 2:
                        mudaPlaceHolder();
						alert('etapa 2 - falta implementar');
                        break;
                }
            }
        });
    }
    return { inicia: inicia };
};


criaController(criaJogo(createSprite('.sprite'))).inicia();