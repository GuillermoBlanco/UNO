<?php
require_once 'Baraja.class.php';
require_once 'Jugador.class.php';


class Partida {

    private $Baraja;
    private $Jugadores=array();
    private $Tapete=array();
    private $Turno;
	
    function __construct($nJugador) {
		$this->Baraja=new Baraja;
		$this->Baraja->Barajar();
		$this->Turno=0;
		for($i=0;$i<$nJugador;$i++){
			$this->Jugadores[]=new Jugador($i,10);
		}
		$this->PonerCarta($this->Baraja->getCarta());
    }
    function Jugar(){
	if(isset($_GET['pdf'])) $this->Jugadores[$_GET['pdf']]->MostrarPDF();
	else{
	    if(isset($_GET['carta'])) $this->TirarCarta($_GET['carta']);
	    if(isset($_GET['pasa'])) $this->PasaTurno();
	    if(isset($_GET['robar'])) $this->RobarCarta();
	    $this->MostrarTodo();
	}
    }
	function PasaTurno(){
		if($this->Turno<count($this->Jugadores)-1){
			$this->Turno++;
		}else{
			$this->Turno=0;
		}
	}
	function MostrarTapete(){
		foreach ($this->Tapete as $carta) $carta->Mostrar();
    }
	function MostrarTodo(){
		$this->MostrarTapete();
		echo $this->Turno;
		echo '<br/>';
		foreach ($this->Jugadores as $i=>$cartaJugador){
		    if($this->Turno==$i){
			$cartaJugador->MostrarconLinks();
			echo '<a href="'.$_SERVER['PHP_SELF'].'?pdf='.$i.'">PDF</a>';
		    }
		    else $cartaJugador->Mostrar();
		    echo '<br/>';
		}
    }
	function PonerCarta($carta){//entra objeto carta
		$this->Tapete[]=$carta;
	}
	function GanarPartida(){
		if($this->Jugadores[$this->Turno]->ContarCartas()==0){
			return $this->Turno;
		}else{
			return -1;
		}
	}
	function TirarCarta($ncarta){  ////entra posicion de la carta en la mano del jugador
		$carta=$this->Jugadores[$this->Turno]->getCarta($ncarta);
		if($carta->getPalo()==$this->Tapete[(count($this->Tapete)-1)]->getPalo() || $carta->getNumero()==$this->Tapete[(count($this->Tapete)-1)]->getNumero()){
			$this->PonerCarta($carta);
			$this->PasaTurno();
		}else{
			$this->Jugadores[$this->Turno]->setCartas($carta);
		}
	}
        function RobarCarta (){
                $this->Jugadores[$this->Turno]->setCartas($this->Baraja->getCarta());
        }
        
        function RepartirCartas($n){
                foreach($this->Jugadores as $jugador){
                        for($j=0;$j<$n;$j++){
                                $jugador->setCartas($this->Baraja->getCarta());
                        }
                }
	}
	
}
?>