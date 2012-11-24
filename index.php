<?php

   /**
    * ------------------------------------------------------------------
    * FuryPHP Framework
    * 
    * @version: v1.0.0a                                                      
    * @author: Matt Grubb
    * @copyright: Copyright 2012, Matt Grubb, (http://www.furyphp.com)
    * @link: http://www.furyphp.com
    * @license: (http://www.opensource.org/licenses/mit-license.php)
    * ------------------------------------------------------------------
    **/
    
    //Define the Directory Seperator:
    define("D", str_replace("\\", "/", DIRECTORY_SEPARATOR));
    //Define the System Root
    define("SYSTEM_ROOT", str_replace("\\", "/", dirname( __FILE__ )));
    //Application Directory
    define("APPLICATION_DIR", SYSTEM_ROOT . D . "Application");
    //Define the FURY Library location:
    define("FURY_LIB", "Libraries" . D . "Fury");
    //Define the Base Directory (This one)
    define("BASE_DIR", str_replace(basename(__FILE__), '', $_SERVER['PHP_SELF']));
    
    //Check if the initializer does exist:
    //------------------------------------------------------------------
    $Initializer = SYSTEM_ROOT . D . FURY_LIB . D . "Init.php";
    if(file_exists($Initializer))
        require $Initializer;
    else
        trigger_error("Fury Initializer was unable to be found.");
    //------------------------------------------------------------------
    
?>