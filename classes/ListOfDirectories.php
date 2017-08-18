<?php
/**
 * Created by PhpStorm.
 * User: chris.edwards
 * Date: 8/16/17
 * Time: 1:25 PM
 */

/**
 * Class ListOfDirectories
 */
class ListOfDirectories
{
    public $directories = array();

    /**
     * Gets recursive list of directories from the path passed.  Leaves out . & .. files.  Can take an optional regex to search for specific directories
     *
     * @param $path
     * @param string $regex
     */
    public function getListOfDirectories($path, $regex = '/^.+$/')
    {
        try {
            $directory = new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS);
            $recursed_directories = new RecursiveIteratorIterator($directory, RecursiveIteratorIterator::CHILD_FIRST);
            foreach ($recursed_directories as $dir) {
                if (preg_match($regex, $dir->getPathname())) {
                    $this->directories[] = $dir->getPathname();
                }
            }
        } catch (Exception $e) {
            echo " Error: " . $e->getMessage() . "\n";
        }
    }
}