<?php
	namespace MySpace;
	require_once('DB.php');
	use MySpace\DB;
	use PDO;

	class CommentModel {
		public static function getCount($news_id) {
			$sql = "select count(*) from comment where news_id = :news_id ;";
			$st = DB::connection()->prepare($sql);
			$st -> bindValue(":news_id", $news_id, PDO::PARAM_INT); 
			$st -> execute();
			$count = $st -> fetch();
			if ($count['count(*)'] == null) {
				return 0;
			} else return $count['count(*)'];
		}

		public static function getList($news_id) {
			$sql = "select *,DATE_FORMAT(date, '%d.%m.%Y в %H:%i') dt from comment where news_id = :news_id ;";
			$st = DB::connection()->prepare($sql);
			$st->bindValue(":news_id", $news_id, PDO::PARAM_INT);
			$st->execute();
			return $st;
		}

		public static function createComment($name, $text, $news_id) {
			$sql = "insert into comment values (NULL, :name, :text, CURRENT_TIMESTAMP(), :news_id);";
			$st = DB::connection()->prepare($sql);
			$st -> bindValue(":name", $name, PDO::PARAM_STR); 
			$st -> bindValue(":text", $text, PDO::PARAM_STR); 
			$st -> bindValue(":news_id", $news_id, PDO::PARAM_INT);
			$st -> execute();
			header("location: /work.php?id=".$news_id);
		}
	}
?>