<?php

namespace App\Routers;

use App\Controllers\BaseController;
use App\Controllers\GreetingController;

class ServiceRouter 
{
	public static function route($url)
	{
		if ($url == "/") {
			$controller = new GreetingController;
			$action = "actionGreeting";
			$args = ["greeting"];
		} else {
			$controller = new BaseController;
			$action = "notFound";
			$args = ["NotFound"];
		}
		if ($controller) {
			return array(
				"controller" => $controller,
				"action" => $action,
				"args" => $args
			);
		} return false;
	}
}