<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Main -->
<div class="ovale"></div>
<div class="text-center mb-5 title">
	<h1>Bienvenue sur Le Mauvais Coin</h1>
	<p>Trouvez la bonne affaire parmi la dizaine de petites annonces Le Mauvais Coin</p>
</div>


<div class="container">

<?php 
if (isset($_SESSION['alert'])) {
	echo $_SESSION['alert'];
	$_SESSION['alert'] = '';
}
?>

	<section class="container">
	
		<div class="row mb-5">

		<?php foreach($articles as $article): ?>

			<div class="col-12 col-md-6 col-lg-3">
				<div class="card shadow mb-3">
					<a href="<?= base_url('index.php/article_controller/view_article/'.$article->id_article) ?? ''?>"><img src="<?= base_url('assets/upload/').$article->name_img ?? ''?>" class="card-img-top" width="'100%" height="200px" alt="<?=$article->title ?? ''?>"></a>
					<div class="card-body">
						<h5 class="card-title article-title"><?=$article->title ?? ''?></h5>
						<p class="card-text price"><?=$article->price ?? ''?> €</p>
					</div>
				</div>
			</div>

		<?php endforeach ?>
			
		</div>

		</section>

	<!-- Présentation -->

	<section class="container">
		<p class="mb-5 text-center">Avec Le Mauvais Coin, trouvez la bonne affaire sur le site référent de petites annonces de particulier à particuliers. Avec une dizaine de petites annonces, trouvez la bonne occasion dans nos catégories voiture, immobilier, emploi, vacances, mode, maison, jeux vidéo, etc… Déposez une annonce gratuite en toute simplicité pour vendre, rechercher, donner vos biens de seconde main ou promouvoir vos services.
		</p>
	</section>

</div>