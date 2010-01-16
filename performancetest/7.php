<?
	$start1 = microtime(true);
	for ($c = 0; $c < 100000; $c++)
	{
		echo "Foo" . "Bar" . "Baz";
	}
	$stop1 = microtime(true);
	
	$start2 = microtime(true);
	for ($c = 0; $c < 100000; $c++)
	{
		echo "Foo", "Bar", "Baz";


	$stop2 = microtime(true);
	echo "\n\n";
	echo "First loop took " . ($stop1 - $start1) . " seconds\n";
	echo "Second loop took " . ($stop2 - $start2) . " seconds\n";
	
?>