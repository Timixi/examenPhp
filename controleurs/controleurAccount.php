<?php
// Inclusion modèle
require('modeles/modeleMembre.php');

// Initialisation de la page
		
		if(isset($_GET['viewProfil'])){
			$getInfosMembre = getInfosMembre((int) $_GET['viewProfil']);
				if($getInfosMembre)
					require('vues/account/viewProfil.php');
				else
					header('location:index.php');

		}else{
			$getInfosMembre = getInfosMembre($_SESSION['idMembre']);
			require('vues/account/viewMyProfil.php');
		}

?>