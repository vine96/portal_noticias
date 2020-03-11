<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"/>
</head>

<body>
<?php

if(!empty($_POST)){

	$date = $_POST['data'];

	$pedaco = explode("-", $date);

	$hoje = getdate();
	$idade = $hoje['year'] - $pedaco[0];
		if ($hoje['mon'] < $pedaco[1] || ($hoje['mon'] == $pedaco[1] && $hoje['mday'] < $pedaco[2])) {
		    $idade -= 1;
		}

	$cab = "From: ".$_POST['cName']." <".$_POST['cEmail'].">\n";

	$mensagem.= "Nome: ".$_POST['cName']." \n";

	$mensagem.= "Email: ".$_POST['cEmail']." \n";
	
	$mensagem.= "Telefone: ".$_POST['cTelefone']." \n";

	$mensagem.= "CEP: ".$_POST['cCep']." \n";

	$mensagem.= "Estado: ".$_POST['cEstado']." \n";

	$mensagem.= "Cidade: ".$_POST['cCidade']." \n";

	$mensagem.= "Endereço: ".$_POST['cEndereco'].", ".$_POST['cComplemento1']." - ".$_POST['cComplemento2']." \n";

	$mensagem.= "Número MTB DRT: ".$_POST['mtbdrt'].", ".$_POST['estados-brasil']." \n";

	//$mensagem.= "\nIdade: ".$idade. " anos";
	
	$mensagem.= "\nMensagem: ".$_POST['cMessage'];

	$assunto = "Interessado na carteira de Associado";

	if(mail("Cadastro ANAJ<suporte@anaj.com.br>", $assunto, $mensagem, $cab)){

		echo "<script type=\"text/javascript\">alert(\"Sua mensagem foi enviada com sucesso. ATENÇÃO! Para que possa receber mais informações, adicione o endereço eletrônico a seguir no seu cadastro de contatos de e-mail confiáveis: suporte@anaj.com.br\");  history.go(-1);document.assunto.reset();</script>\n";
	}

	else{

		echo "<script type=\"text/javascript\">alert(\"Ocorreu um erro ao tentar enviar sua mensagem.\");history.go(-1);</script>\n";
	}
	
}

else{

	echo "<script type=\"text/javascript\">history.go(-1);</script>\n";

}

?>
</body>
</html>


