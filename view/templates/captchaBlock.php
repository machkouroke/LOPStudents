<div class="shadow my-3 py-2 px-3 mx-0 mx-lg-4 text-black  rounded   text-center d-flex align-items-center">
	<div class="d-flex flex-column align-items-center">
		<label for="captcha" class="form-label fw-bold ">Montre moi ton humanité🔥</label>
		<input form="register" class="form-control m-2" type="text" name="captcha" id="captcha">

		<div id="refreshCaptcha"
		     class=" mx-2 bg-primary rounded d-flex align-items-center">

			<a>
				<img style="width: 40px; height: 40px" src="<?= IMG_URL ?>refresh.png" alt="">
			</a>
		</div>
		<script>
			let refresh = document.getElementById('refreshCaptcha');
			refresh.addEventListener('click', () => {
				fetch("http://<?= $_SERVER['HTTP_HOST'] . ASSETS_URL . 'captcha.php' ?>", {
					method: 'POST',
					headers: {
						"Content-Type": 'application/x-www-form-urlencoded; charset=UTF-8'
					}
				}).then((response) => response.text())
						.then((res) => (document.getElementById('captcha-image').src = `<?= ASSETS_URL ?>captcha.php?${new Date().getTime()}`))
						.catch((error) => document.getElementById('captcha').value = error)
			})
		</script>
	</div>

	<div class="text-center p-4 d-flex align-items-center ">
		<div><img id="captcha-image" class=" w-100 rounded" src="<?= ASSETS_URL ?>captcha.php" alt=""/></div>

	</div>

</div>