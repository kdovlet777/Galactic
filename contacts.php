<?php 
	
	$code="Contacts";
 include('header.php');?>
 
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
	<?php include('footer.php');?>
</div>
<?php 

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['question']) 
	&& $_POST['name'] != '' && $_POST['email'] != '' && $_POST['question'] != '' 
){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$question = $_POST['question'];
	$dbc = new PDO("mysql:host=localhost;dbname=news;charset=utf8","root","root");
	$sql = 'insert into feedback values(0, :name, :email, :question);';
	
	$st = $dbc->prepare($sql);
	$st->bindValue(":name", $name, PDO::PARAM_STR);
	$st->bindValue(":email", $email, PDO::PARAM_STR);
	$st->bindValue(":question", $question, PDO::PARAM_STR);
	$st->execute();

	$mailBody = "Вопрос от $name - $email: \n $question";

	mail(
		"s245@techart.ru", 
		"Нам задали вопрос", 
		$mailBody);

	header('location: /ok.php');
	die;
}
?>

</body>

</html>
