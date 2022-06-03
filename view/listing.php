<?php ob_start();
	$listing = false;
?>
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

-			<div class="list overflow rounded">
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
										<?php if ($title === LIST_OF_STUDENTS & ADMIN_TEACHER): ?>
											<div class="ref-cv-col">CV</div>
										<?php endif ?>
										<?php if (ADMIN_TEACHER): ?>
											<div class="ref-action-col text-end">Actions</div>
										<?php endif ?>

									</div>
									<div class="checkboxes ref-cart-table ">
										<?php foreach ($data as $user): ?>

											<input form="MessageSender" name="user[]" value="<?= $user->getEmail() ?>"

											       type="checkbox"
											       id="<?= $user->getLogin() ?>"/>
											<label for="<?= $user->getLogin() ?>" class="w-100 ref-student box-checkbox">

												<div class="ref-student-col">
													<div class="ref-student-wrapper flex-xxl-row flex-column">
														<a href="<?= BASE_URL ?>index.php?action=userPage&userLogin=<?= $user->getLogin() ?>"><img
																	class='ref-student-photo'
																	src="<?= PIC_URL . $user->getLogin() . '.jpg' ?>"
																	alt='<?= $user->getLogin() ?>'/></a>
														<div class="ref-student-data">
															<div class="ref-student-info">
																<div class="ref-student-name">
																	<?= $user->getSurname() . ' ' . $user->getName() ?></div>
																<div class="ref-student-category">
																	<?= $user->getFaculty() . ' ' . $user->getFacultyYear() ?>
																</div>
																<div class="ref-student-personalization-holder">
																	<?= $user->getCne() ?>
																</div>
															</div>
														</div>
													</div>

												</div>
												<div class="ref-username-col ">
													<?= $user->getLogin() ?>
												</div>
												<div class="ref-email-col">
													<?= $user->getEmail() ?>
												</div>
												<div class="ref-adress-col">
													<b><?= $user->getZipCode() . ', ' . $user->getCity() . ' ' . $user->getCountry() ?></b>
												</div>
												<div class="ref-tel-col">+2126388646641</div>
												<?php if (ADMIN_TEACHER): ?>
													<div class="d-flex flex-column  ref-cv-col"><a href="">
															Télécharger le CV</a>
													</div>
												<?php endif; ?>
												<?php if (ADMIN_TEACHER): ?>
													<div class="d-flex flex-column text-center ref-action-col">
														<p><a href="" class="">Modifier</a></p>
														<p>
															<a href="<?= BASE_URL ?>index.php?action=deleteStudent&login=<?= $user->getLogin() ?>"
															   class="">Supprimer</a></p>
													</div>
												<?php endif ?>
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
					<?php foreach ($data as $user): ?>
						<label for="<?= $user->getLogin() ?>" class="col mb-4 box-checkbox">
							<div class="text-center"><img alt="" class="miniature rounded mb-3 fit-cover"
							                              src="<?= PIC_URL . $user->getLogin() . '.jpg' ?>">
								<h5 class="fw-bold mb-0">
									<strong><?= $user->getSurname() . ' ' . $user->getName() ?></strong>
								</h5>
								<p class="text-muted mb-2"><?= $user->getFaculty() . ' ' . $user->getFacultyYear() ?></p>
							</div>
						</label>
					<?php endforeach ?>

				</div>
			</div>

		</div>
		<nav class="my-5 py-5 w-100 d-flex justify-content-center">
			<ul class='pagination'>
				<?php for ($i = 1; $i < $numberOfPage + 1; $i++): ?>

					<li class='page-item'><a class='page-link text-primary'
					                         href='<?= BASE_URL ?>index.php?action=listingStudents&page=<?= $i ?>'>
							<?= $i ?></a>
					</li>


				<?php endfor; ?>
			</ul>
		</nav>
	</div>

</section>

<script src="<?= JS_URL ?>divCheckable.js"></script>
<?php $content = ob_get_clean(); ?>

<?php require(BASE_DIR . 'view\templates\base.php'); ?>
