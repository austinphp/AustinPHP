<?
	$products = array();
	$xml = simplexml_load_file('test.xml');
	
	$timestart = microtime(true);
	foreach ($xml->product as $product)
	{
		if (!in_array($product->sku, $products))
		{
			$products[] = $product->sku;			
		}
	}
	$timestop = microtime(true);
	echo "1st loop took " . ($timestop - $timestart) . " seconds\n";
	
	$products = array();
	$timestart = microtime(true);
	foreach ($xml->product as $product)
	{
		if (!isset($products[(string) $product->sku]))
		{
			$products[(string) $product->sku] = 1;			
		}
	}
	$timestop = microtime(true);
	echo "2nd loop took " . ($timestop - $timestart) . " seconds\n";
	
	$timestart = microtime(true);
	$string = "Am I long enough?";
	for ($c = 0; $c < 100000; $c++)
	{
		if (strlen($string) < 5)
		{
			//do something
		}
	}
	$timestop = microtime(true);
	echo "3rd loop took " . ($timestop - $timestart) . " seconds\n";
	
	$timestart = microtime(true);
	$string = "Am I long enough?";
	for ($c = 0; $c < 100000; $c++)
	{
		if (isset($string{6}))
		{
			//do something
		}
	}
	$timestop = microtime(true);
	echo "4th loop took " . ($timestop - $timestart) . " seconds\n";
?>