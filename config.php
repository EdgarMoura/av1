<?php

$servername = "localhost";
$username = "root";
$password = "";

// Cria a conexão
$conn =  mysqli_connect($servername, $username, $password);


// Verifica a conexão
if (!$conn) {
    die('Conexão falhou: ' . mysql_error());
} 

// conexao com bd tcc
$db_selected = mysqli_select_db($conn, 'ws');
if(!$db_selected){
	die(' Não pode Conectar com o bd ws: ' . mysql_error());
}	

?>