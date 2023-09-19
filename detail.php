<?php
include 'autoload.php';
spl_autoload_register('modelLoader');

session_start();

use App\Models\NewsModel;

$newsModel = new NewsModel;
$row = $newsModel->getItem($id);
$code = "News";

include 'views/News/Detail.php';