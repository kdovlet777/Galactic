<?php

namespace App\Controllers;

class NotFoundController extends BaseController 
{
	public function notFound($args)
	{
		$this->render('views/NotFound.php', array("code"=>$args));	
	}
}