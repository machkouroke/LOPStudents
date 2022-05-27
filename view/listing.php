<?php $title = "Liste étudiant"; ?>
<?php ob_start(); ?>
<section class="py-5 mt-5">
	<div class="container py-5">
		<h1 class="ref-heading text-center fw-bold py-5">Liste des étudiants</h1>
		<div class="my-3 row mx-auto" style="/*max-width: 700px;*/">
			<div class="col">
				<div data-reflow-type="shopping-cart">
					<div class="reflow-shopping-cart">

						<div class="ref-cart" style="display: block;">

							<div class="d-flex flex-row justify-content-between align-items-center">

								<p><button id="moreButton" class="btn btn-primary">Plus d'option</button></p>

								<p><a href="trombinoscope.php"><img src="assets/img/grid.png" alt="" class="switch"></a>
								</p>
								<p><a href="#" class="btn btn-primary">Envoyer un mail</a></p>
							</div>
							<div id="moreOption" data-aos="fade-down" class="my-4  row bg-primary-gradient rounded p-3">
								<div class="reflow-product-list ref-cards">
									<div class="ref-products align-items-center">
										<a class="ref-product" href="add.php?title=de l'étudiant">
											<img class="ref-image" src="assets/img/add.png" alt=""/>
											<div class="ref-product-data">
												<h5 class="ref-name text-center w-100">Ajouter un étudiants</h5>
											</div>
										</a>
										<a class="ref-product" href="add.php?title=du proffesseur">
											<img class="ref-image" src="assets/img/addTeacher.png"
											     alt=""/>
											<div class="ref-product-data">
												<div class="ref-product-data">
													<h5 class="ref-name text-center w-100">Ajouter un proffesseur</h5>
												</div>
											</div>
										</a>
										<a class="ref-product" href="listing.php">
											<img class="ref-image" src="assets/img/listStudent.png"
											     alt=""/>
											<div class="ref-product-data">
												<div class="ref-product-data">
													<h5 class="ref-name text-center w-100">Listing des Étudiants</h5>
												</div>
											</div>
										</a>
										<a class="ref-product" href="listing.php">
											<img class="ref-image" src="assets/img/listTeacher.png"
											     alt=""/>
											<div class="ref-product-data">
												<div class="ref-product-data">
													<h5 class="ref-name text-center w-100">Listing des Proffesseur</h5>
												</div>
											</div>
										</a>
										<a class="ref-product" href="settings.php">
											<img class="ref-image" src="assets/img/settings.png"
											     alt=""/>
											<div class="ref-product-data">
												<div class="ref-product-data">
													<h5 class="ref-name text-center w-100">Paramètres</h5>
												</div>
											</div>
										</a>

									</div>
								</div>
							</div>
							<div class="ref-th">
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
									<div class="d-flex flex-column  ref-cv-col"><a href="">Télécharger le CV</a></div>
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
									<div class="d-flex flex-column  ref-cv-col"><a href="">Télécharger le CV</a></div>
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
