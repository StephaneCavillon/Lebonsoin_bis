<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
		integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
		integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<link rel="stylesheet" href="<?= base_url("assets/css/styles.css") ?>"/>
	<title>Le Mauvais Coin</title>
</head>

<body>
	<div class="container-fluid p-0 container-main">

		<!-- Barre de menu -->


		<nav class="navbar navbar-expand-lg navbar-light bg-white mb-5 shadow-sm sticky-top">
			<div class="container">
				<a class="navbar-brand" href="<?=base_url('index.php/')?>">
					<img src="<?= base_url('assets/img/logos/logomauvaiscoin.png')?>" width="130" height="20" alt="Logo">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
					aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item my-auto">
							<a class="btn btn-footer btn-sm" type="button" href="<?=base_url('index.php/article_controller/add_article')?>"><i
									class="far fa-plus-square"></i>
								Déposer une annonce</a>
						</li>
						<li class="nav-item ml-3">
							<a class="login-link nav-link" href="<?=base_url('index.php/article_controller/list_articles')?>">Voir toutes les annonces</a>
						</li>
						<!-- <form class="form-inline ml-3 my-2 my-lg-0">
							<input class="form-control mr-sm-2 form-control-sm" type="search" placeholder="Rechercher"
								aria-label="Search">
							<button class="btn btn-outline-success my-2 my-sm-0 btn-sm" type="submit"><i
									class="fas fa-search"></i></button>
						</form> -->
					</ul>
					<?php if(empty($_SESSION['pseudo'])){  ?>
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="login-link nav-link" href="<?=base_url('index.php/user_controller/connection_user_form')?>"><img src="<?=base_url('assets/img/user.png')?>" alt=""> Connexion</a>
						</li>
					</ul>
					<?php }else{?>
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="login-link nav-link " href="<?=base_url('index.php/user_controller/view_user')?>"><img src="<?=base_url('assets/img/user.png')?>" alt="Avatar"> <?= $_SESSION['pseudo'] ?></a>
							</li>
						</ul>
						
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="login-link nav-link " href="<?=base_url('index.php/user_controller/deconnection')?>">Déconnexion</a>
							</li>
						</ul>
						<?php } ?>

				</div>
			</div>
		</nav>