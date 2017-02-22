<?php

class PortServiceMonitor
{
	private $host;
	private $ports;
	function __construct($host,$ports)
	{
		$host = 'localhost';
		$ports = array(22, 80, 443, 3306);
	}

	private function __port()
	{
		foreach ($ports as $port)
		{
			$fh = @fsockopen($host, $port, $errno, $errstr, 5);

			if (is_resource($fh))
			{
				$service = getservbyport($port, 'tcp');
				echo "$host port:$port service:$service is open.\n";

				fclose($fh);
			}

			else
			{
				echo "Error: $errstr ($errno) for $host:$port\n";
			}
		}
	}

}

