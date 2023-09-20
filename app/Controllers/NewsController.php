<?php 

namespace App\Controllers;

use App\Models\NewsModel;

class NewsController
{
	public static function actionList($pageID)
	{
		session_start();
		$code = "News";
		$news = new NewsModel;

		$start = 0;
		$amount = 4;

		if (isset($pageID)) {
			$start += 4*($pageID - 1);
			$_SESSION['pageID'] = $pageID;
		} else {
			$_SESSION['pageID'] = 1;
		}

		$st = $news::getList($start, $amount);
		$bt = $news::getLast();

		ob_start();
		include 'views/News/List.php';
		$content = ob_get_contents();
		ob_end_clean();
		include 'views/Layout.php';
	}

	public static function actionDetail($id)
	{
		session_start();
		$newsModel = new NewsModel;
		$row = $newsModel->getItem($id);
		$code = "News";

		ob_start();
		include 'views/News/Detail.php';
		$content = ob_get_contents();
		ob_end_clean();
		include 'views/Layout.php';
	}
}