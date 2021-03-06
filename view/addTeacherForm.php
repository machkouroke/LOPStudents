<?php ob_start(); ?>
<!--Première Partie-->
<?php ob_start(); ?>

<div class="row">
	<div class="input-div col mb-3">
		<label for="name" class="form-label">Nom</label>
		<input class="form-control" type="text" name="name" id="name"
		       value="<?= isset($userToUpdate) ? $userToUpdate->getName() : ($_COOKIE['name'] ?? '') ?>">
	</div>

	<div class="input-div col mb-3">
		<label for="surname" class="form-label">Prénom</label>
		<input class="form-control" type="text" name="surname" id="surname"
		       value="<?= isset($userToUpdate) ? $userToUpdate->getSurname() : ($_COOKIE['surname'] ?? '') ?>">
	</div>
</div>

<div class="row">
	<div class="input-div col mb-3">
		<label for="login" class="form-label">Nom d'utilisateur</label>
		<input class="form-control" type="text" name="login" id="login"
		       value="<?= isset($userToUpdate) ? $userToUpdate->getLogin() : ($_COOKIE['login'] ?? '') ?>">
	</div>

	<div class="input-div col mb-3">
		<label for="email" class="form-label">Email</label>
		<input class="form-control" type="email" name="email" id="email"
		       value="<?= isset($userToUpdate) ? $userToUpdate->getEmail() : ($_COOKIE['email'] ?? '') ?>">
	</div>
</div>
<div class="row">
	<div class="input-div col mb-3">
		<label for="password" class="form-label">Mot de passe</label>
		<input class="form-control" type="password" name="password" id="password"
		       value="<?= isset($userToUpdate) ? $userToUpdate->getPassword() : ($_COOKIE['password'] ?? '') ?>">
	</div>

	<div class="input-div col mb-3">
		<label for="password-2" class="form-label">Confirmation du mot de passe</label>
		<input class="form-control" type="password" name="password-2" id="password-2"
		       value="<?= isset($userToUpdate) ? $userToUpdate->getPassword() : ($_COOKIE['password-2'] ?? '') ?>">
	</div>
</div>

<div class="row">
	<div class=" col mb-3">
		<label for="photos" class="form-label">Photos</label>
		<input class="form-control" type="file" name="photo" id="photo">
	</div>


</div>
<div class="row">
	<div class=" col mb-3">
		<label for="country" class="form-label">Pays</label>
		<select id="country" name="country" class="form-select" required>
			<?php /** @var Array $countries */
				foreach ($countries as $country): ?>

				<option value="<?= $country['name'] ?>" <?php if (isset($userToUpdate) && ($country['name']) == $userToUpdate->getCountry()) : ?>
					selected <?php endif ?>>

					<?= $country['name'] ?>
				</option>
			<?php endforeach; ?>
		</select>
	</div>

	<div class=" col mb-3">
		<label for="city" class="form-label">Ville</label>
		<select id="city" name="city" class="form-select" required>

		</select>
	</div>
	<script>
		const countries = document.getElementById('country');

		async function addCity(index) {
			await fetch("http://<?=$_SERVER['HTTP_HOST'] . MODEL_URL . '/country.php' ?>", {
				method: 'POST',
				body: JSON.stringify({'country_id': index}),
				headers: {
					'Content-Type': 'application/json'
				}
			}).then((response) => {
				return response.json()
			}).then((response) => {
				const city = document.getElementById('city')
				city.innerHTML = ''
				for (let element of response) {
					city.innerHTML +=
							`<option data-iso2="${element}"  value="${element}" > ${element}  </option>`
				}
			})
					.catch((error) => console.log(error))
		}
		addCity(countries.selectedIndex + 1);
		countries.addEventListener('change', function () {
			addCity(countries.selectedIndex + 1)
		})
	</script>
	<div class=" col mb-3">
		<label for="zipCode" class="form-label">Code Postale</label>
		<input type="number" class="form-control" id="zipCode" name="zipCode" maxlength="5"
		       value="<?= isset($userToUpdate) ? $userToUpdate->getZipCode() : ($_COOKIE['zipCode'] ?? '') ?>"
		>
	</div>
</div>
<?php require_once(BASE_DIR . '\view\templates\captchaBlock.php') ?>



<?php $firstPart = ob_get_clean(); ?>

<!--Seconde Partie -->

<?php ob_start(); ?>


<div class="row">
	<?php
		$col = 0;
		foreach ($faculties as $faculty): ?>
			<div class="faculty d-flex justify-content-between col-md-3 col-lg-4 col-12 mb-3 row">
				<div class=" d-flex align-items-center p-3 justify-content-between col-4 w-100">
					<label for="<?= $faculty ?>" class="form-check-label"><?= $faculty ?></label>

					<input form="register" value="<?= $faculty ?>" class=" form-check-input"
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

