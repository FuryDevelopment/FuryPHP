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
     * This class will handle all
     * post and get data from the
     * url.
     **/
    class Data
    {
        /**
         * Handle the Get data,
         * and sanatize on return
         **/
        public function get($field)
        {
            if(isset($_GET[$field]))
            {
                return self::sanitize($_GET[$field]);
            }
        }
        
        /**
         * Handle the POST data
         * and sanatize on return.
         **/
        public function post($field)
        {
            if(isset($_POST[$field]))
            {
                return self::sanitize($_POST[$field]);
            }
        }
        
        /**
         * Sanaztize the variable
         **/
        public function sanitize($string)
        {
            return filter_var($string, FILTER_SANITIZE_STRING);
        }
        
    }
   
?>