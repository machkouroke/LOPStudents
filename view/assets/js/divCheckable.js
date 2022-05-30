let divCheckBox = document.querySelectorAll('.checkboxes input[type=checkbox]');
for (let i of divCheckBox) {
    i.addEventListener('change', () => {
        let associatedLabel = document.querySelectorAll(`label[for=${i.name}]`);
        for (let j of associatedLabel) {
            j.style.color = i.checked ? '#00b779' : null;
        }

    })
}