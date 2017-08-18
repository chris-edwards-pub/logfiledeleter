<?php
/**
 * Created by PhpStorm.
 * User: chris.edwards
 * Date: 8/16/17
 * Time: 11:42 AM
 */

/**
 * Class DeleteDirectories
 */
class DeleteDirectories
{
    public $directory;

    /**
     * Recursively deletes any directory passed to it.  Uses linux "rm" so not usable with Windows.
     *
     * @param $directory
     */
    public function deleteDirectory($directory)
    {
        $this->directory = $directory;
        shell_exec('rm -rf ' . $this->directory);
        echo "\n" . $this->directory;
        echo " ... Deleted ";
    }

}