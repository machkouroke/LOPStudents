let deleteAction = document.getElementsByClassName('delete');
console.log(deleteAction);
for (let element of deleteAction) {
    element.addEventListener('click', (event) => {
        event.preventDefault();
        let choice = confirm('Vouliez vous vraiment le supprimer ?');
        if (choice) {
            element.submit();
        }
    })
}
