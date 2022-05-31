<?php $title = "Liste étudiant"; ?>
<?php ob_start(); ?>
<section class="py-5 mt-5">
	<div class="container py-5">
		<div class="row mb-4 mb-lg-5">
			<div class="col-md-8 col-xl-6 text-center mx-auto">

				<h2 class="fw-bold">Veuillez saisir ses informations</h2>
			</div>
		</div>
		<div class="row d-flex justify-content-start justify-content-lg-start align-items-lg-center">
			<div class="col-md-6 col-xl-6">
				<div>
					<form id="register" action="<?= ASSETS_URL ?>index.php?action)addTeacher" class="p-3 m-5 p-xl-4" data-aos="fade-up" method="post"
					      enctype="multipart/form-data">
						<div class="row">
							<div class="col mb-3">
								<label for="name" class="form-label">Nom</label>
								<input class="form-control" type="text" name="name" id="name">
							</div>

							<div class="col mb-3">
								<label for="surname" class="form-label">Prénom</label>
								<input class="form-control" type="text" name="surname" id="surname">
							</div>
						</div>

						<div class="row">
							<div class="col mb-3">
								<label for="surname" class="form-label">Nom d'utilisateur</label>
								<input class="form-control" type="text" name="surname" id="surname">
							</div>

							<div class="col mb-3">
								<label for="email" class="form-label">Email</label>
								<input class="form-control" type="email" name="email" id="email">
							</div>
						</div>
						<div class="row">
							<div class="col mb-3">
								<label for="photos" class="form-label">Votre mot de passe</label>
								<input class="form-control" type="text" name="photos" id="photos">
							</div>

							<div class="col mb-3">
								<label for="cv" class="form-label">Confirmez votre mot de passe</label>
								<input class="form-control" type="text" name="cv" id="cv">
							</div>
						</div>

						<div class="row">
							<div class="col mb-3">
								<label for="photos" class="form-label">Photos</label>
								<input class="form-control" type="file" name="photos" id="photos">
							</div>


						</div>
						<div class="row">
							<div class="col mb-3">
								<label for="country" class="form-label">Pays</label>
								<select id="country" name="country" class="form-select" required>

								</select>
							</div>

							<div class="col mb-3">
								<label for="city" class="form-label">Ville</label>
								<select id="city" name="numBloc" class="form-select" required>

								</select>
							</div>
							<div class="col mb-3">
								<label for="postale" class="form-label">Code Postale</label>
								<input type="number" class="form-control" id="postale" name="postale" maxlength="5">
							</div>
						</div>


						<div class="col">
							<button id="submit" class="btn btn-primary shadow d-block w-100" type="submit">
								Suivant
							</button>
						</div>


						<div class="mb-3"></div>
						<div></div>
					</form>
				</div>
			</div>
			<div class="col  " style="text-align: center;">
				<div style="width: 90%;height: 100%; "
				     class="mb-3 bg-primary text-white  rounded p-3 text-center d-flex flex-column align-items-center">
					<label for="studyField" class="form-label fw-bold ">Veuillez saisir le texte pour confirmer
					                                                    que vous n'êtes pas un robot
					</label>
					<input form="register" class="form-control m-2" type="text" name="captcha" id="studyField">
					<div class="text-center p-4 d-flex align-items-center ">
						<div onclick="document.getElementById('captcha-image').src='<?= ASSETS_URL ?>captcha.php?'
								+ Date.now()" id="refreshCaptcha"
						     class="mx-2 bg-primary rounded d-flex align-items-center">
							<a>
								<img style="width: 40px; height: 40px" src="<?= IMG_URL ?>refresh.png" alt="">
							</a>
						</div>
						<div><img id="captcha-image"
						          class=" w-100 rounded" src="<?= ASSETS_URL ?>captcha.php"
						          alt=""/></div>
					</div>

				</div>

				<div style="width: 90%;height: 100%; ">
					<img class="rounded ref-image img-responsive w-100 h-100"
					     data-aos="fade-down" data-aos-once="true"
					     src="<?= IMG_URL ?>menu/addTeacher.png"
					     alt="">
				</div>
			</div>
		</div>

	</div>
</section>
<script src="<?= JS_URL ?>villeSelect.js"></script>
<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php'); ?>
