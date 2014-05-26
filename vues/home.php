<?php
/*
Liste des fonctions :
--------------------------
Aucune fonction
--------------------------


Liste des informations/erreurs :
--------------------------
Aucune information/erreur
--------------------------
*/

/********Entête et titre de page*********/

include('vues/includes/header.php'); //contient le doctype, et head.

/**********Fin entête et titre***********/
?>

<div id="container">

	<section class="introduction bckg-home">

		<div id="content">
			<div class="message">
				<h1 class="titre-logo">Triplib</h1>
				<p>Derrière chaque voyage se trouvent des images et des histoires.</p>
				<p>Avec Triplib, sauvegardez chaque moment de votre voyage.</p>
				<p>Racontez vos coups de coeur, vos rencontres, vos meilleurs souvenirs.</p>
				<p>Venez découvrir les récits d'autres voyageurs et partager leurs expériences !</p>
				<div class="bouton-message">
					<a href="index.php?auth">connection</a>
					<a href="index.php?register">inscritption</a>
				</div>
			</div>
		</div><!--fin div content-->
		
	</section><!--fin section introduction-->

</div>
<?php
include('vues/includes/footer.php');
?>