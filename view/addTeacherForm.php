<?php
	$title = "Liste étudiant";
	$instructions = "Veuillez saisir les informations du professeur";
	$picture = false;
	$image = 'menu\addTeacher.png'
?>
<?php ob_start(); ?>
<!--Première Partie-->
<?php ob_start(); ?>

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
		<label for="password" class="form-label">Votre mot de passe</label>
		<input class="form-control" type="password" name="password" id="password">
	</div>

	<div class="col mb-3">
		<label for="cv" class="form-label">Confirmez votre mot de passe</label>
		<input class="form-control" type="password" name="password2" id="password">
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
<?php require_once(BASE_DIR . '\view\templates\captchaBlock.php') ?>



<?php $firstPart = ob_get_clean(); ?>

<!--Seconde Partie -->
<?php ob_start(); ?>
<?php
	$faculties = ['API 1', 'API 2', 'IID 1', 'IID 2', 'IID 3', 'GI 1', 'GI 2', 'GI 3', 'GE 1', 'GE 2', 'GE 3',
			'GPEE 1', 'GPEE 2', 'GPEE 3', 'IRIC 1', 'GRT 2', 'GRT 3'];
?>

<div class="row">
	<?php
		$col = 0;
		foreach ($faculties as $faculty): ?>
			<div class="faculty d-flex justify-content-between col-md-3 col-lg-4 col-12 mb-3 row">
				<div class=" d-flex align-items-center p-3 justify-content-between col-4 w-100">
					<label for="<?= $faculty ?>" class="form-check-label"><?= $faculty ?></label>

					<input form="register" id="<?= $faculty ?>" value="<?= $faculty ?>"  class=" form-check-input" type="checkbox"
					       name="faculty[]">
				</div>
				<div class="col w-100">
					<input form='register' id="<?= $faculty ?>" class="form-control w-100 <?= $faculty ?>" type="text"
					       name="module[]" readonly>
					<script>
						let module = document.getElementsByName("module[]");

					</script>
				</div>
			</div>
		<?php endforeach; ?>

</div>


<?php $secondPart = ob_get_clean(); ?>
<?php require('templates/formTemplate.php'); ?>
<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php'); ?>

