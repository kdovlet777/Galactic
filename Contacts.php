<?php 
	$code="Contacts";
	include 'app/views/Menu/Contacts.php';

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

