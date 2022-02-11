/*************************
 ******** VARIABLE ********
 **************************
 ************************/

const content = document.querySelector("#content");
const sendButton = document.querySelector("#send");

sendButton.addEventListener("click", () => {
	createARestaurant(restaurantName.value, address.value, city.value);
});

/*************************
 ******** FUNCTIONS ********
 **************************
 ************************/

/**
 * displays all the restaurants in the database
 */
function displayAll() {
	let url = "http://localhost/examphp2/?type=restaurant&action=index";

	fetch(url)
		.then((response) => response.json())
		.then((restaurants) => {
			console.log(restaurants);

			content.innerHTML = "";
			let templateRestaurant;

			restaurants.forEach((restaurant) => {
				templateRestaurant = `<div id="${restaurant.name}">
                    <hr>
                        <h2>Name : <strong>${restaurant.name}</strong></h2>
                        <p>${restaurant.address}<br>
                        ${restaurant.city}</p>
                        <button id="${restaurant.id}" class="showMore btn btn-info"><strong>Show more</strong></button>
                        <button id="${restaurant.id}" class="deleteButton btn btn-danger"><strong>X</strong></button>
                    <hr>
                </div>
            `;

				content.innerHTML += templateRestaurant;
			});

			document.querySelectorAll(".deleteButton").forEach((button) => {
				button.addEventListener("click", () => {
					deleteOneRestaurant(button.id);
				});
			});
			document.querySelectorAll(".showMore").forEach((button) => {
				button.addEventListener("click", () => {
					show(button.id);
				});
			});
		});
}

/**
 * Sends an insert request using the submitted form via POST method
 * Then displays all the restaurants
 *
 * @param {string} name
 * @param {string} address
 * @param {string} city
 */
function createARestaurant(name, address, city) {
	let url = "http://localhost/examphp2/?type=restaurant&action=new";

	let body = {
		name: name,
		address: address,
		city: city,
	};

	let request = {
		method: "POST",
		headers: {
			"Content-Type": "application/json",
		},
		body: JSON.stringify(body),
	};

	fetch(url, request)
		.then((response) => response.json())
		.then((data) => {
			console.log(data);
			displayAll();
		});
}

/**
 * Sends a delete request using the restaurant's associated id
 * Then displays all the restaurants in the database
 *
 * @param {int} id
 */
function deleteOneRestaurant(id) {
	let url = "http://localhost/examphp2/?type=restaurant&action=suppr";

	let body = {
		id: id,
	};

	let request = {
		method: "DELETE",
		headers: {
			"Content-Type": "application/json",
		},
		body: JSON.stringify(body),
	};

	fetch(url, request)
		.then((response) => response.json())
		.then((data) => {
			console.log(data);
			displayAll();
		});
}

/*
function show(id){
    let url = "http://localhost/examphp2/?type=restaurant&action=show" + id;
    fetch(url)
			.then((response) => response.json())
			.then((data) => {
				console.log(data);
				

			});

}
*/

displayAll();
