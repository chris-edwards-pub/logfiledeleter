<?php
/**
 * Created by PhpStorm.
 * User: chris.edwards
 * Date: 8/15/17
 * Time: 2:53 PM
 */

/**
 * Class ListOfFiles
 */
class ListOfFiles
{
    public $files = array();

    /**
     * Gets recursive list of files from the path passed.  Leaves out . & .. files.  Can take an optional regex to search for specific files.
     *
     * @param $path
     * @param string $regex
     */
    public function getListOfFiles($path,$regex = '/^.+$/')
    {
        try {
            $directory = new RecursiveDirectoryIterator($path,RecursiveDirectoryIterator::SKIP_DOTS);
            $iterator = new RecursiveIteratorIterator($directory);
            $this->files = new RegexIterator($iterator, $regex, RecursiveRegexIterator::GET_MATCH);
        } catch (Exception $e){
            echo " Error: ". $e->getMessage() . "\n";
        }
    }
}
