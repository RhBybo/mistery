<?php
session_start(); // Démarrage de la session

echo 	"<script language='JavaScript'>
			var clients = '';
			try {
				clients = localStorage.getItem('who', 'client');
			} catch {}
			if (clients == 'client') {
				document.location.href='my-page.php';
			} else {
				
			}
		</script>";
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profil</title>
	<link rel="icon" type="image/png" sizes="16x16" href="./img/mistery-logo-blanc.jpg">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="./style/style.css">
	<link rel="stylesheet" type="text/css" href="./style/styleProfil.css">
	<style>
		.margin-top-5 {
			margin-top: 5px;
		}
	</style>
</head>

<body>
	<div class="human">
		<header>
			<nav>
				<ul>
					<li class="seize">
						<a href="index.php">
							<img id="logo" src="./img/mistery-logo.jpg" alt='logo du site'>
						</a>
					</li>
					<li class="seize">
						<p id="men"><a href="men.html">T-Shirt</a></p>
					</li>
					<li class="seize">
						<p id="nouveaute"><a href="news.html">Nouveauté</a></p>
					</li>
					<li class="seize">
						<img class="panier" src="https://www.tonightsound.com/v2/wp-content/uploads/2012/03/TONIGHTSOUND_ACTUALITES_PANIER.jpg">
					</li>

					<li class="seize"><a href="my-page.php"><img id="profil" src="./img/profil.png"></a></li>
				</ul>
			</nav>
		</header>
		<!--Container1-->
		<!--S'inscrire et Se connecter-->
		<div id="container1">
			<div class="block">

				<section class="block__item block-item">
					<h2 class="block-item__title">Vous avez déjà un compte</h2>
					<button class="block-item__btn signin-btn">Connexion</button>
				</section>

				<section class="block__item block-item">
					<h2 class="block-item__title">Vous n'avez pas encore un compte</h2>
					<button class="block-item__btn signup-btn">S'inscrire</button>
				</section>

			</div>
			<!--Forme de block-->
			<div class="form-box active">
				<!--Form pour se connecter-->

				<form action="connexion.php" method="post" class="form form_signin" id="connexion">
					<?php
					if (isset($_GET['login_err'])) {
						$err = htmlspecialchars($_GET['login_err']);

						switch ($err) {
							case 'password':
					?>
								<div class="alert alert-danger">
									<strong>Erreur</strong> mot de passe incorrect
								</div>
							<?php
								break;

							case 'email':
							?>
								<div class="alert alert-danger">
									<strong>Erreur</strong> email incorrect
								</div>
							<?php
								break;

							case 'already':
							?>
								<div class="alert alert-danger">
									<strong>Erreur</strong> compte non existant
								</div>
					<?php
								break;
						}
					}
					?>
					<h3 class="form__title">Se Connecter</h3>
					<input type="email" name="emailCon" class="form__input margin-top-5" placeholder="Email" required="required" autocomplete="off">
					<input type="password" name="password2" class="form__input margin-top-5" placeholder="Mot de passe" required="required" autocomplete="off">
					<button type="submit" name="connexionBtn" class="form__btn margin-top-5" id="connexion-btn-id">Entrer</button>

					<p style="margin-top: 10px;">
						<a href="mdp-oublie.php" style="color:red;">Mot de passe oublié ?</a>
					</p>

					<p style="color: red;" id="erreur2"></p>
				</form>

				<!--Form pour s'inscrire-->
				<form action="inscription.php" method="post" class="form form_signup" id="inscription">
					<?php
					if (isset($_GET['reg_err'])) {
						$err = htmlspecialchars($_GET['reg_err']);

						switch ($err) {
							case 'success':
					?>
								<div class="alert alert-success">
									<strong>Succès</strong> inscription réussie !
								</div>
							<?php
								break;
							case 'password':
							?>
								<div class="alert alert-danger">
									<strong>Erreur</strong> mot de passe différent
								</div>
							<?php
								break;
							case 'email':
							?>
								<div class="alert alert-danger">
									<strong>Erreur</strong> email non valide
								</div>
							<?php
								break;

							case 'email_length':
							?>
								<div class="alert alert-danger">
									<strong>Erreur</strong> email trop long
								</div>
							<?php
								break;
							case 'pseudo_length':
							?>
								<div class="alert alert-danger">
									<strong>Erreur</strong> pseudo trop long
								</div>
							<?php
							case 'already':
							?>
								<div class="alert alert-danger">
									<strong>Erreur</strong> compte deja existant
								</div>
					<?php
						}
					}
					?>
					<h3 class="form__title">S'inscrire</h3>
					<input type="text" name="pseudo" class="form__input margin-top-5" placeholder="Pseudo" required="required" autocomplete="off">
					<input type="email" name="email" class="form__input margin-top-5" placeholder="Email" required="required" autocomplete="off">
					<input type="password" name="password" class="form__input margin-top-5" placeholder="Mot de passe" required="required" autocomplete="off">
					<input type="password" name="password_retype" class="form__input margin-top-5" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
					<button type="submit" class="form__btn form__btn_signup margin-top-5" id="inscription-btn-id">S'inscrire</button>
				</form>

			</div>
		</div>

		<!--La Panier du site-->
		<div class="panierOuvert">
			<h2>Panier</h2>
			<p id="total-style">Prix total: <span class="total-price">0</span>€</p>
			<p id="panier-no-mess" style="font-size: 12px;">Votre panier est tristement vide.</p><br>

			<button class="payer">Valider mon panier</button>
		</div>

		<!--Le pied du site-->
		<div class="footer">
			<div class="footer-boite" id="nous-suivre">
				<span>
					<p class="titre-footer" id="nous-suivre-id">Nous suivre sur</p>
				</span>
				<div>
					<a href="https://www.tiktok.com"><img class="nous-suivre-img" src="https://www.pngmart.com/files/20/TikTok-Logo-PNG.png" alt="tiktok_logo"></a>
					<a href="https://www.instagram.com/mstry.xyz/"><img class="nous-suivre-img" src="https://www.pngmart.com/files/13/Insta-Logo-PNG-Pic.png" alt="Instagram_logo"></a>
				</div>
			</div>

			<div class="footer-boite" id="footer-compte">
				<span>
					<p class="titre-footer" id="compte-id">Compte</p>
				</span>
				<p><a href="profil.php">Mon Compte</a></p>
				<p><a href="mes-comptes.html">Mes Commandes</a></p>
				<p>Mon Panier</p>
			</div>

			<div class="footer-boite" id="soldes">
				<span>
					<p class="titre-footer" id="soldes-id">Magasin</p>
				</span>
				<p><a href="guide-taille.html">Size guide de taille</a></p>
				<p><a href="condition-de-nos-offres.html">Conditions de Nos Offres</a></p>
			</div>

			<div class="footer-boite" id="a-propos-de-nous">
				<span>
					<p class="titre-footer" id="a-propos-de-nous-id">A Propos de Nous
					<p></p>
				</span>
				<a href="tel: +33621939402"><img class="nous-suivre-img" src="data:image/png;base64,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" alt="telephone"></a>
				<a href="mailto:mystery33700@gmail.com"><img class="nous-suivre-img" src="data:image/png;base64,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" alt="mail"></a>
			</div>

			<p id='droit-d-auteur'>Droits d'auteur © 2022 - Tous les droits sont réservés. Juste Un TSHIRT wesh</p>

		</div>
	</div>
	<script type="text/javascript" src="profil-js.js" defer></script>
	<script src="script.js"></script>
	<script>
		// Pouvoir utiliser le form (se déplacer connexion <-> inscription)
		const signInBtn = document.querySelector('.signin-btn');
		const signUpBtn = document.querySelector('.signup-btn');
		const formBox = document.querySelector('.form-box');

		signUpBtn.addEventListener('click', function() {
			formBox.classList.add('active');
			body.classList.add('active');
		});

		signInBtn.addEventListener('click', function() {
			formBox.classList.remove('active');
			body.classList.remove('active');
		});
	</script>
</body>

</html>