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
	<div class=" col mb-3">
		<input class='form-control' type='text' name='name' id='name'>
		<label for="name" class="form-label">Nom</label>

	</div>

	<div class=" col mb-3">

		<input class="form-control" type="text" name="surname" id="surname">
		<label for='surname' class='form-label'>Prénom</label>
	</div>
</div>

<div class="row">
	<div class=" col mb-3">

		<input class="form-control" type="text" name="username" id="username">
		<label for='username' class='form-label'>Nom d'utilisateur</label>
	</div>

	<div class=" col mb-3">
		<input class='form-control' type='email' name='email' id='email'>
		<label for="email" class="form-label">Email</label>

	</div>
</div>
<div class="row">
	<div class=" col mb-3">
		<input class="form-control" type="password" name="password" id="password">
		<label for='password' class='form-label'>Votre mot de passe</label>
	</div>

	<div class=" col mb-3">
		<input class='form-control' type='password' name='password2' id='password2'>
		<label for="password2" class=" form-label">Confirmez votre mot de passe</label>
	</div>
</div>

<div class="row">
	<div class=" col mb-3">
		<label for="photos" class="form-label">Photos</label>
		<input class="form-control" type="file" name="photos" id="photos">
	</div>


</div>
<div class="row">
	<div class=" col mb-3">
		<label for="country" class="form-label">Pays</label>
		<select id="country" name="country" class="form-select" required>

		</select>
	</div>

	<div class=" col mb-3">
		<label for="city" class="form-label">Ville</label>
		<select id="city" name="city" class="form-select" required>

		</select>
	</div>
	<div class=" col mb-3">
		<label for="postale" class="form-label">Code Postale</label>
		<input type="number" class="form-control" id="postale" name="zipCode" maxlength="5">
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

					<input form="register"  value="<?= $faculty ?>" class=" form-check-input"
					       type="checkbox"
					       name="faculty[]">
				</div>
				<div class="col w-100">
					<input form='register' id="<?= $faculty ?>" class="form-control w-100 <?= $faculty ?>"
					       type="text"
					       readonly>
				</div>

			</div>
		<?php endforeach; ?>

</div>

<script src='<?= JS_URL ?>facultyChoice.js'></script>
<?php $secondPart = ob_get_clean(); ?>
<?php require('templates/formTemplate.php'); ?>
<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php'); ?>

