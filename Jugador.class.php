<?php
require_once 'Carta.class.php';
class Jugador {

    private $Nombre;
    private $Dinero;
    private $Cartas=array();
    
    function __construct($n, $d) {
        $this->setDinero($d);
		$this->setNombre($n);
    }

    function getNombre(){
	return $this->Nombre;
    }
    function getDinero(){
	return $this->Dinero;
    }
    function setNombre($n) {
	$this->Nombre=$n;	
    }
    function setDinero($d) {
	$this->Dinero=$d;	
    }
	function setCartas($n){
		$this->Cartas[]=$n;
	}
	function getCarta($n){//quita la carta deseada
		$carta=array_splice($this->Cartas,$n,1);
		return $carta[0];
	}
    function Mostrar(){
	foreach ($this->Cartas as $carta) $carta->Mostrar();
    }
    function MostrarconLinks(){
	foreach ($this->Cartas as $i=>$carta){
	    echo '<a href="'.$_SERVER['PHP_SELF'].'?carta='.$i.'">';
	    $carta->Mostrar();
	    echo '</a>';
	    }
	echo '<a href="'.$_SERVER['PHP_SELF'].'?robar=1">Robar</a>';
	echo '<a href="'.$_SERVER['PHP_SELF'].'?pasa=1">Pasar</a>';
    }
	function ContarCartas(){
		return count($this->Cartas);
	}
	function MostrarPDF(){ //Falta implementar
	    
	}
    
}
?>