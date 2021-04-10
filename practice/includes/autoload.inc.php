<?php

function autoloader ($classname)
{
    $path = '/classes';
    $extension = 'class.php';
    $filename = $path . $classname . $extension;

    if(!file_exists($filename))
    {
        return false;
    }

    include_once $path . $classname . $extension;
}
spl_autoload_register('autoloader');

?>