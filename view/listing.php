<?php ob_start(); ?>
<section class="py-5 mt-5">
	<div class="container py-5">
		<?php
			$switchPage = VIEW_URL . "trombinoscope.php";
			$switchIcon = IMG_URL . "grid.png";
			require(BASE_DIR . 'view\templates\listingHeader.php')
		?>
		<?php if (isset($_GET['sucess'])): ?>
			<div class="my-2 alert alert-success" role="alert">
				<?= $_GET['sucess'] ?>
			</div>
		<?php endif ?>
		<div id="listPage">

			<div class="list">
				<div class="row mx-auto" style="/*max-width: 700px;*/">
					<div class="col">
						<div data-reflow-type="shopping-cart">
							<div class="reflow-shopping-cart">

								<div class="ref-cart" style="display: block;">
									<div class="ref-th">
										<div class="ref-student-col">
											<?= $title === LIST_OF_STUDENTS ? 'Étudiants' : 'Proffesseur' ?>
										</div>
										<div class="ref-username-col">Nom d'utilisateur</div>
										<div class="ref-email-col">Email</div>
										<div class="ref-adress-col">Adresse</div>
										<div class="ref-tel-col">Numéro de téléphone</div>
										<?php if ($title === LIST_OF_STUDENTS): ?>
											<div class="ref-cv-col">CV</div>
										<?php endif ?>
										<div class="ref-action-col text-end">Actions</div>

									</div>
									<div class="checkboxes ref-cart-table">
										<?php foreach ($data as $row): ?>

											<input form="MessageSender" name="user[]" value="<?= $row['email'] ?>"
											       type="checkbox"
											       id="<?= $row['login'] ?>"/>
											<label for="<?= $row['login'] ?>" class="ref-student box-checkbox">

												<div class="ref-student-col">
													<div class="ref-student-wrapper flex-xxl-row flex-column">
														<img class="ref-student-photo"
														     src="<?= PIC_URL . $row['login'] . '.jpg' ?>"
														     alt="Imane"/>
														<div class="ref-student-data">
															<div class="ref-student-info">
																<div class="ref-student-name">
																	<?= $row['surname'] . ' ' . $row['name'] ?></div>
																<div class="ref-student-category">
																	<?= $row['faculty'] . ' ' . $row['facultyYear'] ?>
																</div>
																<div class="ref-student-personalization-holder">
																	<?= $row['cne'] ?>
																</div>
															</div>
														</div>
													</div>

												</div>
												<div class="ref-username-col">
													<?= $row['login'] ?>
												</div>
												<div class="ref-email-col">
													<?= $row['email'] ?>
												</div>
												<div class="ref-adress-col">
													<b><?= $row['zipCode'] . ', ' . $row['city'] . ' ' . $row['country'] ?></b>
												</div>
												<div class="ref-tel-col">+2126388646641</div>
												<div class="d-flex flex-column  ref-cv-col"><a href="">
														Télécharger le CV</a>
												</div>
												<div class="d-flex flex-column text-center ref-action-col">
													<p><a href="" class="">Modifier</a></p>
													<p><a href="" class="">Supprimer</a></p>
												</div>
											</label>
										<?php endforeach ?>

									</div>
								</div>

							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="grid">
				<div class="checkboxes py-2 row row-cols-2 row-cols-md-3 mx-auto" style="max-width: 700px;">
					<?php foreach ($data as $row): ?>
						<label for="<?= $row['login'] ?>" class="col mb-4 box-checkbox">
							<div class="text-center"><img alt="" class="miniature rounded mb-3 fit-cover"
							                              src="<?= PIC_URL . $row['login'] . '.jpg' ?>">
								<h5 class="fw-bold mb-0"><strong><?= $row['surname'] . ' ' . $row['name'] ?></strong>
								</h5>
								<p class="text-muted mb-2"><?= $row['faculty'] . ' ' . $row['facultyYear'] ?></p>
							</div>
						</label>
					<?php endforeach ?>

				</div>
			</div>

		</div>

	</div>

</section>

<script src="<?= JS_URL ?>divCheckable.js"></script>
<?php $content = ob_get_clean(); ?>

<?php require(BASE_DIR . 'view\templates\base.php'); ?>
