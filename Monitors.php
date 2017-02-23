<?php
/*
By: Eddie W. White III

The file Monitors.php creates a MonitorManger object
and calls its __run function in order to create 
the children.
*/
require_once "./app/Monitors/MonitorManager.php";

$run = new MonitorManager();
$run->__run();
