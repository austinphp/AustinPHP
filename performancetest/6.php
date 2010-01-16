<?
	$start = microtime(true); //damn
	for ($c = 0; $c < 100000; $c++)
	{
		$a = time();
	}
	echo "First loop took " . (microtime(true) - $start) . " seconds\n";
	
	$start = microtime(true);
	for ($c = 0; $c < 100000; $c++)
	{
		$a = $_SERVER['REQUEST_TIME'];
	}
	echo "Second loop took " . (microtime(true) - $start) . " seconds\n";
	
?>