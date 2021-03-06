<?php
	/** @var string $type */
	$hideFacultyIfUpdate = $type == 'etd' || ($type == 'pr' && !isset($userToUpdate)); ?>
<section class="pb-5 py-5 mt-5">
	<div id="form-flip" class="container ">
		<div class="front">
			<div class='row mb-4 mb-lg-5'>
				<div class='col-md-8 col-xl-6 text-center mx-auto'>

					<h2 class='fw-bold'><a
								<?php if (isset($userToUpdate) && $type == 'etd'): ?>
									href=" <?= BASE_URL . "index.php?page=1&action=listingStudents" ?>"
								<?php endif ?>
								<?php if (isset($userToUpdate) && $type == 'pr'): ?>
									href=' <?= BASE_URL . 'index.php?page=1&action=listingTeacher' ?>'
								<?php endif ?>><?=
								/** @var string $instructions */
								$instructions ?></a>
					</h2>
				</div>
			</div>
			<div class="row d-flex justify-content-start justify-content-lg-start align-items-lg-center">
				<div class="col">
					<div class="row ">
						<form id="register" action='<?= BASE_URL ?>index.php?action=<?=
							/** @var string $action */
							$action ?>'
						      class='col shadow rounded p-4 m-5 p-xl-4' data-aos='fade-up'
						      method='post'
						      enctype='multipart/form-data'>
							<?php if (isset($_GET['error'])): ?>
								<div class="alert alert-danger" role="alert">
									<?= $_GET['error'] ?>
								</div>
							<?php endif ?>
							<?php if (isset($_GET['sucess'])): ?>
								<div class="alert alert-success" role="alert">
									<?= $_GET['sucess'] ?>
								</div>
							<?php endif ?>
							<?= $firstPart ?>

						</form>
						<?php if ($hideFacultyIfUpdate): ?>
							<div class='col shadow rounded p-4 m-5 p-xl-4' data-aos='fade-up'>

								<?= $secondPart ?>

							</div>
						<?php else: ?>
							<div class='col d-none d-md-block d-flex align-items-center' style='text-align: center;'>
								<img data-aos='fade-right' data-aos-once='true'
								     src="<?= IMG_URL . 'update.svg' ?>"
								     style='width: 90%;height: 90%;padding: 37px;' alt=''>
							</div>
						<?php endif ?>
						<div class='row d-flex justify-content-center  p-4'>
							<button form='register' id='submit'
							        class=' btn btn-primary shadow d-block w-50 '
							        type='submit'>
								Soumettre
							</button>
						</div>

					</div>

				</div>


			</div>
		</div>


	</div>
</section>



