function sendMail(name, email, question) {
	const request = fetch("/data.php", {
		method: "POST",
		body: JSON.stringify({name: name, email: email, question: question}),
	    headers: {
	        'content-type': 'application/json'
	    	}
		});	
		request.then(function(c) {
			console.log(c.statusText);
		});
}