<?php $title = "Ajouter " . $_GET["title"]; ?>
<?php ob_start(); ?>
<section class="py-5 mt-5">
	<div class="container py-5">
		<div class="row mb-4 mb-lg-5">
			<div class="col-md-8 col-xl-6 text-center mx-auto">

				<h2 class="fw-bold">Veuillez saisir les informations <?= $_GET["title"] ?></h2>
			</div>
		</div>
		<div class="row d-flex justify-content-start justify-content-lg-start align-items-lg-center">
			<div class="col-md-6 col-xl-6">
				<div>
					<form id="register" class="p-3 p-xl-4" data-aos="fade-up" method="post"
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
								<label for="photos" class="form-label">Photos</label>
								<input class="form-control" type="file" name="photos" id="photos">
							</div>

							<div class="col mb-3">
								<label for="cv" class="form-label">CV</label>
								<input class="form-control" type="file" name="cv" id="cv">
							</div>
						</div>
						<div class="row">
							<div class="col mb-3">
								<label for="country" class="form-label">Pays</label>
								<select id="country" name="country" class="form-select" required>
									<option value="Bénin" selected>Bénin</option>
									<option value="Maroc" selected>Maroc</option>
								</select>
							</div>

							<div class="col mb-3">
								<label for="city" class="form-label">Ville</label>
								<select id="city" name="numBloc" class="form-select" required>
									<option value="Cotonou" selected>Cotonou</option>
									<option value="Casablanca" selected>Casablanca</option>
								</select>
							</div>
							<div class="col mb-3">
								<label for="postale" class="form-label">Code Postale</label>
								<select id="postale" name="postale" class="form-select" required>
									<option value="25000" selected></option>
									<option value="30000" selected>Casablanca</option>
								</select>
							</div>
						</div>

						<div class="mb-3">
							<label for="studyField" class="form-label">Fillières
							</label>
							<input class="form-control" type="text" name="studyField" id="studyField">
						</div>
						<div class="mb-3 w-50 bg-primary-gradient rounded p-3 text-center">
							<label for="studyField" class="form-label fw-bold ">Captcha
							</label>
							<input class="form-control" type="text" name="captcha" id="studyField">
							<div class="text-center p-4">
								<i class="fas fa-redo refresh-captcha"></i>
								<img class="captcha-image w-100" src="assets/captcha.php" alt=""/>
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
			<div class="col ref-product " style="text-align: center;">
				<div style="width: 90%;height: 100%; ">
					<img class="rounded ref-image img-responsive w-100 h-100"
					     data-aos="fade-down" data-aos-once="true"
					     src="assets/img/menu/add.png"
					     alt="">
				</div>

			</div>
		</div>
	</div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php'); ?>
