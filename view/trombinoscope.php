<?php $title = "Liste étudiant"; ?>
<?php ob_start(); ?>
<section class="py-5 mt-5">
	<div class="container py-5">

		<h1 class="py-5 ref-heading text-center fw-bold">Liste des étudiants </h1>
		<div class="d-flex flex-row justify-content-between align-items-center">

			<p><button id="moreButton" class="btn btn-primary">Plus d'option</button></p>

			<p><a href="listing.php"><img src="assets/img/list.png" alt="" class="switch"></a>
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
		<div class="row row-cols-2 row-cols-md-3 mx-auto" style="max-width: 700px;">

			<div class="col mb-4">
				<div class="text-center"><img alt="" class="miniature rounded mb-3 fit-cover"
				                              src="assets/img/team/avatar2.png">
					<h5 class="fw-bold mb-0"><strong>Aganon Déodat</strong></h5>
					<p class="text-muted mb-2">IID1</p>
				</div>
			</div>
			<div class="col mb-4">
				<div class="text-center"><img alt="" class="miniature rounded mb-3 fit-cover"
				                              src="assets/img/team/avatar2.png">
					<h5 class="fw-bold mb-0"><strong>Oke Machkour</strong></h5>
					<p class="text-muted mb-2">IID1</p>
				</div>
			</div>
			<div class="col mb-4">
				<div class="text-center"><img alt="" class="miniature rounded mb-3 fit-cover"
				                              src="assets/img/team/avatar2.png">
					<h5 class="fw-bold mb-0"><strong>Candy Aho</strong></h5>
					<p class="text-muted mb-2">IID1</p>
				</div>
			</div>
			<div class="col mb-4">
				<div class="text-center"><img alt="" class="miniature rounded mb-3 fit-cover" width="150" height="150"
				                              src="assets/img/team/avatar2.png">
					<h5 class="fw-bold mb-0"><strong>Anis Ben Bacar</strong></h5>
					<p class="text-muted mb-2">GPEE1</p>
				</div>
			</div>
			<div class="col mb-4">
				<div class="text-center"><img alt="" class="miniature rounded mb-3 fit-cover"
				                              src="assets/img/team/avatar2.png">
					<h5 class="fw-bold mb-0"><strong>Sangho Aminata</strong></h5>
					<p class="text-muted mb-2">IID1</p>
				</div>
			</div>
			<div class="col mb-4">
				<div class="text-center"><img alt="" class="miniature rounded mb-3 fit-cover"
				                              src="assets/img/team/avatar2.png">
					<h5 class="fw-bold mb-0"><strong>Mikael Pezongo</strong></h5>
					<p class="text-muted mb-2">IRIC1</p>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php'); ?>
