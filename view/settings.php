<?php $title = "Paramètres"; ?>
<?php ob_start(); ?>
<section class="p-5 mt-5">
	<div class="container p-5">
		<div>
			<h1 class="ref-name text-center fw-bold"><?= $_SESSION['User']->getName() . ' ' . $_SESSION['User']->getSurname() ?></h1>
			<form class="row d-flex align-items-center" action="settings.php" method="post">
				<div class="col-md-7 col-12 reflow-product d-flex align-items-center py-5">
					<div class="ref-media">
						<div class="ref-preview"><img class="ref-image active"
						                              src="<?= $_SESSION['User']->getPhoto()  ?>"
						                              alt=""/></div>
					</div>

					<div class="ref-product-data d-flex flex-column justify-content-between">


					</div>
				</div>
				<div class="col-md-5 col-12 row">
					<div class="col-12">
						<label class="p-2">
							Num d'utilisateur
							<input type="text" class="form-control m-2" value="<?= $_SESSION['User']->getLogin() ?>">
						</label>
						<label class="p-2">
							Mot de passe
							<input type="password" class="form-control m-2"
							       value="<?= $_SESSION['User']->getPassword() ?>">
						</label>
					</div>

					<div class="col-12 ">
						<div class="p-2 ">
							<form action="" method="post">
								<div class='center'><input type='submit' class='btn btn-primary m-2'
								                           value='Modifier les informations'></div>
							</form>
							<form action="<?= BASE_URL ?>index.php?action=deleteConnectedUser" method="post">
								<div class='center'><input type='submit' class='delete btn btn-danger m-2'
								                           value='Supprimer le compte'></div>
							</form>


						</div>


					</div>

				</div>

			</form>

		</div>
	</div>

</section>
<?php $content = ob_get_clean(); ?>

<?php require(BASE_DIR . 'view\templates\base.php'); ?>
