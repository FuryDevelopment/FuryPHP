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
    
    class PluginManager
    {
        
        public static function LoadPlugins()
        {
            $FileType = ".php";
            $PluginDir = SYSTEM_ROOT . D . "Plugins" . D;
            //Iterate through each file and include it:
            foreach(glob($PluginDir . "*" . $FileType) as $Plugin)
            {
                include_once $Plugin;
            }
        }
  
    }
    
?>