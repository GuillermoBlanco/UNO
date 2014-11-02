<?php
class Carta {

    private $Palo;
    private $Numero;
    
    function __construct($p, $n) {
        $this->setPalo($p);
	$this->setNumero($n);
    }

    function getPalo(){
	return $this->Palo;
    }
    function getNumero(){
	return $this->Numero;
    }
    function setPalo($p) {
	$this->Palo=$p;	
    }
    function setNumero($p) {
	$this->Numero=$p;	
    }
    function Mostrar(){
	echo '<img src="baraja_uno/'.  $this->getNumero().'_'.  $this->getPalo().'.bmp"></img>';
    }
    
}
?>