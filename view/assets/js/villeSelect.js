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
					`<option value="${element.iso2}">
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
	console.log(countryIso)
	fetchRequest(`https://api.countrystatecity.in/v1/countries/${countryIso}/cities`, cities)
}

addCountry()
console.log('Pays add')
countries.addEventListener('change', () => {
	addCity(countries.value);
})