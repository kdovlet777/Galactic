<?php 
	
namespace App;

use PDO;
use App\Config;

class DB
{
	public static $dbc;
	
	public static function connection()
	{
		if (self::$dbc == NULL) {
		   self::$dbc = new PDO("mysql:host=" . Config::get('DBHOST') . ";dbname=" . Config::get('DBNAME') . ";charset=utf8", Config::get('DBUSER'), Config::get('DBPWD'));
		}
		
		return self::$dbc;
	}
}