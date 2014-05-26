<?php
// INCLUSION DE SON MODELE
require ('modeles/modeleMembre.php');

// CONTROLEUR USER 

	// =====================================  AUTHENTIFICATION ==========================================		
			if(isset($_GET['auth'])){

				if(isset($_POST['authUser'])){ 
					// SI LE FORMULAIRE DE CONNEXION EST SOUMIS SUR LA PAGE AUTHENTIFICATION VIA LE FORMULAIRE
					$email = trim($_POST['email']);
					$mot_pass = trim($_POST['mot_pass']);
					$pass = sha1($mot_pass);
					$infosUser = getConnexion($email); // Récupère les infos du user sous forme de tableau. Cette variable vaut faux si l'email est incorrecte

					if(empty($email) && empty($mot_pass))
						$error = 'Champs imcomplets!';
					else if(!getConnexion($email)) // Si la fonction renvoie faux .. (voir modele)
						$error  = 'Cette adresse email n\'existe pas!';
					else if($pass != $infosUser['passMembre'])
						$error = 'Mot de passe incorrect';
					else{
						$_SESSION['idMembre'] = $infosUser['idMembre']; 
						$_SESSION['prenom'] = $infosUser['prenomMembre']; 
						$_SESSION['log'] = true;
						header('Location:index.php'); 
					}
				}
			// Inclusion de vue	
			require('vues/user/authentification.php');
	// =====================================  INSCRPTION ================================================	
			}else if(isset($_GET['register'])){
				
				if(isset($_POST['addUser'])){	
	            	// SI UN MEMBRE VEUT S'INSCRIRE SUR LA PAGE INSCRIPTION VIA LE FORMULAIRE
					$nom = trim($_POST['nom']);
					$prenom = trim($_POST['prenom']);
					$email= trim($_POST['email']);
					$mot_pass = trim($_POST['mot_pass']);
					$register = false;
					
					if(empty($nom) && empty($prenom) && empty($email) && empty($mot_pass))
						$error = 'champs incomplets !';
					else if(!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#is', $email))
						$error = 'Adresse email éronné';
					else if(isExist($email))
						$error = 'Cette adresse email est deja utilisée';
					else{
						$lastId = addMembre($_POST); // enregistrement dans la bases de données et récupération du id
						$register = true;
					}
				
				//confirmation email

			    // Sujet du mail envoyé
			    $conf_subject = 'Confimartion d\'inscritption';
			    // De qui est le mail 
			    $conf_sender = 'Triplib <triplib-admin@triplib.com>';
			    $msg = $_POST['prenom'] . ",\n\nMerci de vous être inscrit sur Triplib. \n\n Vous vous êtes enregistré avec l'adresse mail:".$email."\n\n Votre mot de passe à ne pas oublier:".$mot_pass;
			    	mail( $_POST['email'], $conf_subject, $msg, 'From: ' . $conf_sender );
				
				}
				// INCLUSION VUE
				require('vues/user/inscription.php');
			}else{
				require('vues/home.php');
			}
?>