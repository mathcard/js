function displayFields(form,customHTML){ 
	var usuario = getValue("WKUser");
	var nome = form.getValue("nome");
	var email = form.getValue("email");
	var perfil = form.getValue("perfil");
	var linkedin = form.getValue("linkedin");
	
	var interacao = 'Olá' +user+ ' o' +nome+ ' quer trabalhar conosco.' +
		'O seu perfil é '+perfil+' Você pode encontrar o trablaho dele no '+linkedin+'. Seu email é:'+email+'. Obrigado!'
		
	customHTML.append('<script>$(#mensagemInteracao).append("'+interacao+'")</script>');
	customHTML.append('<script>$(#mensagemInteracao).show();$(#formPrincipal).hide();</script>');
}