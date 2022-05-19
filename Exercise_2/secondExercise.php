<?php
class Path
{
    public $currentPath;

    function __construct($path)
    {
        $this->currentPath = $path;
    }

    public function cd($newPath)
    {
        $originalPath = explode("/", $this->currentPath);
        $commands = explode("/", $newPath);

        foreach ($commands as $command) {
            if ($command == '..') {
                array_pop($originalPath);
            } else {
                $originalPath[] = $command;
            }
        }

        $this->currentPath = implode("/", $originalPath);
    }
}

$path = new Path('/a/b/c/d');
$path->cd('../x');
echo $path->currentPath;