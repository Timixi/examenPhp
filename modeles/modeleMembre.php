<?php
// CE FICHIER CONTIENT TOUTES LES REQUETES RELATIVES A LA TABLE MEMBRE



// SELECTION D'UN MEMBRE EN FONCTION DE SON EMAIL (UTILISE LORS DE LA CONNEXION)
function getConnexion($email){
	global $bdd;
	$query = $bdd->prepare('SELECT * FROM membres WHERE emailMembre = ?');
	$query -> execute(array($email));
	
	if($query -> rowCount() == 0)
		return false; // Si le membre nexiste pas on retourne faux
	else
		return $query -> fetch(); // Sinon on retourne ses infos...
}


// AJOUT D'UN NOUVEAU MEMBRE
function addMembre($infos){
	// $infos contient le tableau $_POST
	global $bdd;
	$query = $bdd -> prepare("INSERT INTO membres (nomMembre ,prenomMembre ,emailMembre ,passMembre) VALUES (?, ?, ?, ?)");
	$query -> execute(array($infos['nom'], $infos['prenom'], $infos['email'], sha1($infos['mot_pass'])));
	$lastId = $bdd -> lastInsertId();
		return $lastId;
}

function isExist($email){

	global $bdd;
	$query = $bdd->prepare('SELECT * FROM membres WHERE emailMembre = ?');
	$query -> execute(array($email));
	
	if($query -> rowCount() >= 1)
		return true; 
	else
		return false;
}

function getInfosMembre($id){
	global $bdd;
	$query = $bdd -> prepare("SELECT * FROM membres WHERE idMembre = ?");
	$query -> execute(array($id));
		return $getInfos = $query -> fetch();

}

?>