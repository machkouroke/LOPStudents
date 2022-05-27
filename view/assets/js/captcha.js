let refreshButton = document.getElementById('refreshCaptcha')
refreshButton.addEventListener('click', () => {
    document.getElementById("captcha-image").src = 'assets/captcha.php?' + Date.now();
});