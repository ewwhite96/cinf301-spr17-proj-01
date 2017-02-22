<?php

class WebMonitorService 
{
	private $host;
	private $urls;
	function __construct($host,$urls)
	{
		$host = 'localhost';
		$urls = array("http://www.stetson.edu", "http://www.google.com", "http://booboo.boo");
	}

	private function __web()
	{ 
		foreach ($urls as $url)
		{
			$fh = @fopen($url, "r");

			if (is_resource($fh))
			{
				echo "$url is open.\n";

				fclose($fh);
			}

			else
			{
				echo "Error: $url not responding\n";
			}
		}
	}
}

