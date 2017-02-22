<?php
require_once "./MonitorService.php"; 

class WebMonitorService extends MonitorService
{
	private $host;
	private $url;
	function __construct($host='localhost',$url="http://www.stetson.edu")
	{
		$this->host = $host;
		$this->url = $url;
	}

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

