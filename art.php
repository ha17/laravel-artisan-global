#!/usr/local/bin/php
<?php

/**
 * Command is run by ./artisan; ./artisan runs the output of this command
 * This command seaches up the directory tree for the directory that $lookingFor
 * is in, and runs $commandToRun with arguments
 */

$lookingFor   = 'artisan';
$commandToRun = 'artisan';

$dir = explode('/', getcwd());

#die(print_r($dir, true) . PHP_EOL);

$arguments = $argv;
array_shift($arguments);
$artisanCommand = implode(' ', $arguments);

$i=0;
while (sizeof($dir) >= 2 && $i<20) {
    $i++;
    $levelUp = implode('/', $dir);
    $artisanFile = $levelUp . '/' . $lookingFor;

    array_pop($dir);
    if (file_exists($artisanFile) && is_file($artisanFile)) {
        break;
    }
}

#$exec = "php {$levelUp}/{$commandToRun} {$artisanCommand}";
#passthru($exec);
echo "php {$levelUp}/{$commandToRun} {$artisanCommand}";
