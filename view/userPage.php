<?php
	$title = "Liste étudiant";

	?>
<?php ob_start(); ?>
<section class="p-5 mt-5">
	<div class="container p-5">
		<div>
			<h1 class="ref-name text-center fw-bold">
				<?= $user->getName() . ' ' . $user->getSurname() ?>
			</h1>
			<div class="reflow-product d-flex align-items-center py-5">
				<div class="ref-media">
					<div class="ref-preview"><img class="ref-image active"
					                              src="<?= PIC_URL . $user->getLogin() . '.jpg' ?>"
					                                                                                           alt=""/>
					</div>
				</div>

				<div class="ref-product-data d-flex flex-column justify-content-between">

					<table class="table">
						<?php if (STUDENT_ONLY): ?>
							<tr>
								<th scope="row">Filière</th>
								<td>IID1</td>
							</tr>
						<?php endif; ?>
						<tr>
							<th scope="row">Nom d'utilisateur</th>
							<td><?= $user->getLogin() ?></td>
						</tr>
						<?php if (TEACHER_ONLY): ?>
							<tr>
								<th scope="row">Matricule</th>
								<td>imanesidiki@gmail.com</td>
							</tr>
						<?php endif; ?>
						<tr>
							<th scope="row">Adresse</th>
							<td><?= $user->getZipCode() . ' ' . $user->getCity()
								. ' ' . $user->getCountry() ?></td>
						</tr>
						<?php if (STUDENT_ONLY): ?>
							<tr>
								<th scope="row">CV</th>
								<td><a href="<?= CV_URL . $user->getLogin() . '.pdf' ?>" download>Télécharger</a></td>
							</tr>
						<?php endif; ?>
					</table>
				</div>
			</div>
		</div>
	</div>

</section>
<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php'); ?>
