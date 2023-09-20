<?php 

namespace App\Controllers;

use App\Models\NewsModel;
use App\Controllers\BaseController;

class NewsController extends BaseController
{
	public function actionList($pageID)
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

		$this->render('views/News/List.php', array (
			'code'=>$code, 
			'news'=>$news, 
			'start'=>$start,
			'amount'=>$amount,
			'st'=>$st,
			'bt'=>$bt
		));
	}

	public function actionDetail($id)
	{
		session_start();
		$newsModel = new NewsModel;
		$row = $newsModel->getItem($id);
		$code = "News";

		$this->render('views/News/Detail.php', array (
			'newsModel'=>$newsModel,
			'row'=>$row,
			'code'=>$code,
		));
	}
}