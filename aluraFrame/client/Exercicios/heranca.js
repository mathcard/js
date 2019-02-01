class Funcionario {

    constructor(nome) {
        this._nome = nome;
    }

    get nome() {
        return this._nome;
    }

    set nome(nome) {
        this._nome = nome;
    } 
}

class Secretaria extends Funcionario {

    constructor(nome, funcionario) {
        super(nome); // cuidado, tem que ser a primeira instrução! Busca construtor da super classe
        this._funcionario = funcionario;
    }

    atenderTelefone() {
        console.log(`${this._nome} atendendo telefone` );
    }
}



 
/* Para testar abrar o arquivo upload.html e digite no console: 

let secretaria = new Secretaria('Suzete', 'Math');
*/