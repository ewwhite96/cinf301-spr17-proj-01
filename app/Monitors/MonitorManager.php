<?php
require_once __DIR__ . '/../../vendor/autoload.php';

/*
 * Use Reflection to automatically instantiate objects and
 * invoke methods.
 *
 * NOTE: Can we log our results to a file?
 */

/*
 * Note that while the XML file automatically escapes the backslash
 * in the file, but when using an array (like below), you must do so
 * yourself.  That's why the code didn't work in class!
 */
// $connections = array("App\\framework\\db\\Connection",
//     "App\\framework\\network\\Connection",
//     "App\\Models\\SocialNetwork\\Connection");

// foreach ($connections as $connection) {

class MonitorManager
{
	private $xml;
	private $out;
	function __contsrtuct($xml,$out)
	{
		$this->xml = $xml;
		$this->out = $out;
	}
	
	private function __run()
	{
		$file = simplexml_load_file("./" + $xml);
		$classes = array();
		foreach($file->services->services as $service)
		{
			$class = "$service->class";
			$name = $service->name;
			$frequency = $service->parameters->frequency;
			$interval = $service->parameters->interval;
			if($class == "PortMonitorService")
			{
				$port = $service->parameters->port; 
				$serviceRef = new ReflectionClass($class);
				if($serveiceRef->isInstantiable())
				{
					$serve = $serviceRef->
				} 
			}
		} 
	}
}

