<?php
require_once 'MonitorService.php'; 

/*
This is the WebMonitorService class.
It uses signal handelers to check 
whether a web link is open or not.
*/


class WebMonitorService extends MonitorService
{
	private $host;
	private $url;
	//This __construct function passes in a host url to check
	function __construct($host,$url)
	{
		$this->host = $host;
		$this->url = $url;
	}
	//The execute funtion uses handlers to check if the web link
	//and return the information 
	public function execute()
	{ 

		$fh = @fopen($this->url, "r");

		if (is_resource($fh))
		{
			echo "$this->url is open.\n";

			fclose($fh);
		}

		else
		{
			echo "Error: $this->url not responding\n";
		}

	}
}

