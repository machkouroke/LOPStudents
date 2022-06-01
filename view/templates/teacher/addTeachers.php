<section class="py-5 mt-5">
	<div class="container py-5">
		<div class="row mb-4 mb-lg-5">
			<div class="col-md-8 col-xl-6 text-center mx-auto">

				<h2 class="fw-bold"><?= $instructions ?></h2>
			</div>
		</div>
		<div class="row d-flex justify-content-start justify-content-lg-start align-items-lg-center">
			<div class="col">
				<div >
					<?= $form ?>
				</div>
			</div>
			<?php if ($_GET['step'] == 1): ?>
			<div class="d-none d-lg-block col ref-product " style="text-align: center;">



				<div style="width: 90%;height: 100%; ">
					<img class="rounded ref-image img-responsive w-100 h-100"
					     data-aos="fade-down" data-aos-once="true"
					     src="<?= IMG_URL ?>menu/addTeacher.png"
					     alt="">
				</div>
			</div>
			<?php endif;?>
		</div>

	</div>
</section>
<script src="<?= JS_URL ?>villeSelect.js"></script>

