document.addEventListener("DOMContentLoaded", function() {
	const btn = document.querySelector('.button');
	const pass = document.querySelector('.pass');
	const out = document.querySelector('.output');
	
	btn.addEventListener("click", function(event){
		const request = fetch('/get.php', {
		method: "POST",
		body: JSON.stringify({pass: pass.value}),
	    headers: {
	        'content-type': 'application/json'
	    	}
		});
		request.then(function(e){
			e.text().then(function(d){
				out.textContent = d;
			})
		})
		
	})
})
