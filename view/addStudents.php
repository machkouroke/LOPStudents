<?php
	$title = 'Liste étudiant';
	$instructions = "Veuillez saisir les informations de l'étudiants";
	$picture = true;
	$image = 'menu\addStudent.png';

	$faculties = ['API 1', 'API 2', 'IID 1', 'IID 2', 'IID 3', 'GI 1', 'GI 2', 'GI 3', 'GE 1', 'GE 2', 'GE 3',
			'GPEE 1', 'GPEE 2', 'GPEE 3', 'IRIC 1', 'GRT 2', 'GRT 3'];
?>

<?php ob_start(); ?>
<!--Première Partie-->
<?php ob_start(); ?>

<div class="row">
	<div class="col mb-3">
		<label for="name" class="form-label">Nom</label>

		<input class="form-control" type="text" name="name" id="name"
		       value="<?= isset($userToUpdate) ? $userToUpdate->getName() : '' ?>">
	</div>

	<div class="col mb-3">
		<label for="surname" class="form-label">Prénom</label>
		<input class="form-control" type="text" name="surname" id="surname"
		       value="<?= isset($userToUpdate) ? $userToUpdate->getSurname() : '' ?>">
	</div>
</div>

<div class="row">
	<div class="col mb-3">
		<label for="login" class="form-label">Nom d'utilisateur</label>
		<input class="form-control" type="text" name="login" id="login"
		       value="<?= isset($userToUpdate) ? $userToUpdate->getLogin() : '' ?>">
	</div>

	<div class="col mb-3">
		<label for="email" class="form-label">Email</label>
		<input class="form-control" type="email" name="email" id="email"
		       value="<?= isset($userToUpdate) ? $userToUpdate->getEmail() : '' ?>">
	</div>
</div>
<div class="row">
	<div class="col mb-3">
		<label for="password" class="form-label">Votre mot de passe</label>
		<input class="form-control" type="password" name="password" id="password"
		       value="<?= isset($userToUpdate) ? $userToUpdate->getPassword() : '' ?>">
	</div>

	<div class="col mb-3">
		<label for="password-2" class="form-label">Confirmez votre mot de passe</label>
		<input class="form-control" type="password" name="password-2" id="password-2"
		       value="<?= isset($userToUpdate) ? $userToUpdate->getPassword() : '' ?>">
	</div>
</div>


<?php require_once(BASE_DIR . '\view\templates\captchaBlock.php') ?>



<?php $firstPart = ob_get_clean(); ?>

<!--Seconde Partie -->
<?php ob_start(); ?>


<div class="row">
	<div class='row'>
		<div class='col mb-3'>
			<label for='country' class='form-label '>Pays</label>
			<select form="register" id='country' name='country' class='form-select' required>

				<?php if (isset($userToUpdate)): ?>"
					<option value="<?= $userToUpdate->getCountry() ?>"><?= $userToUpdate->getCountry() ?></option>
				<?php endif; ?>
			</select>
		</div>

		<div class='col mb-3'>
			<label for='city' class='form-label'>Ville</label>
			<select form='register' id='city' name='city' class='form-select' required>
				<?php if (isset($userToUpdate)): ?>"
					<option value="<?= $userToUpdate->getCity() ?>" selected><?= $userToUpdate->getCity() ?></option>
				<?php endif; ?>
			</select>
		</div>
		<div class='col mb-3'>
			<label for='zipCode' class='form-label'>Code Postale</label>
			<input value="<?= isset($userToUpdate) ? $userToUpdate->getZipCode() : '' ?>" form='register' type='number'
			       class='form-control' id='zipCode' name='zipCode' maxlength='5'>
		</div>
	</div>
	<div class='row'>
		<div class='col mb-3'>
			<label for='birthDate' class='form-label'>Date de naissance</label>
			<input value="<?= isset($userToUpdate) ? $userToUpdate->getBirthDate() : '' ?>" form='register' type='date'
			       class='form-control' id='birthDate' name='birthDate' maxlength='5'>
		</div>
	</div>
	<div class='row'>
		<div class='col mb-3'>
			<label for='photo' class='form-label'>Photos</label>
			<input  form='register' type='file'
			       class='form-control' id='photo' name='photo' maxlength='5'>
		</div>
	</div>
	<div class='row'>
		<div class='col mb-3'>
			<label for='cv' class='form-label'>Curriculum Vitae</label>
			<input  form='register' type='file'
			       class='form-control' id='cv' name='cv' maxlength='5'>
		</div>
	</div>
	<div class='row'>
		<div class='col mb-3'>
			<label for='faculty' class='form-label'>Fillière</label>
			<select form='register' id='faculty' name='faculty' class='form-select' required>
				<?php foreach ($faculties as $faculty): ?>

					<?php
					if (isset($userToUpdate)) {
						$facultyOfUser = $userToUpdate->getFaculty() . ' ' .
								$userToUpdate->getFacultyYear();
					} ?>

					<option value="<?= $faculty ?>"
							<?= isset($userToUpdate) && $facultyOfUser === $faculty ? 'selected="' . $facultyOfUser . '"' : '' ?>><?= $faculty ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>

</div>
<script src='<?= JS_URL ?>formFlip.js'></script>
<script src="<?= JS_URL ?>facultyChoice.js"></script>


<?php $secondPart = ob_get_clean(); ?>
<?php require('templates/formTemplate.php'); ?>
<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php'); ?>

