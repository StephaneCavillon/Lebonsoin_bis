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
	<link rel="stylesheet" href="<?= base_url('assets/css/styles.css')?>">
	<title>Le Mauvais Coin</title>
</head>

<body>
	<div class="container-fluid p-0">

		<!-- Barre de menu -->


		<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5 shadow sticky-top">
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
						<li class="nav-item">
							<button class="btn btn-success btn-sm" type="button" href="#"><i
									class="far fa-plus-square"></i>
								Déposer une annonce</button>
						</li>
						<form class="form-inline ml-3 my-2 my-lg-0">
							<input class="form-control mr-sm-2 form-control-sm" type="search" placeholder="Rechercher"
								aria-label="Search">
							<button class="btn btn-outline-success my-2 my-sm-0 btn-sm" type="submit"><i
									class="fas fa-search"></i></button>
						</form>
					</ul>
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="login-link nav-link " href="">Connexion</a>
						</li>
						<li class="nav-item">
							<a class="login-link nav-link " href="<?= base_url('index.php/user_controller/register_user_form') ?>">Inscription</a>
						</li>
					</ul>

				</div>
			</div>
		</nav>