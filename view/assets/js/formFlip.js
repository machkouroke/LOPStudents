let formFlip = document.getElementById("form-flip");

let suivant = document.getElementById("suivant");

suivant.addEventListener('click', (e) => {

    if (!formFlip.classList.contains('flipBack') && !formFlip.classList.contains('flipFront')) {

        formFlip.classList.add('flipBack')
        formFlip.querySelector('.front').style.display = 'none';

    }
    else if (formFlip.classList.contains('flipBack')) {
        formFlip.classList.add('flipFront');
        formFlip.classList.remove('flipBack');
    } else {
        formFlip.classList.add('flipBack');
        formFlip.classList.remove('flipFront');
    }
    return false;
})
