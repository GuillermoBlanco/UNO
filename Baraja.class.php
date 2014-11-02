<?php
require_once 'Carta.class.php';
class Baraja {

    private $Cartas=array();
    private $Numeros=array(0,1,2,3,4,5,6,7,8,9);
    private $Palos=array('amarillo','azul','rojo','verde');


    function __construct() {
        foreach ($this->Palos as $palo)
			foreach ($this->Numeros as $i=>$num)
				$this->Cartas[]=new Carta($palo,$num);
    }

    function Barajar() {
	shuffle($this->Cartas);
	
    }
    function Mostrar(){
		foreach ($this->Cartas as $carta)$carta->Mostrar();
    }
    
	function getCarta(){
		return array_pop($this->Cartas);
	}
	function setCarta($n){
		array_push($this->Cartas,$n);
	}
}

?>