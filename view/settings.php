<?php $title = "Paramètres"; ?>
<?php ob_start(); ?>
<section class="p-5 mt-5">
	<div class="container p-5">
		<div>
			<h1 class="ref-name text-center fw-bold"><?= $_SESSION['User']->getName() . ' ' . $_SESSION['User']->getSurname() ?></h1>
			<div class="row d-flex align-items-center">
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
						<?php if (isset($_GET['error'])): ?>
							<div class="alert alert-danger" role="alert">
								<?= $_GET['error'] ?>
							</div>
						<?php endif ?>
						<?php if (isset($_GET['sucess'])): ?>
							<div class="alert alert-success" role="alert">
								<?= $_GET['sucess'] ?>
							</div>
						<?php endif ?>
						<label class="p-2 w-100">
							Num d'utilisateur
							<input form="update" name="login" type="text" class="form-control m-2" value="<?= $_SESSION['User']->getLogin() ?>">
						</label>
						<label class="p-2 w-100">
							Mot de passe
							<input form='update' name="password" type="password" class="form-control m-2"
							       value="<?= $_SESSION['User']->getPassword() ?>">
						</label>
					</div>

					<div class="col-12 w-100">
						<div class="p-2 w-100">
							<form id="update" action="<?= BASE_URL ?>index.php?action=updateConnectedUser" method="post">
								<div class='center'><input type='submit' class='btn btn-primary m-2'
								                           value='Modifier les informations'></div>
							</form>
							<a class="delete" href="<?= BASE_URL ?>index.php?action=deleteConnectedUser" >
								<div class='center'><input type='submit' class=' btn btn-danger m-2'
								                           value='Supprimer le compte'></div>
							</a>


						</div>


					</div>

				</div>

			</div>

		</div>
	</div>

</section>
<?php $content = ob_get_clean(); ?>

<?php require(BASE_DIR . 'view\templates\base.php'); ?>
