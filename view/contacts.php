<?php $title = "Liste étudiant"; ?>
<?php ob_start(); ?>
<section class="py-5 mt-5">
	<div class="container py-5">
		<div class="row mb-5">
			<div class="col-md-8 col-xl-6 text-center mx-auto">
				<h2 class="fw-bold">Envoyer un message</h2>
			</div>
		</div>
		<div class="row d-flex justify-content-center">
			<div class="col-md-6 col-xl-6">
				<div>
					<?php
						if (isset($_POST["object"])) {
							$to = $_POST["destinataire"];
							$subject = $_POST["object"];
							$message = $_POST["message"];
							$headers = "From: " . "machkour@LOPStudio.com";
							if (mail($to, $subject, $message, $headers)): ?>
								<div class="success">
									Message envoyé
								</div><?php else: ?>
								<div class="error">
									Une erreur est survenue
								</div><?php endif;
						} ?>

					<form action="contacts.php" class="p-3 p-xl-4" method="post">
						<div class="mb-3"><label class="form-label" for="destinataire">Destinataires</label><input
									class="form-control" type="email"
									id="destinataire" name="destinataire" value="<?= $selectedUser ?>">
						</div>
						<div class="mb-3"><label class="form-label" for="object">Object</label>
							<input class="form-control" type="text" id="object" name="object" ></div>
						<div class="mb-3"><label class="form-label" for="message">Message</label><textarea
									class="form-control" id="message"
									name="message" rows="6"
							></textarea>
						</div>
						<div>
							<button class="btn btn-primary shadow d-block w-100" type="submit">Envoyer</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php'); ?>
