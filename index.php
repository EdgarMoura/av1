<?php

require_once('Xml.Class.php'); //Busco a minha classe
require_once('config.php'); //Busca a minha configuração de Banco de dados(ws) 

$xml = new Xml(); //cria uma instancia do tipo xml, ou seja da classe xml

//$erro = 0; //Incializei a variável erro como 0

if(isset($_GET['id'])){
 $idproduto = $_GET['id']; //buscar id da url quando realiza a busca.  
}
 
$xml->openTag("response"); //Abrir a tag response, ou seja a tag principal do corpo do xml 

	if(empty($idproduto)){ // Verifico se o idproduto está vazio e então exibe uma msg de erro.

		$msgerro = 'Código inválido!';
	}
	else{ //Senão executa a query no banco de dados
		$sql = ("SELECT * FROM produto WHERE idproduto = $idproduto");
		$resposta = mysqli_query($conn, $sql);
		if(mysqli_num_rows($resposta) > 0){ //Se BD retornar uma linha é porque existe produto
			$registro = mysqli_fetch_object($resposta);
			$xml->addTag('nome_produto', $registro->nome_produto);
			$xml->addTag('valor', $registro->valor);
		}
		else{ //senão encontrou nada, pois não existe o produto
			$msgerro = 'Produto não encontrado!';	
		}
	}

if(isset($msgerro)){
	$xml->addTag('msgerro', $msgerro);
}

$xml->closeTag("response"); //Fechar a tag response

echo $xml;		


?>