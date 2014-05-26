<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8" />
	<title>Triplib | accueil</title>
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" type="text/css" href="vues/includes/style/design-all.css" media="all" />
	<link rel="stylesheet" type="text/css" href="vues/includes/style/design-form.css" media="all" />
	<link rel="stylesheet" type="text/css" href="vues/includes/style/design-home.css" media="all" />
	<link rel="stylesheet" type="text/css" href="vues/includes/style/design-profil.css" media="all" />

	<link rel="stylesheet" type="text/css" href="vues/includes/font/font-import.css" media="all" />
	<link rel="stylesheet" type="text/css" href="vues/includes/style/mediaqueries.css" media="all" />
	<link rel="stylesheet" type="text/css" href="vues/includes/style/reset.css" media="all" />
	
	<script src="vues/includes/js/jquery-2.1.0.min.js"></script>
	<script src="vues/includes/js/main.js"></script>
</head>

<body>
<header>

	<div id="nav-principal">
		
		<div id="nav-content">
			<div class="logo"><a href="index.php?home">logo</a></div>

			<div class="recherche">
				<a href="#">recherche</a>
			</div><!--fin div recherche-->

			<ul class="connection">
				<?php
				if($session)
				{
				?>
				<li class="first-connect"><a href="index.php"><span class="profil"><?php echo $_SESSION['prenom']; ?></span><span class="arrow">arrow</span></a></li>
				<ul class="sub-menu">
					<li><a href="index.php?logout">Se déconnecter</a></li>
				</ul>
				<?php
				}
				else
				{
				?>
				<li><a href="index.php?auth"><span class="profil">Connection</span><span class="arrow">arrow</span></a></li>
				<ul class="sub-menu">
					<li><a href="index.php?register">Inscription</a></li>
				</ul>
				<?php
				}
				?>
			</ul>
		</div>

	</div><!--fin div nav-principal-->

</header>