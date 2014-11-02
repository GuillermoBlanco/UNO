<?php
require_once 'Partida.class.php';
session_start();
if(!isset($_SESSION['partida'])){
    $_SESSION['partida']=new Partida(3);
    $_SESSION['partida']->RepartirCartas(7);
}

$_SESSION['partida']->Jugar();

//session_destroy();
?>
