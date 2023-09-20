<?php

namespace App\Routers;

use App\Controllers\GreetingController;
use App\Controllers\NotFoundController;

class ServiceRouter 
{
	public static function route($url)
	{
		if ($url == "/") {
			$controller = new GreetingController;
			$action = "greeting";
			$args = ["greeting"];
		} else {
			$controller = new NotFoundController;
			$action = "notFound";
			$args = ["NotFound"];
		}
		if ($controller) {
			return array(
				"controller"=>$controller,
				"action"=>$action,
				"args"=>$args
			);
		} return false;
	}
}