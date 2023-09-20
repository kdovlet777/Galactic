<?php

include 'autoload.php';

use App\Routers\NewsRouter;
use App\Routers\ServiceRouter;

$url = $_SERVER['REQUEST_URI']; 

$routes = [
	'news'=>NewsRouter::class,
	'service'=>ServiceRouter::class
];

foreach ($routes as $key => $value) {
	if ($res = $value::route($url)) {
		call_user_func_array([$res['controller'], $res['action']], $res['args']);
		break;
	}
}
