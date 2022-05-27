let refreshButton = document.getElementById('refreshCaptcha')
refreshButton.addEventListener('click', () => {
    document.getElementById("captcha-image").src = '<?= ASSETS_DIR ?>captcha.php?' + Date.now();
});