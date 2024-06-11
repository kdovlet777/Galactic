<?php

namespace App\Controllers;

class GreetingController extends BaseController
{
	public function actionGreeting($args) 
	{
		$this->render('views/Greeting.php', array("code" => $args));
	}
}