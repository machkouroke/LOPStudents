<section class="py-5 mt-5">
	<div class="container py-5">
		<div class="row mb-4 mb-lg-5">
			<div class="col-md-8 col-xl-6 text-center mx-auto">

				<h2 class="fw-bold">Veuillez saisir ses informations</h2>
			</div>
		</div>
		<div class="row d-flex justify-content-start justify-content-lg-start align-items-lg-center">
			<div class="col-md-6 col-xl-6">
				<div>
					<?= $form ?>
				</div>
			</div>
			<div class="col  " style="text-align: center;">
				<div style="width: 90%;height: 100%; "
				     class="mb-3 bg-primary text-white  rounded p-3 text-center d-flex flex-column align-items-center">
					<label for="studyField" class="form-label fw-bold ">Veuillez saisir le texte pour confirmer
					                                                    que vous n'êtes pas un robot
					</label>
					<input form="register" class="form-control m-2" type="text" name="captcha" id="studyField">
					<div class="text-center p-4 d-flex align-items-center ">
						<div onclick="document.getElementById('captcha-image').src='<?= ASSETS_URL ?>captcha.php?'
								+ Date.now()" id="refreshCaptcha"
						     class="mx-2 bg-primary rounded d-flex align-items-center">
							<a>
								<img style="width: 40px; height: 40px" src="<?= IMG_URL ?>refresh.png" alt="">
							</a>
						</div>
						<div><img id="captcha-image"
						          class=" w-100 rounded" src="<?= ASSETS_URL ?>captcha.php"
						          alt=""/></div>
					</div>

				</div>

				<div style="width: 90%;height: 100%; ">
					<img class="rounded ref-image img-responsive w-100 h-100"
					     data-aos="fade-down" data-aos-once="true"
					     src="<?= IMG_URL ?>menu/addTeacher.png"
					     alt="">
				</div>
			</div>
		</div>

	</div>
</section>
<script src="<?= JS_URL ?>villeSelect.js"></script>

