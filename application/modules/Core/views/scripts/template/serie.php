<?php include("header.php"); ?>

        
        
<!-- CONTENU -->

<div class="leftSide">
	<!-- Couverture et liens lightbox -->
	<div class="cover">
		<img src="img/temp/album_baleinier.jpg" alt="" class="behind">
		<?php if (isIE() == false || !isLtIE9()) { echo '<img src="img/temp/album_traques.jpg" alt="" class="behind2">'; } ?>
		<img src="img/temp/album_prisonniers.jpg" alt="" class="front">
	</div>
	<footer>
		<a data-lightbox="lightbox" href="img/temp/album_planche.jpg" class="planche">voir une planche</a>
	</footer>
	
	<!-- Pub 300x250 -->
	<div class="pub">
		<a href="#"><img src="img/temp/pub300x250.jpg" alt="" width="300" height="250"></a>
	</div><!-- pub -->

	<!-- Bloc de liens réseaux sociaux -->
	<div class="social_links">
		<h1><img src="img/slinks_titre.png" alt="Suivez-nous !"></h1>
		<ul>
			<li><a href="#"><img src="img/slinks_icon_fb.png" alt=""></a></li>
			<li><a href="#"><img src="img/slinks_icon_twitter.png" alt=""></a></li>
			<li><a href="#"><img src="img/slinks_icon_rss.png" alt=""></a></li>
			<li><a href="#"><img src="img/slinks_icon_email.png" alt=""></a></li>
		</ul>
		<div class="clear"></div>
	</div><!-- social_links -->
	<div class="clear"></div>
	<!-- Facebook like box -->
	<div class="fb-like-box" data-href="http://www.facebook.com/Sceneario.com" data-width="300" data-show-faces="true" data-border-color="#fff" data-stream="false" data-header="false"></div><!-- Facebook like box --> 
</div>

<div class="rightSide">
	<div class="icons two">
		<a href="" title="" class="prix">Prix</a>
		<a href="" title="" class="acheter">Acheter</a>
	</div>
	
	<hgroup>
		<h2>Esteban</h2>
	</hgroup>
	
	<div class="separateur"></div>
	
	<!-- Informations générales -->
	<section class="album-infos">
		<table>
			<tr>
				<td class="label">Dessinateurs :</td>
				<td class="info"><a href="">Matthieu BONHOMME</a><br><a href="">Delphine CHEDRU</a></td>
			</tr>
			<tr>
				<td class="label">Scénariste :</td>
				<td class="info"><a href="">Matthieu BONHOMME</a></td>
			</tr>
			<tr>
				<td class="label">Coloriste :</td>
				<td class="info"><a href="">Delphine CHEDRU</a></td>
			</tr>
			<tr>
				<td class="label">Éditions :</td>
				<td class="info"><a href="">DUPUIS</a></td>
			</tr>
		</table>
		
		<table>
			<tr>
				<td class="label">Genre :</td>
				<td class="info"><a href="">Aventure</a></td>
			</tr>
			<tr>
				<td class="label">Sortie :</td>
				<td class="info">Depuis Juin 2012</td>
			</tr>
		</table>
	</section>
	
	<div class="clear"></div>
	
	<div class="separateur"></div>
	
	<!-- Bloc de liens réseaux sociaux -->
	<div class="social-links">
		<div class="fb-like" data-href="http://www.sceneario.com" data-send="true" data-layout="button_count" data-width="100" data-show-faces="true" data-font="arial"></div>
		
		<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		
		<div class="g-plusone" data-size="medium" data-annotation="inline" data-width="120"></div>

		<script type="text/javascript">
		  window.___gcfg = {lang: 'fr'};

		  (function() {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/plusone.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		  })();
		</script>
	</div>
	
	<div class="clear"></div>
	
	<!-- Albums de la série -->
	<section class="albums-serie">
		<ul>
			<li class="item">
				<a href=""></a>
				<img src="img/temp/cover-serie.jpg" alt="">
				<span></span>
				<hgroup>
					<h1>Tome 4</h1>
					<h2>Prisonniers du bout du monde</h2>
				</hgroup>
			</li>
			<li class="item">
				<a href=""></a>
				<img src="img/temp/cover-serie.jpg" alt="">
				<span></span>
				<hgroup>
					<h1>Tome 4</h1>
					<h2>Prisonniers du bout du monde</h2>
				</hgroup>
			</li>
			<li class="item">
				<a href=""></a>
				<img src="img/temp/cover-serie.jpg" alt="">
				<span></span>
				<hgroup>
					<h1>Tome 4</h1>
					<h2>Prisonniers du bout du monde</h2>
				</hgroup>
			</li>
			<li class="item">
				<a href=""></a>
				<img src="img/temp/cover-serie.jpg" alt="">
				<span></span>
				<hgroup>
					<h1>Tome 4</h1>
					<h2>Prisonniers du bout du monde</h2>
				</hgroup>
			</li>
			<li class="item">
				<a href=""></a>
				<img src="img/temp/cover-serie.jpg" alt="">
				<span></span>
				<hgroup>
					<h1>Tome 4</h1>
					<h2>Prisonniers du bout du monde</h2>
				</hgroup>
			</li>
		</ul>
	</section>
</div>


<!-- Reinitialisation des float -->
<div class="clear"></div>

        
<?php include("footer.php"); ?>