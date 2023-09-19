document.addEventListener("DOMContentLoaded", function() {
	document.addEventListener("myEvent", function(event) { 
		console.log("I am here");
		alert("Привет от " + event.target.tagName); 
	});

	const event = new Event("myEvent", {
			bubbles: true
		});
	
	const btn = document.querySelector("#custom");
	btn.addEventListener("click", function() {
		btn.dispatchEvent(event);
	});

});	