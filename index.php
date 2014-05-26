<?php
// MAIN CONTROLLER ========================
session_start();
// INITIALISATION DE SESSIONS
if(!isset($_SESSION['log'])){
	$_SESSION['log'] = false;
}
$session = $_SESSION['log'];

// INCLUSION DE LA CONNEXION A LA BDD
require('modeles/configuration.php');
$bdd = bdd::getInstance();

if($session){
	if(isset($_GET['logout'])){
		session_destroy();
		session_unset();
		header('location:index.php');
	}else if(isset($_GET['voyage']))
		require 'controleurs/controleurVoyage.php';
	else if(isset($_GET['home']))
		require 'controleurs/controleurUser.php';
	else
		require 'controleurs/controleurAccount.php';
}else{
		require 'controleurs/controleurUser.php';
}


?>