<?php $title = "LOPStudents"; ?>
<?php ob_start(); ?>
<section class="py-5 mt-5">
	<div class="container py-5">
		<div class="row mb-4 mb-lg-5">
			<div class="col-md-8 col-xl-6 text-center mx-auto">
				<h2 class="fw-bold">Bienvenue <?= $_SESSION['User']->getSurname() ?></h2>
				<p class="text-muted w-lg-50">Veuillez selectionner une opération</p>
			</div>
		</div>
		<div class="row mx-auto" style="/*max-width: 700px;*/">
			<div class="col">
				<div>
					<div class="reflow-product-list ref-cards">
						<div class="ref-products align-items-center">
							<?php if (ADMIN_ONLY) : ?>
								<a class="ref-product" href="<?= BASE_URL ?>index.php?action=addStudentPage">
									<img class="ref-image" src="<?= IMG_URL ?>menu/addStudent.png" alt=""/>
									<div class="ref-product-data">
										<h5 class="ref-name text-center w-100">Ajouter un étudiants</h5>
									</div>
								</a>
								<a class="ref-product" href="<?= BASE_URL ?>index.php?action=addTeacherPage">
									<img class="ref-image" src="<?= IMG_URL ?>menu/addTeacher.png"
									     alt=""/>
									<div class="ref-product-data">
										<div class="ref-product-data">
											<h5 class="ref-name text-center w-100">Ajouter un proffesseur</h5>
										</div>
									</div>
								</a>
							<?php endif ?>

							<a class="ref-product" href="<?= BASE_URL ?>index.php?action=listingStudents&page=1">
								<img class="ref-image" src="<?= IMG_URL ?>menu/listStudent.png"
								     alt=""/>
								<div class="ref-product-data">
									<div class="ref-product-data">
										<h5 class="ref-name text-center w-100"><?= LIST_OF_STUDENTS ?></h5>
									</div>
								</div>
							</a>
							<a class="ref-product" href="<?= BASE_URL ?>index.php?action=userPage">
								<img class="ref-image" src="<?= IMG_URL ?>menu/userPage.png"
								     alt=""/>
								<div class="ref-product-data">
									<div class="ref-product-data">
										<h5 class="ref-name text-center w-100">Voir ma page</h5>
									</div>
								</div>
							</a>
							<?php if (ADMIN_STUDENT) : ?>
								<a class="ref-product" href="<?= BASE_URL ?>index.php?action=listingTeachers&page=1">
									<img class="ref-image" src="<?= IMG_URL ?>menu/listTeacher.png"
									     alt=""/>
									<div class="ref-product-data">
										<div class="ref-product-data">
											<h5 class="ref-name text-center w-100"><?= LIST_OF_TEACHERS ?></h5>
										</div>
									</div>
								</a>
							<?php endif ?>

							<a class="ref-product" href="<?= BASE_URL ?>index.php?action=settings">
								<img class="ref-image" src="<?= IMG_URL ?>menu/settings.png"
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
			</div>
		</div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require(BASE_DIR . 'view\templates\base.php'); ?>
