<?
	class foo
	{
		public $bar;
	}

	$start = microtime(true);
	for ($c = 0; $c < 100000; $c++)
	{
		$a++;
		unset($a);
	}
	echo "First loop took " . (microtime(true) - $start) . " seconds\n";
	
	$start = microtime(true);
	for ($c = 0; $c < 100000; $c++)
	{
		$a = 0; 
		$a++;
	}
	echo "Second loop took " . (microtime(true) - $start) . " seconds\n";
	
	$f = new foo();
	$start = microtime(true);
	for ($c = 0; $c < 100000; $c++)
	{
		$f->bar++;
	}
	echo "Third loop took " . (microtime(true) - $start) . " seconds\n";
	
	
?>