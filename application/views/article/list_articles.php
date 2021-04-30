<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Main -->

<div class="container">

<h1 class="text-center mb-5"><?= $title ?></h1>

	<div class="container">
	
		<div class="mb-5">

		<?php foreach($articles as $article): ?>

			<div class="row border border-dark rounded py-2 mt-2">
				<div class="col-4 d-flex align-items-between">
				<a href="<?=base_url('/index.php/Article_controller/view_article/'.$article->id)?>"><img src="<?= base_url('assets/upload/').$article->name_img ?? ''?>" class="img-fluid rounded " width="150px" alt="<?=$article->title ?? ''?>"></a>
				</div>
				<div class="col-6 ">
					<a href="<?=base_url('/index.php/Article_controller/view_article/'.$article->id)?>">
						<div class="row">
							<?=$article->title?>
						</div>
					</a>	
					<div class="row ">
						<?=$article->name_cat?>
					</div>
					<div class="row align-self-end">
						<div class="col">
							<?=$article->city?>
						</div>
						<div class="col">
							<?=$article->price?>€
						</div>
					</div>
				</div>
			</div>
		<?php endforeach ?>
				</tbody>
			</table>
		</div>

	</div>

</div>