<?php

class ParseArgv
{
	global $argv;

    public function __construct()
    {
        $argv = $argv ? $argv : $_SERVER['argv'];
    }

    public function parse($argv)
    {
	array_shift($argv);
        $argvs = array();
        foreach($argv as $arg)
        {
                // This is supposed to find the -- characters in a string
                if(substr($arg,0,2) == '--')
                {
                        $equals = strpos($arg, '=');
                        // If character in string equals '='  saving anything before it as a key and anything afterward as a value
                        if($equals ! == $false)
                        {
                                $argvs[substr($arg,2,$equals - 2)] = substr($arg,$equals + 1);
                        }
                        else
                        {
                                $k = substr($arg,2);
                                if(!isset($argvs[$k]))
                                {
                                        $argvs[$k] = true;
                                }
                        }
                }
                else if(substr($arg,0,1) == '=')
                {
                        if(substr($arg,2,1) == '=')
                        {
                                $argvs[substr($arg,1,1)} = substr($arg,3);
                        }
                        else
                        {
                                foreach(str_split(substr($arg,1))) as $k)
                                {
                                        if(!isset($argvs[$k]))
                                        {
                                                $argvs[$k] = true;
                                        }
                                }

                        }
                }
                else
                {
                        $argvs[] = $arg;
                }
        }
        return $argvs;
}
