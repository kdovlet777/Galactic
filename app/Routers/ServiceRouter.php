<?php

namespace App\Routers;

use App\Controllers\BaseController;
use App\Controllers\GreetingController;
use App\Controllers\NewsController;
class ServiceRouter 
{
	public static function route($url)
	{
		if ($url == "/") {
			$controller = new NewsController;
			$action = "actionList";
			$args = [1];
		} # else {
		#	$controller = new BaseController;
		#	$action = "notFound";
		#	$args = ["NotFound"];
		#}
		if ($controller) {
			return array(
				"controller" => $controller,
				"action" => $action,
				"args" => $args
			);
		} return false;
	}
}
