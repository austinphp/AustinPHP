<?php 
require ('Model.php');
require ('Collection.php');
require ('PickyCollection.php');
require ('Filter.php');

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


$pickycollection = new PickyCollection();

$pickycollection[] = $test1;
$pickycollection[] = $test2;
$pickycollection[] = $test3;
$pickycollection[] = $test4;
$pickycollection[] = $test5;


echo "PickyCollection contains "  . count($pickycollection) . " items\n";

$pickycollection->addFilter(PickyCollection::FILTER_NAME, array("bannedNames" => "test5"));
$pickycollection->addFilter(PickyCollection::FILTER_VALUE, array("mode"=> "greaterThan", "value"=>"5"));


foreach ($pickycollection as $model) {
	echo $model->name . " " . $model->value . "\n";
}


?>