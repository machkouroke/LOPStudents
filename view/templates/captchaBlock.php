<div class="shadow my-3 px-3 mx-0 mx-lg-4 text-black  rounded   text-center d-flex align-items-center">
    <div class="d-flex flex-column align-items-center">
        <label for="studyField" class="form-label fw-bold ">Montre moi ton humanité🔥</label>
        <input form="register" class="form-control m-2" type="text" name="captcha" id="studyField">
        <div onclick="document.getElementById('captcha-image').src='<?= ASSETS_URL ?>captcha.php?'
            + Date.now()" id="refreshCaptcha"
             class="mx-2 bg-primary rounded d-flex align-items-center">
            <a>
                <img style="width: 40px; height: 40px" src="<?= IMG_URL ?>refresh.png" alt="">
            </a>
        </div>
    </div>

    <div class="text-center p-4 d-flex align-items-center ">
        <div><img id="captcha-image"
                  class=" w-100 rounded" src="<?= ASSETS_URL ?>captcha.php"
                  alt=""/></div>
    </div>

</div>