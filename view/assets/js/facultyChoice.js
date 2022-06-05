let faculties = document.getElementsByClassName('faculty');

for (let faculty of faculties) {
    let checkbox = faculty.querySelector('input[type=checkbox]')
    checkbox.addEventListener('change', () => {

        let module = faculty.querySelector(`input[type=text]`)
        module.readOnly = !checkbox.checked;
        module.addEventListener('input', () => {
            checkbox.value = checkbox.id + ";" + module.value;

        })

    })
}