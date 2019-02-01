function externo(){

		var pessoa = {
		    Nome          : "Wilson",
		    Sobrenome     : "Bizon",
		    Departamento  : "fluig"
		};

		document.getElementById("local").innerHTML =
		pessoa.Nome + " trabalha no " + pessoa.Departamento + "<br />" + pessoa.Nome + " " + pessoa.Sobrenome;

}