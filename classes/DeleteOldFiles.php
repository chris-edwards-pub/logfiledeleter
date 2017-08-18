<?php
/**
 * Created by PhpStorm.
 * User: chris.edwards
 * Date: 8/15/17
 * Time: 3:41 PM
 */

/**
 * Class DeleteOldFiles
 */
class DeleteOldFiles
{
    public $older_than_date;
    public $full_path_filename;
    public $filename;
    public $older_than_delete_date;

    /**
     * Deletes a file passed to it that is older than the date passed to it.  This searches based on filename contains the date, not the files timestamp.
     * Example file name: 2009-08-31.txt.gzip
     *
     * @param $file
     * @param $older_than_date
     */
    public function deleteFile($file,$older_than_date)
    {
        $this->full_path_filename = $file;
        $this->filename = basename($this->full_path_filename);
        $this->older_than_date = $older_than_date;
        $this->older_than_delete_date = DateTime::createFromFormat('Y-m-d', $older_than_date);

        if(preg_match("/\d{4}-\d{2}-\d{2}/", $this->filename, $match)) {
            $file_date = DateTime::createFromFormat('Y-m-d', $match[0]);
            //echo $file_date->format('Y-m-d') . "\n";
            if ($file_date <= $this->older_than_delete_date){
                unlink($this->full_path_filename);
                echo "\n" . $this->full_path_filename . " ... Deleted ";
            }
        }
    }
}