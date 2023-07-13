<?php 
		header("Content-Type: text/css");
		include("vendor/autoload.php");
		$scssCode = file_get_contents("assets/css/tyles.scss");

		use ScssPhp\ScssPhp\Compiler;
		$compiler = new Compiler();
		$compiled = $compiler->compileString($scssCode)->getCss();
		echo $compiled;
?>