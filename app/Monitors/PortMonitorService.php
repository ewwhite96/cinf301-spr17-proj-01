<?php
$host = 'localhost';
$ports = array(22, 80, 443, 3306);

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

