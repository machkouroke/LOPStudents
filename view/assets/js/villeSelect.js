const headers = new Headers();
headers.append("X-CSCAPI-KEY", "SFBubkZtSW9jWDI5UnIxaG5SNEFNYmw1M3VJQU13eUpWYVpFOHlHSg==");

const requestOptions = {
    method: 'GET',
    headers: headers,
    redirect: 'follow'
};
const countries = document.getElementById('country')
const cities = document.getElementById('city')

function fetchRequest(url, selectDiv) {

    fetch(url, requestOptions)
        .then(response => response.json())
        .then((result) => {
            selectDiv.innerHTML = ''
            for (let element of result) {

                selectDiv.innerHTML +=
                    `<option data-iso2="${element.iso2}"  value="${element.name}" >
                        ${element.name} 
                    </option>
                `
            }

        })
        .catch(error => console.log('error', error));
}

function addCountry() {
    fetchRequest("https://api.countrystatecity.in/v1/countries", countries);
}

/**
 *
 * @param countryIso
 */
function addCity(countryIso) {

    fetchRequest(`https://api.countrystatecity.in/v1/countries/${countryIso}/cities`, cities)
}
async function main() {
    await addCountry()
    await addCity('AF');
    countries.addEventListener('change', () => {
        addCity(countries.options[countries.selectedIndex].dataset.iso2);
    })

}

main()
// $(document).ready(function(){
//     $('#country').val("Benin").change();
//     $('#city').val("Cotonou").change();
// });
window.onload = function()
{
    $(function() {
        $('#country').val("Benin");
        // $('#city').val("Cotonou");
    });
}
