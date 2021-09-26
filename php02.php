<?php

class Flower
{
	static $JPName = '花';
	public $isBloom = false;

  static function getName() {
  	return self::$JPName;
  }

	function Saku() {
		$this->isBloom = true;
	}

	function Kare() {
		$this->isBloom = false;
	}
}

class Tulip extends Flower
{
	static $JPName = 'チューリップ';

	function __construct($color) {
		$this->color = $color;
	}

	static function getMyName() {
		return self::$JPName;//Tulip::$JPName;
	}

	static function getParentName() {
		return parent::$JPName;//Flower::$JPName;
	}
}

$tulip = new Tulip('赤');
$tulip->Saku();
var_dump($tulip->isBloom);

?><!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>PHP教材</title>
	<script>
	</script>
</head>
<body>
	<pre><?php

?></pre>
</body>
</html>