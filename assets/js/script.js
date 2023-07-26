import Swiper from "https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.esm.browser.min.js";

document.addEventListener("DOMContentLoaded", function() {
	const swiper = new Swiper('.swiper-container', {
		  // Optional parameters
			  direction: 'horizontal',
			  loop: true,
			  autoplay: {
		        delay: 2500,
		        disableOnInteraction: false,
		      },
			  // If we need pagination
			  pagination: {
			    el: '.swiper-pagination',
			  },

			  // Navigation arrows
			  navigation: {
			    nextEl: '.swiper-button-next',
			    prevEl: '.swiper-button-prev',
			  },

			  // And if we need scrollbar
			  scrollbar: {
			    el: '.swiper-scrollbar',
			  },
			});
	const btn = document.querySelector(".sendbutton");
	const msg = document.querySelector(".message");
	const name = document.querySelector("#name");
	const email = document.querySelector("#email");
	const question = document.querySelector("#question");
	const regexemail = /^([a-zA-Z]|[0-9])([a-zA-Z]|[0-9]|[\.\_\-])+@([a-zA-Z]|[0-9])+\.[a-zA-Z]+/gm;
	const regex = /^\ *$/;
	let error = false;

	// const input = document.querySelector("#input");
	// input.addEventListener("keypress", function(event) {
	// 	if (event.key === "Enter") {
	// 		event.preventDefault();
	// 		btn.click();
	// 	}
	// });

	btn.addEventListener("click", function(event){
		event.preventDefault();
		error = false;
		msg.textContent = "";

		if (name.value.match(regex) != null){
			addLink("Значение поля Имя не может быть пустым", msg);
			error = true;
		}
		
		if (!email.value.match(regexemail)){
			addLink("Введена неверная почта", msg);
			error = true;
		}

		if (question.value.length > 50){
			addLink("Длина вопроса не может быть более 50 символов", msg);
			error = true;
		}

		if (!error) {
			document.querySelector('#form').submit();
		}
	});

	name.onblur = function() {
		if (name.value.match(regex) != null){
			changeLabel("labelName", "Значение поля Имя не может быть пустым");
			name.style = "border:4px solid; border-color: red; ";
		} else {
			changeLabel("labelName", "");
			name.style = "border:4px solid; border-color: green; ";
		}
	}

	email.onblur = function() {
		if (!email.value.match(regexemail)){
			changeLabel("labelEmail", "Введена неверная почта");
			email.style = "border:4px solid; border-color: red; ";
		} else {
			changeLabel("labelEmail","");
			email.style = "border:4px solid; border-color: green; ";
		}
	}

	question.onblur = function() {
		if (question.value.length > 50){
			changeLabel("labelText", `Длина вопроса не может быть более 50 символов. Вы ввели ${question.value.length}`);
			question.style = "border:4px solid; border-color: red; ";
		} else {
			changeLabel("labelText","");
			question.style = "border:4px solid; border-color: green; ";
		}
	}

});

function changeLabel(id, text){
	const label = document.querySelector(`#${id}`);
	label.style = "font-size:24px;"
	label.textContent = text;
}

function addLink(input, msg){
	let li = document.createElement("li");
	li.innerHTML = input;
	msg.appendChild(li);
}
