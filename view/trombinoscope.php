<?php $title = "Liste étudiant"; ?>
<?php ob_start(); ?>
<section class="py-5 mt-5">
	<div class="container py-5">

		<?php
			$switchPage = "listing.php";
			$switchIcon = "list.png";
			require('templates/listingHeader.php')
		?>
		<div class="py-2 row row-cols-2 row-cols-md-3 mx-auto" style="max-width: 700px;">

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
