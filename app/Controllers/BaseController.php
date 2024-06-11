<?php

namespace App\Controllers;

class BaseController 
{
	public function render($view, $data)
	{
		extract($data);
		ob_start();
		include $view;
		$content = ob_get_contents();
		ob_end_clean();
		include 'views/Layout.php';
	}

	public function notFound($args)
	{
		$this->render('views/NotFound.php', array("code" => $args));	
	}
}