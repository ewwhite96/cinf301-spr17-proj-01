<?php
/*
The MonitorService class is an abstract class
that is called upon by PortMonitorService and 
WebMonitorService to use its abstract execute
function
*/

abstract class MonitorService
{
	abstract public function execute();
	
}
