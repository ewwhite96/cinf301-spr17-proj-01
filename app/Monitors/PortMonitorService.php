<?php
require_once 'MonitorService.php';
/*
This is the PortsMonitorService class.
This class uses signal handlers to cheack 
whether or not ports are open.
*/

class PortMonitorService extends MonitorService
{
	private $host;
	private $port;
	//This __construct funtion passes in a host and port number to check
	function __construct($host,$port)
	{
		$this->host = $host;
		$this->port = $port;
	}
	//The execute function is used to actually check and see whether or not
	//the port is open and returns an error if it isn't 
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

