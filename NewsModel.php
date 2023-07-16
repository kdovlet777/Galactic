<?php 
	namespace MySpace;
	require_once('DB.php');
	use MySpace\DB;
	use PDO;

	class NewsModel{
		public static function getCount(){
			$sql = 'select count(*) from news ;';
			$st = DB::connection()->query($sql);
			$st -> execute();
			$row = $st -> fetch();
			return $row['count(*)'];
		}
		public static function getList($start, $limit){
			$sql = 'select *,DATE_FORMAT(date, "%d.%m.%Y") dt from news order by date desc limit :start , :limit ;';
			$st = DB::connection()->prepare($sql);
			$st->bindValue(":start", $start, PDO::PARAM_INT);
			$st->bindValue(":limit", $limit, PDO::PARAM_INT);
			$st->execute();
			return $st;
		}
		public static function getItem($id){
			$sql = 'select *,DATE_FORMAT(date, "%d.%m.%Y") dt from news where id= :id ;';
			$st = DB::connection()->prepare($sql);
			$st->bindValue(":id", $id, PDO::PARAM_INT);
			$st->execute();
			$row = $st -> fetch();
			return $row;
		}
		public static function getLast(){
			$dsql = 'select * from news order by date desc limit 1';
			$bt = DB::connection()->query($dsql);
			$bt->execute();
			$row = $bt -> fetch();
			return $row;
		}
	}
?>