<?php

class Xml{

    //atributos
	private $xml;
	private $tab = 1; //espaçamento a esquerdo com valor 1
    
    /*método construtor para que toda vez for instanciado a classe XML 
	por padrão vai ser criado o cabeçalho desse xml*/
	public function __construct ($version = '4.0', $encode = 'utf8') {	
        $this->xml .= "<?xml version='$version' encoding='$encode' ?>\n";  
    }

	//metodo para abrir determinada tag, pois o xml é composto por diversas maracações ou tags 
	public function openTag($name){
		$this->addTab();
		$this->xml .= "<$name>\n";
		$this->tab++;	
	}	
	
	//método para fechar uma tag.
	public function closeTag($name){
		$this->tab--; 
		$this->addTab();
		$this->xml .= "</$name>\n";
	}
	
	public function setValue($value){
		$this->xml .= "$value\n";
	}

	//método para indentar o código, no qual ele adiciona os \t para o código ficar mais organizado
	// cada valor que tiver na variável tab é numero de vezes que vai dar \t
	private function addTab(){
		for ($i = 1; $i <= $this->tab; $i++){
			$this->xml .= "\t";
		} 
    }

	//método para adicionar tag
	public function addTag($name, $value){
		$this->addTab();
		$this->xml .= "<$name>$value</$name>"; 
    }

	public function __toString(){
		return $this->xml;
	}	
}
?>