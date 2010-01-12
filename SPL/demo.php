<?php 
require('Model.php');
require('Collection.php');

$collection = new Collection();

$test1 = new Model( array("name" => "test1", "value" => "5") );
$test2 = new Model( array("name" => "test2", "value" => "10") );
$test3 = new Model( array("name" => "test3", "value" => "15") );
$test4 = new Model( array("name" => "test4", "value" => "20") );
$test5 = new Model( array("name" => "test5", "value" => "25") );

$collection[] = $test1;
$collection[] = $test2;
$collection[] = $test3;
$collection[] = $test4;
$collection[] = $test5;

echo "Collection contains "  . count($collection) . " items\n";

foreach ($collection as $model) {
	echo $model->name . " " . $model->value . "\n";
}


?>