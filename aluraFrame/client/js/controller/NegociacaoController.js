/*
Desta forma  a querySelector é realizada uma busca em todo DOM, sobrecarregando a aplicação
class NegociacaoController{
	adiciona(event){
		event.preventDefault();
		
		// querySelector é uma função do document para funcionar precisa usar: .bind(document)
		let $ = document.querySelector.bind(document);

		let inputData = $('#data');
		let inputQuantidade = $('#quantidade');
		let inputValor = $('#valor');

		console.log(inputData.value);
		console.log(inputQuantidade.value);
		console.log(inputValor.value);
	}
	
}
*/

class NegociacaoController{
	// Com o constructor evita-se percorrer o DOM varias vezes
	constructor(){
		// querySelector é uma função do document para funcionar precisa usar: .bind(document)
		let $ = document.querySelector.bind(document);

		// O _ indica que poderão ser usados apenas pelos métodos da Classe 
		this._inputData = $('#data');
		this._inputQuantidade = $('#quantidade');
		this._inputValor = $('#valor');
		this._listaNegociacoes = new ListaNegociacoes();

		this._negociacoesView = new NegociacoesView($('#negociacoesView'));
		this._negociacoesView.update(this._listaNegociacoes);
		
		this._mensagem = new Mensagem();
		this._mensagemView = new MensagemView($('#mensagemView'));
		this._mensagemView.update(this._mensagem);
	}
		
	adiciona(event){
		event.preventDefault();
		this._listaNegociacoes.adiciona(this._criaNegociacao());
		this._negociacoesView.update(this._listaNegociacoes);
	
		this._mensagem.texto = 'Negociacao adicionada com sucesso';
		this._mensagemView.update(this._mensagem);  
	
		this._limpaFormulario(); 
	}

	_criaNegociacao(){
		return new Negociacao(
			DateHelper.textoParaData(this._inputData.value),
			this._inputQuantidade.value,
			this._inputValor.value);
	}

	_limpaFormulario(){
		this._inputData.value = '';
		this._inputQuantidade.value = 1;
		this._inputValor.value = 0.0;
		this._inputData.focus();
	}
}


/*
 EXERCICIO DOS ALUNOS APROVADOS
class Aluno {

    constructor(matricula, nome) {
        this.matricula = matricula;
        this.nome = nome;
    }
}

class Prova {

    constructor(aluno, nota) {
        this.aluno = aluno;
        this.nota = nota;
    }
}

var avaliacoes = [
    new Prova(new Aluno(1, 'Luana'), 8),
    new Prova(new Aluno(2, 'Cássio'), 6),
    new Prova(new Aluno(3, 'Barney'), 9),
    new Prova(new Aluno(4, 'Bira'), 5)
];

let aprovados = avaliacoes
    .filter((prova) => prova.nota >= 7)
    .map((prova) => prova.aluno.nome);

console.log(aprovados);
*/
// Verificar o tipo da variavel: console.log(typeof(this._inputData.value));
		//console.log('Original: '+ this._inputData.value);
				
		// ASSIM FUNCIONA MAS O CARA QUER COMPLICAR
		//let data = new Date(this._inputData.value.split('-'));
		// OU ASSIM let data = new Date(this._inputData.value.replace(/-/g, ','));
				
		//let helper = new DateHelper();