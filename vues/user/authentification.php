<?php
/********Entête et titre de page*********/

include('vues/includes/header.php'); //contient le doctype, et head.

/**********Fin entête et titre***********/
?>

<div id="container">

	<section class="introduction bckg-home">

		<div id="content">
			
			<div class="formConnection">
				<h2>Connecte-toi sur Triplib</h2>
				<div id="form-two">
						<p><a href="#" class="google">Connection avec <span>Google+</span></a></p>
						<p><a href="#" class="dropbox">Connection avec <span>Dropbox</span></a></p>
				</div><!--fin div form-two-->
				<div id="form-three">
					<?php if(isset($error)) echo '<p class="erreur">' . $error . '</p>'; ?>
					<form action="index.php?auth" method="post">
					
						<label for="email">Adresse email</label>
						<input class="co-email" type="text" name="email" placeholder="Ton email" value="<?php if(isset($email)) echo $email; ?>"/>
					
						<label for="passe">Mot de passe</label>
						<input class="co-pass" type="password" name="mot_pass" placeholder="Ton mot de passe"/>
						<p><a href="#" class="oubli">Mot de passe oublié ?</a></p>
						<input class="button" type="submit" name="authUser" value="Se connecter"/>
					</form>
				</div><!--fin div form-three-->
			</div>

		</div><!--fin div content-->

	</section>


</div><!--fin div container-->
<?php
include('vues/includes/footer.php');
?>