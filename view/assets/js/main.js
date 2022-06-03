let deleteAction = document.getElementsByClassName('delete');
for (let element of deleteAction) {
    element.addEventListener('submit', (event) => {
        event.preventDefault();
        let choice = confirm('Vouliez vous vraiment le supprimer ?');
        if (choice) {
            element.submit();
        }
    })
}
