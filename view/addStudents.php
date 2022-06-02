<?php
	$title = 'Liste étudiant';
	$instructions = "Veuillez saisir les informations de l'étudiants";
	$picture = true;
	$image = 'menu\addStudent.png';
	$action = 'addStudent';
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
		<label for="login" class="form-label">Nom d'utilisateur</label>
		<input class="form-control" type="text" name="login" id="login">
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
		<label for="password-2" class="form-label">Confirmez votre mot de passe</label>
		<input class="form-control" type="password" name="password-2" id="password-2">
	</div>
</div>


<?php require_once(BASE_DIR . '\view\templates\captchaBlock.php') ?>

<div class="col">
	<button id="suivant" class="btn btn-primary shadow d-block w-100 ">
		Suivant
	</button>
</div>


<?php $firstPart = ob_get_clean(); ?>

<!--Seconde Partie -->
<?php ob_start(); ?>


<div class="row">
	<div class='row'>
		<div class='col mb-3'>
			<label for='country' class='form-label '>Pays</label>
			<select form="register" id='country' name='country' class='form-select' required>

			</select>
		</div>

		<div class='col mb-3'>
			<label for='city' class='form-label'>Ville</label>
			<select form='register' id='city' name='city' class='form-select' required>

			</select>
		</div>
		<div class='col mb-3'>
			<label for='zipCode' class='form-label'>Code Postale</label>
			<input form='register' type='number' class='form-control' id='zipCode' name='zipCode' maxlength='5'>
		</div>
	</div>
	<div class='row'>
		<div class='col mb-3'>
			<label for='birthDate' class='form-label'>Date de naissance</label>
			<input form='register' type='date' class='form-control' id='birthDate' name='birthDate' maxlength='5'>
		</div>
	</div>
	<div class='row'>
		<div class='col mb-3'>
			<label for='photo' class='form-label'>Photos</label>
			<input form='register' type='file' class='form-control' id='photo' name='photo' maxlength='5'>
		</div>
	</div>
	<div class='row'>
		<div class='col mb-3'>
			<label for='cv' class='form-label'>Curriculum Vitae</label>
			<input form='register' type='file' class='form-control' id='cv' name='cv' maxlength='5'>
		</div>
	</div>
	<div class='row'>
		<div class='col mb-3'>
			<label for='faculty' class='form-label'>Fillière</label>
			<select form='register' id='faculty' name='faculty' class='form-select' required>
				<option value="IID 1">IID 1</option>
			</select>
		</div>
	</div>
	<div class="row d-flex justify-content-center  p-4">
		<button form='register' id="submit" class="btn btn-primary shadow d-block w-50 " type="submit">
			Finaliser l'ajout
		</button>
	</div>
</div>
<script src='<?= JS_URL ?>formFlip.js'></script>
<script src="<?= JS_URL ?>facultyChoice.js"></script>


<?php $secondPart = ob_get_clean(); ?>
<?php require('templates/teacher/formTemplate.php'); ?>
<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php'); ?>

