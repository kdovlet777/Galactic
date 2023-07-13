<?php 
	// use App\Models\Animal;
	abstract class Animal {
		public $name;
		public static $counter = 0;
		public $id = 0;
		public function __construct($name){
			$this -> name = $name;
			$this -> id = self::$counter;
		}
		
		abstract public function title();

		public function dump(){
			print $this -> title();
			print ' ';
			print $this -> name;
			print " {$this -> id} из ";
			print self::$counter;
			echo nl2br("\n");
		}

		public static function create($name){
			self::$counter++;
			return new static($name);
		}
	}

	class Cat extends Animal {
		public $name;
		public function title(){
			return 'Cat';
		}
	}

	class Dog extends Animal {
		public function title(){
			return 'Dog';
		}
	}
	$vaska = Cat::create("Васька");
	$rex = Dog::create("Рекс");
	$barsik = Cat::create("Барсик");
	$chibi = Dog::create("Чиби");

	$vaska->dump();
	$rex->dump();
	$barsik->dump();
	$chibi->dump();
?>