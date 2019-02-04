class ListaNegociacoes{
    constructor(){
        this._negociacoes = [];             
    }

    adiciona(negociacao){
        //this._negociacoes.push(negociacao);        
        //Reflect.apply(this._armadilha, this._contexto, [this]);
        this._negociacoes = [].concat(this._negociacoes, negociacao);

    }

    get negociacoes(){
        // Se utilizarmos apenas o:  return this._negociacoes; É possivel alterar os valores fora da classe
        // Desta forma é emitida apenas uma cópia da lista
        return [].concat(this._negociacoes);
    }

    esvazia(){
        this._negociacoes = [];        
    }
}

/* Como era antes de usar com Proxy
class ListaNegociacoes{
    constructor(armadilha){
        this._negociacoes = [];
        this._armadilha = armadilha; 
     //   this._contexto = contexto;
    }

    adiciona(negociacao){
        this._negociacoes.push(negociacao);
        this._armadilha(this);
        //Reflect.apply(this._armadilha, this._contexto, [this]);
    }

    get negociacoes(){
        // Se utilizarmos apenas o:  return this._negociacoes; É possivel alterar os valores fora da classe
        // Desta forma é emitida apenas uma cópia da lista
        return [].concat(this._negociacoes);
    }

    esvazia(){
        this._negociacoes = [];
        this._armadilha(this);
       // Reflect.apply(this._armadilha, this._contexto, [this]);
    }
}
*/
