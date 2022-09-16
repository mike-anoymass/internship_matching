<?php
    spl_autoload_register('autoLoader');

    function autoLoader($className){
        $path = __DIR__.'/../classes/';
        $extension = '.class.php';
        $fileName = $path . $className . $extension;

        if(!file_exists($fileName)){
            return false;
        }
        include_once $path . $className . $extension;
    }


?>