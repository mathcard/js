<?php require "modelo.php";
#antigo T02f.php
 ?>
<script type="text/javascript">
/* Máscaras ER */
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id( el ){
	return document.getElementById( el );
}
window.onload = function(){
	id('cl_fone1').onkeypress = function(){
		mascara( this, mtel );
	}
	id('cl_fone2').onkeypress = function(){
		mascara( this, mtel );
	}
}
</script>
 
 <div style="margin-left:33%;padding:70px 0">
        <div class="logo">Cadastrar Cliente</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" method="post" action="inCliente.php">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="cl_nome" class="sr-only">Nome</label>
                            <input type="text" class="form-control" id="cl_nome" name="cl_nome" placeholder="Nome" maxlength="50" required />
                        </div>
						<div class="form-group">
                            <label for="cl_prof" class="sr-only">Profissão</label>
                            <input type="text" class="form-control" id="cl_prof" name="cl_prof" placeholder="Profissao" maxlength="35" required />
                        </div>
						<div class="form-group">
                            <label for="cl_rg" class="sr-only">RG</label>
                            <input type="text" class="form-control" id="cl_rg" name="cl_rg" placeholder="RG" maxlength="7" required />
                        </div>
						<div class="form-group">
                            <label for="cl_cpf" class="sr-only">CPF</label>
                            <input type="text" class="form-control" id="cl_cpf" name="cl_cpf" placeholder="CPF" maxlength="11" required />
                        </div>
						<div class="form-group">
                            <label for="cl_fone1" class="sr-only">Telefone 1</label>
                            <input type="text" class="form-control" id="cl_fone1" name="cl_fone1" placeholder="Fone 1" maxlength="15" required />
                        </div>
						<div class="form-group">
                            <label for="cl_fone2" class="sr-only">Telefone 2</label>
                            <input type="text" class="form-control" id="cl_fone2" name="cl_fone2" placeholder="Fone 2" maxlength="15" required />
                        </div>
						<div class="form-group">
                            <label for="cl_email" class="sr-only">Email</label>
                            <input type="text" class="form-control" id="cl_email" name="cl_email" placeholder="Email" maxlength="80" required />
                        </div>																								
                        <div class="form-group">               
                            <label for="cl_cep" class="sr-only">CEP</label>
                            <input type="number" class="form-control" id="cl_cep" name="cl_cep" placeholder="CEP" required />
                        </div>
                        <div class="form-group">
                            <label for="cl_rua" class="sr-only">Logradouro</label>
                            <input type="text" class="form-control" id="cl_rua" name="cl_rua" placeholder="Logradouro" maxlength="60" required />
                        </div>
                        <div class="form-group">
                            <label for="cl_comp" class="sr-only">Complemento</label>
                            <input type="text" class="form-control" id="cl_comp" name="cl_comp" placeholder="Complemento" maxlength="60" required />
                        </div>
                        <div class="form-group">
                            <label for="cl_numend" class="sr-only">Número</label>
                            <input type="text" class="form-control" id="cl_numend" name="cl_numend" placeholder="Número" maxlength="10" required />
                        </div>
                        <div class="form-group">
                            <label for="cl_bairro" class="sr-only">Bairro</label>
                            <input type="text" class="form-control" id="cl_bairro" name="cl_bairro" placeholder="Bairro" maxlength="40" required />
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <label for="cl_city" class="sr-only">Cidade</label>
                                        <input type="text" class="form-control" id="cl_city" name="cl_city" placeholder=" Cidade" maxlength="50" required />
                                    </div>
                                </div>                               
							</div>
						</div>
                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <a href="listarCliente.php">Voltar</a>
                </div>
            </form>
        </div>        
    </div>
</body>

<script type="text/javascript" >
        $(document).ready(function() {
            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#cl_rua").val("");
                $("#cl_comp").val("");
                $("#cl_bairro").val("");
                $("#cl_city").val("");
                $("#cl_numend").val("");                
            }            
            //Quando o campo cep perde o foco.
            $("#cl_cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#cl_rua").val("...");
                        $("#cl_comp").val("...");
                        $("#cl_bairro").val("...");
                        $("#cl_city").val("...");
                        $("#cl_numend").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#cl_rua").val(dados.logradouro);
                                $("#cl_comp").val(dados.complemento);
                                $("#cl_bairro").val(dados.bairro);
                                $("#cl_city").val(dados.localidade);
                                $("#estado select").val(dados.uf);
                                $("#cl_numend").val(dados.gia);

                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
    </script>
    </html>