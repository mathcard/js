class InserirDemanda{
    constructor(){
        let $ = document.querySelector.bind(document);
        this._inputDtInicio = $('dtInicio');
        this._inputProduto = $('produto');
        this._inputTipoUser = $('tipoUser');
        console.log(_criaNegociacao());
    }
    //console.log('teste');
    adiciona(event){
        event.preventDefault();
        this._criaNegociacao();
        console.log('teste');
    }

    _criaNegociacao(){
        return new Demanda(
            this._inputDtInicio.value,
            this._inputProduto.value,
            this._inputTipoUser.value);
            console.log(Demanda);
    }
}