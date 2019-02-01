class Negociacao{
	// O anderline (_)antes das variaveis, bloqueia o acesso fora da classe
	constructor( data, quantidade, valor){
		this._data = new Date(data.getTime()); // Encapsulamento a data ao extremo
		this._quantidade = quantidade;
		this._valor = valor;
		
		// Congelando os valores do objeto
		Object.freeze(this); 
	}
	get volume(){
		return this._quantidade * this._valor;
	}
	
	get data(){
		//return this._data;
		return new Date(this._data.getTime());
	}
	
	get quantidade(){
		return this._quantidade;
	}
	
	get valor(){
		return this._valor;
	}
}

class Pessoa{
	constructor(nome, sobrenome){
		this.nome = nome;
		this.sobrenome = sobrenome;
	}
	obtemNomeCompleto(){
		return this.nome +' '+ this.sobrenome;
	}
}

/* Métodos Gets declarados de forma diferente
class Conta {

    constructor(titular, conta) {
        this._titular = titular;
        this._conta = conta;
        this._saldo = 0.0;
    }

    deposita(valor) {
        console.log('Valor depositado: ' + valor);
        this._saldo+=valor; 
    }

    getSaldo() {
        return this._saldo;
    }

    getTitular() {
        return this._titular;
    }

    getConta() {
        return this._conta;
    }
}
*/