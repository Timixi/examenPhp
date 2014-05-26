<?php

/********Entête et titre de page*********/

include('vues/includes/header.php'); //contient le doctype, et head.

/**********Fin entête et titre***********/
?>

<div id="container">

	<section class="introduction bckg-home">

	<span id="idMembreForMap" style="display:none"><?php echo $getInfosMembre['idMembre']; ?></span>

		<div id="content">
				<div class="descritption">
					<p class="bonjour">Bonjour,</p>
					<p class="nomMembre"><?php echo $getInfosMembre['prenomMembre']; ?> <?php echo $getInfosMembre['nomMembre']; ?></p>
					
				</div>
		</div><!--fin div content-->

	</section>

</div><!--fin div container-->
<?php
include('vues/includes/footer.php');
?>