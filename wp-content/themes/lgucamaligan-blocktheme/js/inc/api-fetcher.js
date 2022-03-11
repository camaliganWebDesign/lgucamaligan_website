export const ApiFetcher = {
	headers: function() {
		return {
	      "Content-Type": "application/json",
	      "X-WP-Nonce" : lguLocalizedVars.nonce
	    }
	},
	get: async function( API ) {
		return fetch(encodeURI(API.url), {
			headers: this.headers(),
			method: 'GET'
		}).then( async function(response) {
			if(!response.ok) {
				const message = "An error has occured: " + response.status;
        		throw new Error(message);
			}
			return await response.json();
		}).then( async function(data) {
			return await data;
		}).catch( await function(error) {
			return error;
		});
	},
	post: function( API ) {
		return fetch( API.url, {
			headers: this.headers(),
			body: JSON.stringify(API.body),
			method: 'POST',
		}).then( async function(response) {
			if(!response.ok) {
				const message = "An error has occured: " + response.status;
        		throw new Error(message);
			}
			return await response.json();
		}).then( async function(data) {
			return await data;
		});
	},
	put: function( API ) {
		 return fetch(API.url, {
		 	headers: this.headers(),
		 	body: JSON.stringify(API.body),
		 	method: 'PUT',
		 }).then( async function(response) {
		 	if(!response.ok) {
		 		const message = "An error has ocured: " + response.status;
		 		throw new Error(message);
		 	}
		 	return await response.json();
		 }).then( async function(data) {
		 	return await data;
		 })
	}
};