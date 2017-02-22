<?php
require_once "./MonitorService.php";

class PortMonitorService extends MonitorService
{
	private $host;
	private $port;
	function __construct($host='localhost',$port=80)
	{
		$this->host = $host;
		$this->port = $port;
	}

	public function execute()
	{

		$fh = @fsockopen($this->host, $this->port, $errno, $errstr, 5);

		if (is_resource($fh))
		{
			$service = getservbyport($this->port, 'tcp');
			echo "$this->host port:$this->port service:$service is open.\n";

			fclose($fh);
		}

		else
		{
			echo "Error: $errstr ($errno) for $this->host:$this->port\n";
		}

	}

}

