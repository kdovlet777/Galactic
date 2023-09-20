<?php

namespace App\Controllers;

class GreetingController extends BaseController
{
	public function greeting($args)
	{
		$this->render('views/greeting.php', array("code"=>$args));
	}
}