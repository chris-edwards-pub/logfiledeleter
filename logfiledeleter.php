<?php
/**
 * Created by PhpStorm.
 * User: chris.edwards
 * Date: 8/15/17
 * Time: 2:53 PM
 */

include "classes/ListOfFiles.php";
include "classes/DeleteOldFiles.php";
include "classes/DeleteDirectories.php";
include "classes/ListOfDirectories.php";

/**
 * Sets an array of directories to recursively search that are matched to the regex provided.
 */
$directories_to_delete = array();
$directories_to_delete[] = array('dir' => '/Users/chris.edwards/testdir', 'search' => '/^.+(\/test)$/');

/**
 * Recursively deletes all directories in the $directories_to_delete array.
 */
foreach ($directories_to_delete as $directory_to_delete){

    echo "\n\nSearching For Directories Under: " . $directory_to_delete['dir'] . " | Regex: " . $directory_to_delete['search'] . "\n\n";

    $listOfDirectories = new ListOfDirectories();
    $listOfDirectories->getListOfDirectories($directory_to_delete['dir'],$directory_to_delete['search']);

    foreach ($listOfDirectories->directories as $directory){
        $directory_deletion = new DeleteDirectories();
        $directory_deletion->deleteDirectory($directory);
    }
}

/**
 * Sets an array of files to recursively search for that are matched to the regex provided.
 */
$directories_to_search = array();

$directories_to_search[] = "/Users/chris.edwards/testfiles";

/**
 * Deletes every file in the $directories_to_search
 */
foreach ($directories_to_search as $directory_to_search) {

    echo "\n\nSearching Directory: " . $directory_to_search . "\n\n";

    $listOfFiles = new ListOfFiles();
    $listOfFiles->getListOfFiles($directory_to_search, '/^.+\.txt.(gz|gzip)$/i');

    foreach ($listOfFiles->files as $file) {
        $file_to_delete = new deleteOldFiles();
        $older_than_date = '2014-12-31';
        $file_to_delete->deleteFile($file[0], $older_than_date);
    }
}