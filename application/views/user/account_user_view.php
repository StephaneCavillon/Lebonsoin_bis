<div class="container">
<?= validation_errors() ?>
<?php 
if (isset($_SESSION['alert'])) {
	echo $_SESSION['alert'];
	$_SESSION['alert'] = '';
}
?>

	<h1 class="mb-3">Mon compte</h1>
	<!-- Mes infos -->
	<div class="row mb-3">
		<div class="col">
			<div class="shadow p-1 div">
				<div class="row p-2 m-2">
					<div class="col-12 col-md-9">
						<h5 class="card-title"><?=$user[0]->pseudo ?? ''?></h5>
						<p><?=$user[0]->mail ?? ''?></p>
					</div>
					<div class="col-12 col-md-3 text-center">
						<button class="btn btn-success my-3" type="button" data-toggle="collapse"
							data-target="#collapse">Modifier mes informations</button>
						<a href="" data-toggle="modal"
                data-target="#delete-account-modal" class="text-danger">Supprimer mon compte</a>
					</div>
				</div>

				<div class="collapse m-3 p-3 shadow" id="collapse">
					<div>

						<?= form_open('user_controller/update_user/') ?>

						<div class="row m-3 p-2">
							<div class="col-md-4">
								<label for="pseudo">Pseudo</label>
								<input type="text" name="pseudo" class="form-control" value="<?=$user[0]->pseudo?>">
							</div>
							<div class="col-md-4">
								<label for="mail">Email</label>
								<input type="email" name="mail" class="form-control" value="<?=$user[0]->mail?>">
							</div>
							<div class="col-md-4">
								<label for="bithdate">Date de naissance</label>
								<input type="date" name="birthdate" class="form-control"
									value="<?=$user[0]->birthdate?>">
							</div>
							<div class="row p-2">
								<div class="col text-center mt-3">
									<button type="submit" name="submit" class="btn btn-success">Sauvegarder</button>
								</div>
							</div>
						</div>

						</form>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Mes annonces -->
	<div class="row mb-5">
		<div class="col">

			<div class="shadow p-1 div">
				
				<div class="container">
					<div class="row">
						<div class="col-12">
							<h2 class="p-2">Mes annonces</h2>
						<?php if($user[0]->id_article == 0){
							echo '<div>Pas d\'annonce publiée </div>';
							}else{?>
								
							<ul class="pl-3">
							<?php foreach($user as $article_user): ?>
								<li class="mb-4">
									<div class="row  text-center">
										<div class="col-md-3 mr-auto pl-0">
											<img class="img-fluid" src="<?=base_url('assets/upload/'.$article_user->name_img)?>" alt=""
												width="100%">
										</div>
										<div class="col-md-6">
											<div class="row">
												<h3><a href=""><?=$article_user->title?></a></h3>
											</div>
											<div class="row">
												<p><strong><?=$article_user->price?> €</strong></p>
											</div>
											<div class="row">
												<p><?=$article_user->name_cat?></p>
											</div>
											<div class="row mb-3">
												<!-- <a href="<?=base_url('index.php/article_controller/edit_article/'.$article_user->id_article)?>"
													class="btn btn-success">Modifier</a> -->
												<a href="<?=base_url('index.php/article_controller/delete/'.$article_user->id_article)?>"
													class="btn btn-footer ml-2">Supprimer</a>
											</div>
										</div>
										<div class="col-md-3">
											<p>Publié le <?=date('d/m/Y à H\hm', strtotime($article_user->created_at))?></p>
										</div>
									</div>
								</li>
								<?php endforeach ?>
							</ul>
							
						<?php } ?>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>

<!-- Modale suppression compte -->

<div class="modal fade " id="delete-account-modal" tabindex="-1" aria-labelledby="delete-account-modal-label"
    data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-account-modal-label">Etes-vous sûr de vouloir supprimer votre compte?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <a type="submit" class="btn btn-footer" href="<?=base_url('index.php/user_controller/delete')?>">Supprimer mon compte</a>
            </div>
        </div>
    </div>
</div>