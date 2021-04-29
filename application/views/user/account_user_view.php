<div class="container">

	<h1 class="mb-3">Mon compte</h1>
	<!-- Mes infos -->
	<div class="row mb-3">
		<div class="col">
			<div class="shadow p-1">
				<div class="row p-2 m-2">
					<div class="col-sm-12 col-lg-9">
						<h5 class="card-title"><?=$user[0]->pseudo ?? ''?></h5>
						<p><?=$user[0]->mail ?? ''?></p>
					</div>
					<div class="col-sm-12 col-lg-3">
						<button class="btn btn-success mt-3" type="button" data-toggle="collapse"
							data-target="#collapse">Modifier mes informations</button>
					</div>
				</div>

				<div class="collapse m-3 p-3 shadow" id="collapse">
					<div>

						<?= validation_errors() ?>

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
							<div class="row p-2 justify-content-center">
								<div class="col mt-3">
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

			<div class="shadow p-1">
				<h2 class="p-2">Mes annonces</h2>
				<div class="container">
					<div class="row">
						<div class="col-12">
							<ul>

								<li class="mb-4">
									<div class="row">
										<div class="col-3">
											<img class="img-fluid" src="<?=base_url('assets/upload/1.jpg')?>" alt=""
												width="100%">
										</div>
										<div class="col-6">
											<div class="row">
												<h3><a href="">Peugeot 206</a></h3>
											</div>
											<div class="row">
												<p><strong>2000 €</strong></p>
											</div>
											<div class="row">
												<p>Véhicules</p>
											</div>
											<div class="row">
												<a href="<?=base_url('index.php/article_controller/edit_article/')?>"
													class="btn btn-success">Modifier</a>
												<a href="<?=base_url('index.php/article_controller/edit_article/')?>"
													class="btn btn-footer ml-2">Supprimer</a>
											</div>
										</div>
										<div class="col-3">
											<p>Publié le 10 mar 2021 13:00</p>
										</div>
									</div>
								</li>

								<li>
									<div class="row">
										<div class="col-3">
											<img class="img-fluid" src="<?=base_url('assets/upload/4.jpg')?>" alt=""
												width="100%">
										</div>
										<div class="col-6">
											<div class="row">
												<h3><a href="">Appartement Duplex 4 pièces</a></h3>
											</div>
											<div class="row">
												<p><strong>120000 €</strong></p>
											</div>
											<div class="row">
												<p>Véhicules</p>
											</div>
											<div class="row">
												<a href="<?=base_url('index.php/article_controller/edit_article/')?>"
													class="btn btn-success">Modifier</a>
												<a href="<?=base_url('index.php/article_controller/edit_article/')?>"
													class="btn btn-footer ml-2">Supprimer</a>
											</div>
										</div>
										<div class="col-3">
											<p>Publié le 28 avr 2021 14:10</p>
										</div>
									</div>
								</li>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>