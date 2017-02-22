<?php
require_once "./WebMonitorService.php";

$url = new WebMonitorService("localhost","http://www.stetson.edu");
$url->execute();
