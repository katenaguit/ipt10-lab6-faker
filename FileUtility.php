<?php

class FileUtility {
    public static function writeToFile($filename, $data) {
        file_put_contents($filename, $data);
    }

    public static function openFile($filename) {
        return file_get_contents($filename);
    }
}
?>
