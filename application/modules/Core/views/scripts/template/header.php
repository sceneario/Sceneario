<?php
require('functions.php'); 
if (isLteIE6()) { header('Location: ie6/index.php'); }
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Sceneario</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/infobar.css"> <!-- Barre Chromeframe si IE<9-->
        <link rel="stylesheet" href="css/sceneario.css"> <!-- Accueil/Styles de base-->
        <link rel="stylesheet" href="css/album-serie.css"> <!-- Pages album et série -->
        <link rel="stylesheet" href="css/recherche.css"> <!-- Page Recherche -->
        <link rel="stylesheet" href="css/bedetheque.css"> <!-- Page Bédéthèque -->
		<link rel="stylesheet" href="css/scrollbar.css">
	    <link rel="stylesheet" href="css/lightbox.css">
		<!--[if lt IE 9]> <link rel="stylesheet" href="css/ie.css"> <![endif]-->
		<!--[if IE 7]> <link rel="stylesheet" href="css/ie7.css"> <![endif]-->

        <script src="js/vendor/modernizr-2.6.1.min.js"></script>
    </head>
    <body>
		<?php 
		if (isLtIE9()) {
			echo '<div id="infobar" class="infobar"><span class="info"></span>Sceneario vous propose de télécharger "Chrome Frame", afin d\'améliorer le rendu visuel de son site. (<a href="chromeframe/index.php">En savoir plus</a>)<a href="" title="Fermer" class="close">Fermer</a></div>';
		}
		?>
        
        
        <!-- FACEBOOK SDK -->
        <div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1&appId=277280558967434";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
        
        
        <header>
        	
        	<!-- Entete publicitaire -->
        	<div id="pub">
        		<div>
        			<a href="#"><img src="img/temp/bannpub.jpg" alt="" height="90"></a>
        		</div>
        	</div><!-- pub -->
        	
        	<div id="main-head">
        	
	        	<!-- Entete logo -->
	        	<div id="head-container">
		        	<div id="head">
			        	<div id="logo"><a href="#"><img src="img/logo_sceneario.png" alt="Sceneario.com - Toute la BD sur internet"></a></div><!-- logo -->
			        	<div class="search"><form><input type="text" placeholder="Rechercher"></form></div><!-- search -->
		        	</div><!-- head -->
	        	</div><!-- head-container -->
	        	
	        	<!-- Menu -->
	        	<div id="nav-container">
		        	<nav id="mainnav">
		        		<a href="#" class="btn_mauve"><img src="img/header_connect_icon.png" alt=""> se connecter</a>
		        		<ul>
			        		<li><a href="#" class="selected">Accueil</a></li>
			        		<li><a href="#">Actualités</a></li>
			        		<li><a href="#">Bédéthèque</a></li>
			        		<li><a href="#">Toute la bd</a></li>
			        		<li><a href="#">Concours</a></li>
		        		</ul>
		        		<div class="clear"></div>
		        	</nav><!-- mainnav -->
	        	</div><!-- nav-container -->
        	
        	</div><!-- main-head -->
        
        </header>
        
        <div id="content-container">
	        <div id="content">
		        
	        