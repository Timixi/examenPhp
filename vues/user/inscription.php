<?php

/********Entête et titre de page*********/

include('vues/includes/header.php'); //contient le doctype, et head.

/**********Fin entête et titre***********/
?>

<div id="container">

	<section class="introduction bckg-home">
		
		<div id="content">

			<div class="formInscription">
				<h2>Inscris-toi sur Triplib</h2>
				<div id="form-two">
						<p><a href="#" class="google">Inscription avec <span>Google+</span></a></p>
						<p><a href="#" class="dropbox">Inscription avec <span>Dropbox</span></a></p>
				</div><!--fin div form-two-->

				<div id="form-one">
				<?php 
				if(isset($error))
				{
					echo '<p class="erreur">' . $error . '</p>';
				}
				if(!isset($register) || $register == false)
				{
				?>
				
					<form method="post" action="index.php?register">
						<label for="nom">Ton prénom</label>
						<input class="prenom" type="text" name="prenom" id="prenom" placeholder="Ton prénom" value="<?php if(isset($prenom)) echo $prenom; ?>"/>

						<label for="prenom">Ton nom</label>
						<input class="nom" type="text" name="nom" id="nom" placeholder="Ton nom" value="<?php if(isset($nom)) echo $nom; ?>"/>

						<label for="email">Ton adresse mail</label>
						<input class="email" type="text" name="email" id="email" placeholder="Ton adresse mail" value="<?php if(isset($email)) echo $email; ?>"/>

						<label for="mot_pass">Ton mot de passe</label>
						<input class="pass" type="password" name="mot_pass" id="mot_pass" placeholder="Ton mot de passe"/>

						<input class="button" type="submit" name="addUser" value="inscription"/>
					</form>
				
				<?php 
					}else{
						echo '<p class="enregistrer">Merci, un email de confirmation vous a été envoyé.</p>';
					}
				?>
				</div><!--fin div form-one-->
			</div>

		</div><!--fin div content-->

	</section>

</div><!--fin div container-->

<?php
include('vues/includes/footer.php');
?>