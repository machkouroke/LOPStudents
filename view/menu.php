<?php $title = "Liste étudiant"; ?>
<?php ob_start(); ?>
<section class="py-5 mt-5">
	<div class="container py-5">
		<div class="row mb-4 mb-lg-5">
			<div class="col-md-8 col-xl-6 text-center mx-auto">
				<h2 class="fw-bold">Bienvenue sur LOPStudents</h2>
				<p class="text-muted w-lg-50">Veuillez selectionner une opération</p>
			</div>
		</div>
		<div class="row mx-auto" style="/*max-width: 700px;*/">
			<div class="col">
				<div>
					<div class="reflow-product-list ref-cards">
						<div class="ref-products align-items-center">
							<a class="ref-product" href="<?= BASE_URL ?>index.php?action=addStudent">
								<img class="ref-image" src="<?= IMG_URL ?>menu/add.png" alt=""/>
								<div class="ref-product-data">
									<h5 class="ref-name text-center w-100">Ajouter un étudiants</h5>
								</div>
							</a>
							<a class="ref-product" href="<?= BASE_URL ?>index.php?action=addTeacher">
								<img class="ref-image" src="<?= IMG_URL ?>menu/addTeacher.png"
								     alt=""/>
								<div class="ref-product-data">
									<div class="ref-product-data">
										<h5 class="ref-name text-center w-100">Ajouter un proffesseur</h5>
									</div>
								</div>
							</a>
							<a class="ref-product" href="<?= BASE_URL ?>index.php?action=listingStudents">
								<img class="ref-image" src="<?= IMG_URL ?>menu/listStudent.png"
								     alt=""/>
								<div class="ref-product-data">
									<div class="ref-product-data">
										<h5 class="ref-name text-center w-100">Listing des Étudiants</h5>
									</div>
								</div>
							</a>
							<a class="ref-product" href="<?= BASE_URL ?>index.php?action=listingTeachers">
								<img class="ref-image" src="<?= IMG_URL ?>menu/listTeacher.png"
								     alt=""/>
								<div class="ref-product-data">
									<div class="ref-product-data">
										<h5 class="ref-name text-center w-100">Listing des Proffesseur</h5>
									</div>
								</div>
							</a>
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
