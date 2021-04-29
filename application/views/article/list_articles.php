<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Main -->

<div class="container">

<h1 class="text-center mb-5"><?= $title ?></h1>

	<div class="container">
	
		<div class="mb-5">

		<?php foreach($articles as $article): ?>

			<div class="row">
				<div class="col-4">
				<a href="<?= $article->id?>"><img src="<?= base_url('assets/upload/').$article->name_img ?? ''?>" class="img-thumbnail rounded" width="150px" alt="<?=$article->title ?? ''?>"></a>
				</div>
				<div class="col">
					<div class="row">
						<?=$article->title?>
					</div>	
					<div class="row">
						<?=$article->name_cat?>
					</div>
					<div class="row">
						<?=$article->price?>€
					</div>
				</div>
			</div>
		<?php endforeach ?>
				</tbody>
			</table>
		</div>

	</div>

</div>