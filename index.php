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
		$sql = ("SELECT * FROM livros WHERE idlivro = $idlivro");
		$resposta = mysqli_query($conn, $sql);
		if(mysqli_num_rows($resposta) > 0){ //Se BD retornar uma linha é porque existe o livro
			$registro = mysqli_fetch_object($resposta);
			$xml->addTag('titulo', $registro->titulo);
			$xml->addTag('autor', $registro->autor);
			$xml->addTag('genero', $registro->genero);
			$xml->addTag('editora', $registro->editora);
		}
		else{ //senão encontrou nada, pois não existe o livro
			$msgerro = 'Livro não encontrado!';	
		}
	}

if(isset($msgerro)){
	$xml->addTag('msgerro', $msgerro);
}

$xml->closeTag("response"); //Fechar a tag response

echo $xml;		


?>