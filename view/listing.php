<?php ob_start(); ?>
<section class="py-5 mt-5">
	<div class="container py-5">
		<?php
			$switchPage = VIEW_URL . "trombinoscope.php";
			$switchIcon = IMG_URL . "grid.png";
			require(BASE_DIR . 'view\templates\listingHeader.php')
		?>
		<div id="listPage">
			<div class="list">
				<div class="row mx-auto" style="/*max-width: 700px;*/">
					<div class="col">
						<div data-reflow-type="shopping-cart">
							<div class="reflow-shopping-cart">

								<div class="ref-cart" style="display: block;">
									<div class="ref-th">
										<div class="ref-student-col">Étudiant</div>
										<div class="ref-username-col">Nom d'utilisateur</div>
										<div class="ref-email-col">Email</div>
										<div class="ref-adress-col">Adresse</div>
										<div class="ref-tel-col">Numéro de téléphone</div>
										<div class="ref-cv-col">CV</div>
										<div class="ref-action-col text-end">Actions</div>
									</div>
									<div  class="checkboxes ref-cart-table">

										<input name="imane" type="checkbox" id="imane"  />
										<label for="imane" class="ref-student box-checkbox">

											<div class="ref-student-col">
												<div class="ref-student-wrapper"><img class="ref-student-photo"
												                                      src="<?= IMG_URL ?>imane.jpg"
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
											<div class="d-flex flex-column text-end ref-action-col">
												<p><a href="" class="">Modifier</a></p>
												<p><a href="" class="">Supprimer</a></p>

											</div>
										</label>
										<input name="imane2" type="checkbox" id="imane2"  />
										<label for="imane2" class="ref-student box-checkbox">

											<div class="ref-student-col">
												<div class="ref-student-wrapper"><img class="ref-student-photo"
												                                      src="<?= IMG_URL ?>imane.jpg"
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
											<div class="d-flex flex-column text-end ref-action-col">
												<p><a href="" class="">Modifier</a></p>
												<p><a href="" class="">Supprimer</a></p>

											</div>
										</label>
									</div>
								</div>

							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="grid">
				<div class="checkboxes py-2 row row-cols-2 row-cols-md-3 mx-auto" style="max-width: 700px;">

					<label for="imane" class="col mb-4 box-checkbox">
						<div class="text-center"><img alt="" class="miniature rounded mb-3 fit-cover"
						                              src="<?= IMG_URL ?>team/avatar2.png">
							<h5 class="fw-bold mb-0"><strong>Aganon Déodat</strong></h5>
							<p class="text-muted mb-2">IID1</p>
						</div>
					</label>
					<label for="imane2" class="col mb-4 box-checkbox">
						<div class="text-center"><img alt="" class="miniature rounded mb-3 fit-cover"
						                              src="<?= IMG_URL ?>team/avatar2.png">
							<h5 class="fw-bold mb-0"><strong>Oke Machkour</strong></h5>
							<p class="text-muted mb-2">IID1</p>
						</div>
					</label>
					<div class="col mb-4">
						<div class="text-center"><img alt="" class="miniature rounded mb-3 fit-cover"
						                              src="<?= IMG_URL ?>team/avatar2.png">
							<h5 class="fw-bold mb-0"><strong>Candy Aho</strong></h5>
							<p class="text-muted mb-2">IID1</p>
						</div>
					</div>
					<div class="col mb-4">
						<div class="text-center"><img alt="" class="miniature rounded mb-3 fit-cover" width="150" height="150"
						                              src="<?= IMG_URL ?>team/avatar2.png">
							<h5 class="fw-bold mb-0"><strong>Anis Ben Bacar</strong></h5>
							<p class="text-muted mb-2">GPEE1</p>
						</div>
					</div>
					<div class="col mb-4">
						<div class="text-center"><img alt="" class="miniature rounded mb-3 fit-cover"
						                              src="<?= IMG_URL ?>team/avatar2.png">
							<h5 class="fw-bold mb-0"><strong>Sangho Aminata</strong></h5>
							<p class="text-muted mb-2">IID1</p>
						</div>
					</div>
					<div class="col mb-4">
						<div class="text-center"><img alt="" class="miniature rounded mb-3 fit-cover"
						                              src="<?= IMG_URL ?>team/avatar2.png">
							<h5 class="fw-bold mb-0"><strong>Mikael Pezongo</strong></h5>
							<p class="text-muted mb-2">IRIC1</p>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>
<script src="<?= JS_URL ?>divCheckable.js"></script>
<?php $content = ob_get_clean(); ?>

<?php require(BASE_DIR . 'view\templates\base.php'); ?>
