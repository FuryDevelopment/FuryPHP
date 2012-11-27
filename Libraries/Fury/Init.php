<?php

   /**
    * ------------------------------------------------------------------
    * FuryPHP Framework
    *                                                  
    * @author: Matt Grubb
    * @copyright: Copyright 2012, Matt Grubb, (http://www.furyphp.com)
    * @link: http://www.furyphp.com
    * @license: (http://www.opensource.org/licenses/mit-license.php)
    * ------------------------------------------------------------------
    **/
    
    //Checking for Fury's TaskManager File:
    //------------------------------------------------------------------
    $TaskFile = FURY_LIB . D . "Managers" . D . "TaskManager.php";
    if(file_exists($TaskFile))
        require $TaskFile;
    else
        trigger_error("Fury TaskManager file could not be found.");
    //------------------------------------------------------------------ 
    
    //Checking for Fury's Core File:
    //------------------------------------------------------------------
    $CoreFile = FURY_LIB . D . "Core" . D . "Fury.php";
    if(file_exists($CoreFile))
    {
        require $CoreFile;
        //Initialize the class:
        $Fury = new Fury;
    }else{
        trigger_error("Fury Core file could not be found.");
    }
    //------------------------------------------------------------------  
    
?>