<?php

namespace App\Routers;

use App\Controllers\NewsController;

class NewsRouter
{
	public static function route($url)
	{
		$controller = false;
		if ($url == "/news/") {
			$controller = new NewsController;
			$methodName = 'actionList';
			$args = [1];
		} elseif ($url == "/about/") {
                        $controller = new NewsController;
                        $methodName = 'actionAbout';
                        $args = [1];
		} elseif (preg_match("{^/news/(\d+)/$}", $url, $id)) {
			$controller = new NewsController;
			$methodName = "actionDetail";
			$args = [$id[1]];
		} elseif (preg_match("{^/news/page-(\d+)/$}", $url, $pageID)) {
			$controller = new NewsController;
			$methodName = "actionList";
			$args = [$pageID[1]];
		} 
		if ($controller) {
			return array(
				"controller" => $controller,
				"action" => $methodName,
				"args" => $args
			);
		} else return false;
	}
}
