<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Main -->

<div class="container">

<h1 class="text-center mb-5">Bienvenue sur Le Mauvais Coin</h1>

	<div class="container">
	
		<div class="row mb-5">

		<?php foreach($articles as $article): ?>

			<div class="col-12 col-md-3">
				<div class="card shadow mb-3">
					<a href=""><img src="<?= base_url('assets/upload/').$article->name_img ?? ''?>" class="card-img-top" width="'100%" height="200px" alt="<?=$article->title ?? ''?>"></a>
					<div class="card-body">
						<h5 class="card-title article-title"><?=$article->title ?? ''?></h5>
						<p class="card-text price"><?=$article->price ?? ''?> €</p>
					</div>
				</div>
			</div>

		<?php endforeach ?>
			
		</div>

	</div>

</div>