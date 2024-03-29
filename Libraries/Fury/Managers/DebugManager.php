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
    
    /**
     * Debug Manager:
     * This will handle all warnings, errors, etc.
     * To Do:
     * Figure out a way to include a style with output
     **/
    class DebugManager
    {
        
        /**
         * Warning:
         * This will output a message, but not
         * kill the page.
         **/
        public static function Warning($text)
        {
            echo "<b>Warning: </b>" . $text . "<br />";
            LogManager::File($text);
        }

        public static function Error($text)
        {
            echo "<b>Error: </b>" . $text . "<br />";
            LogManager::File($text);
            die();
        }
        
    }
   
?>