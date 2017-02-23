<?php
require_once '/root/project/vendor/autoload.php'; 
require_once '/root/project/app/Monitors/PortMonitorService.php';
require_once '/root/project/app/Monitors/WebMonitorService.php';


/*
 * The class MonitorManager uses Reflection to automatically instantiate objects and
 * invoke methods.
 */
class MonitorManager 
{
	private $pt;
	private $url;
	//This __construct function is used to create objects of the 
	//PortMonitorService and WebMonitorServices
	function __construct($pt,$url)
	{
		$pt = new PortMonitorService();
		$url = new WebMonitorService();
	}
	//This __run function takes in a xml file and parses througb it to
	//create children based on hhow many parts/web links there are.
	public function __run()
	{
		$file = simplexml_load_file("/root/project/smiple.xml");
		$classes = array();
		foreach($file->services->services as $service)
		{
			$class = $service->class;
			$class2 = "$class";
			$name = $service->name;
			$frequency = $service->parameters->frequency;
			$interval = $service->parameters->interval;
			if($class2 == "PortMonitorService")
			{
				$port = $service->parameters->port; 
				$serviceRef = new ReflectionClass($class2);
				if($serveiceRef->isInstantiable())
				{
					$serve = $serviceRef->newInstance($name,$port,$frequency,$interval); 
					$classes[] = $serve;
				} 
			}
			else
			{
				$link = $service->parameters->link;
				$serviceRef = new ReflectionClass($class2);
				if($serviceRef->isInstantiable())
				{
					$serve = $serviceRef->newInstance($name,$link,$frequency,$interval);
					$classes[] = $serve;
				}
			}
		}
		while(True)
		{
			$children = array();

			if($class2 == "PortMonitorService")
			{
				for($i = 0; $i < $port; $i++)
				{
					$pid = pcntl_fork();
					if(($pid == 0))
					{
						exit($pt->execute());
					}
					else
					{
						$children[] = $pid;
					}
				}
			}
			else
			{
				for($i = 0; $i < $link; $i++)
				{
					$pid = pcntl_fork();
					if(($pid == 0))
					{
						exit($url->execute());
					}
					else
					{
						$children[] = $pid;
					}
				}
			}	
		} 
	}
}
