let listPage = document.getElementById("listPage");
let switchIcon = document.getElementById("switchIcon");
switchIcon.addEventListener('click', () => {

    if (!listPage.classList.contains('flipBack') && !listPage.classList.contains('flipFront')) {
        listPage.classList.add('flipBack')
    }
    else if (listPage.classList.contains('flipBack')) {
        listPage.classList.add('flipFront');
        listPage.classList.remove('flipBack');
    } else {
        listPage.classList.add('flipBack');
        listPage.classList.remove('flipFront');
    }

})