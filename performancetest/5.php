<?
	$foo = true;
	$bar = false;
	
	ini_set('display_errors', 'Off');
	$start = microtime(true);
	for ($c = 0; $c < 100000; $c++)
	{
		if (in_array($foo, $bar))
		{
			$i = 0;
			$i++;
		}
	}
	echo "First loop took " . (microtime(true) - $start) . " seconds\n";
	
	$start = microtime(true);
	for ($c = 0; $c < 100000; $c++)
	{
		if (@in_array($foo, $bar))
		{

		}
	}
	echo "Second loop took " . (microtime(true) - $start) . " seconds\n";
	
	
	$foo = array(1,2,3);
	$bar = 1;
	$start = microtime(true);
	for ($c = 0; $c < 100000; $c++)
	{
		if (in_array($foo, $bar))
		{
			
		}
	}
	echo "Third loop took " . (microtime(true) - $start) . " seconds\n";
?>