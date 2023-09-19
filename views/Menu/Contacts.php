<?php 
 include('views/Header.php');?>
 
<div class="container_ok">
	<div>
		<ul class="message">
			
		</ul>
	</div>
	<form id="form" method="POST">
		<div class="nname"><label class="label" id="labelName"></label><label class="label" >Имя:</label><input placeholder="Иван" type="text" id="name" class="input" name="name" ></div>
		<div class="eemail"><label class="label" id="labelEmail"></label><label class="label">Email:</label> <input placeholder="ivanov@mail.ru" id="email" type="text" class="input" name="email" ></div>
		<div class="qquest"><label class="label" >Вопрос:</label><label class="label" id="labelText"></label> <textarea placeholder="В чем сила, брат?" id="question" class="inputtext" name="question" ></textarea></div>
		<button type="submit" class="sendbutton">Отправить</button>
	</form>
	<?php include('views/Footer.php');?>
</div>
</body>

</html>