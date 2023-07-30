<?php 
	session_start();
	require_once('CommentModel.php');
	use MySpace\CommentModel;
	$comment = new CommentModel;
		if (isset($_POST['name']) && isset($_POST['comment']) && $_POST['name'] != "" && $_POST['comment'] != ""){
			$comment::createComment($_POST['name'], $_POST['comment'], $_SESSION['news_id']);
		}

?>