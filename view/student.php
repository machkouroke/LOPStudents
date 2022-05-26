<?php $title = "Liste étudiant"; ?>
<?php ob_start(); ?>
<section class="p-5 mt-5">
	<div class="container p-5">
		<div>
			<h1 class="ref-name text-center fw-bold">Imane Sidiki</h1>
			<div class="reflow-product d-flex align-items-center py-5">
				<div class="ref-media">
					<div class="ref-preview"><img class="ref-image active" src="img/imane.jpg"
					                              data-reflow-preview-type="image" alt=""/></div>
				</div>

				<div class="ref-product-data d-flex flex-column justify-content-between">

					<table class="table">

						<tr>
							<th scope="row">Nom d'utilisateur</th>
							<td>imanesidiki@gmail.com</td>
						</tr>
						<tr>
							<th scope="row">Mot de passe</th>
							<td>machkour</td>
						</tr>
						<tr>
							<th scope="row">Ville</th>
							<td>Cotonou</td>
						</tr>
						<tr>
							<th scope="row">Numéro de téléphone</th>
							<td>Cotonou</td>
						</tr>
						<tr>
							<th scope="row">CV</th>
							<td><a href="">Télécharger</a></td>
						</tr>

					</table>
				</div>
			</div>
		</div>
	</div>
	</div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php'); ?>
