<?
	function dosomething()
	{
		$i = 0;
		$i++;
	}
	
	class something
	{
		public static function dosomething()
		{
			$i = 0;
			$i++;
		}
		
		public function dosomethingelse()
		{
			$i = 0; 
			$i++;
		}
	}
	

	$start = microtime(true);
	for ($c = 0; $c < 1000000; $c++)
	{
		dosomething();
	}
	echo "First loop took " . (microtime(true) - $start) . " seconds\n";
	
	$start = microtime(true);
	for ($c = 0; $c < 1000000; $c++)
	{
		$i = 0;
		$i++;
	}
	echo "Second loop took " . (microtime(true) - $start) . " seconds\n";
	
	$foo = new something();
	$start = microtime(true);
	for ($c = 0; $c < 1000000; $c++)
	{
		$foo->dosomethingelse();
	}
	unset($foo);
	echo "Third loop took " . (microtime(true) - $start) . " seconds\n";
	
	$foo = new something();
	$start = microtime(true);
	for ($c = 0; $c < 1000000; $c++)
	{
		something::dosomething();
	}
	echo "Fourth loop took " . (microtime(true) - $start) . " seconds\n";

?>