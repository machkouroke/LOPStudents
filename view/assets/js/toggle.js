let moreButton = document.getElementById('moreButton');
moreButton.addEventListener("click", () => {
    let moreOption = document.getElementById('moreOption');

    if (window.getComputedStyle(moreOption).opacity === '0') {
        moreOption.classList.add("show");

    } else {
        moreOption.classList.remove("show");
    }
})