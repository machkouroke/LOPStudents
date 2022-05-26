<?php $title = "Liste étudiant"; ?>
<?php ob_start(); ?>
<section class="py-5 mt-5">
	<div class="container py-5">
		<div class="row mx-auto" style="/*max-width: 700px;*/">
			<div class="col">
				<div data-reflow-type="shopping-cart">
					<div class="reflow-shopping-cart">

						<div class="ref-cart" style="display: block;">
							<h1 class="ref-heading text-center">Liste des étudiants</h1>
							<div class="d-flex flex-row justify-content-around align-items-center">
								<div class="row bg-primary-gradient rounded p-3">

									<div class="col-12">
										<label class="form-label text-center w-100 m-2" for="choice">
											<b>Vouliez vous un listing plus précis ?</b>
										</label>
										<select id="choice" name="choice" class="form-select"  required>
											<option value="1" selected>Étudiants d'une filière données</option>
											<option value="2">Étudiants d'un âge données</option>
											<option value="3">Étudiants d'une ville données</option>

										</select>
									</div>
									<div class="col-12  rounded m-2">
										<label class="form-label p-2" for="filter">

										</label>
										<input id="filter" type="text" class="center form-control" placeholder="Nom du proffesseur">
										<div class="text-center"><a href="" class="btn btn-primary m-3 ">Filtrer</a></div>
									</div>

								</div>

								<p><a href="#" class="btn btn-primary">Envoyer un mail</a></p>
							</div>
							<div class="ref-th my-5">
								<div class="ref-student-col">Etudiant</div>
								<div class="ref-username-col">Nom d'utilisateur</div>
								<div class="ref-email-col">Email</div>
								<div class="ref-adress-col">Adresse</div>
								<div class="ref-tel-col">Numéro de téléphone</div>
								<div class="ref-cv-col">CV</div>
								<div class="ref-action-col">Actions</div>
							</div>
							<div class="ref-cart-table">
								<div class="ref-student">
									<div class="ref-student-col">
										<div class="ref-student-wrapper"><img class="ref-student-photo"
										                                      src="assets/img/imane.jpg"
										                                      alt="Bailee Jast"/>
											<div class="ref-student-data">
												<div class="ref-student-info">
													<div class="ref-student-name">Imane Sidiki</div>
													<div class="ref-student-category">IID1</div>
													<div class="ref-student-variants"></div>
													<div class="ref-student-personalization-holder"></div>
												</div>
												<div class="ref-student-price"></div>
											</div>
										</div>

									</div>
									<div class="ref-username-col">
										sidikiimane
									</div>
									<div class="ref-email-col">
										imanesidiki@gmail.com
									</div>
									<div class="ref-adress-col">
										<b>Firdaws, Khouribga 25000</b>
									</div>
									<div class="ref-tel-col">+2126388646641</div>
									<div class="d-flex flex-column  ref-cv-col"><a href="" >Télécharger le CV</a></div>
									<div class="d-flex flex-column  ref-action-col">
										<p><a href="" class="">Modifier</a></p>
										<p><a href="" class="">Supprimer</a></p>

									</div>
								</div>

							</div>
							<div class="ref-cart-table">
								<div class="ref-student">
									<div class="ref-student-col">
										<div class="ref-student-wrapper"><img class="ref-student-photo"
										                                      src="assets/img/imane.jpg"
										                                      alt="Bailee Jast"/>
											<div class="ref-student-data">
												<div class="ref-student-info">
													<div class="ref-student-name">Imane Sidiki</div>
													<div class="ref-student-category">IID1</div>
													<div class="ref-student-variants"></div>
													<div class="ref-student-personalization-holder"></div>
												</div>
												<div class="ref-student-price"></div>
											</div>
										</div>

									</div>
									<div class="ref-username-col">
										sidikiimane
									</div>
									<div class="ref-email-col">
										imanesidiki@gmail.com
									</div>
									<div class="ref-adress-col">
										<b>Firdaws, Khouribga 25000</b>
									</div>
									<div class="ref-tel-col">+2126388646641</div>
									<div class="d-flex flex-column  ref-cv-col"><a href="" >Télécharger le CV</a></div>
									<div class="d-flex flex-column  ref-action-col">
										<p><a href="" class="">Modifier</a></p>
										<p><a href="" class="">Supprimer</a></p>

									</div>
								</div>

							</div>

						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php'); ?>
