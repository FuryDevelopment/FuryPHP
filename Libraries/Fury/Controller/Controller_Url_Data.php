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
    
    /**
     * This classes sole reason is to
     * retrieve data from the url
     * for the controller. This will return
     * the controller name, the controller
     * action, and the controller parameter.
     **/
    class Controller_Url_Data
    {
        
        /**
         * This method returns the current controller,
         * if its empty, it returns the default
         * controller defined in the required
         * definitions file.
         * Refer to Config/Defins.php
         **/
        public static function CurrentController()
        {
            //Prevent Undefined warning:
            if(!isset($_GET['c']))
                $_GET['c'] = '';
                
            //Get variable from the URL:
            $Controller = $_GET['c'];
            //Check if empty or not and return.
            if(empty($Controller))
                $Controller = DEFAULT_CONTROLLER;
            else
                $Controller = ucfirst($Controller); //Just to make sure no funny business happens.
                
            return $Controller;
        }
        
        /**
         * This method returns the current action,
         * if its empty, it returns the default
         * controller defined in the required
         * definitions file.
         * Refer to Config/Defins.php
         **/
        public static function CurrentAction()
        {
            //Prevent Undefined warning:
            if(!isset($_GET['a']))
                $_GET['a'] = '';
            
            //Get variable from the URL:
            $Action = $_GET['a'];
            //Check if empty or not and return.
            if(empty($Action))
                $Action = DEFAULT_CONTROLLER_ACTION;
            else
                $Action = $Action;
                
            return $Action;
        }
        
        /**
         * This method returns the current parameter
         * in the url, if available. If empty, it just
         * returns null.
         **/
        public static function CurrentParam()
        {
            //Prevent Undefined warning:
            if(!isset($_GET['id']))
                $_GET['id'] = '';
            
            //Get variable from the URL:
            $Parameter = $_GET['id'];
            //Check if empty or not and return.
            if(empty($Parameter))
                $Parameter = NULL;
            else
                $Parameter = $Parameter;
                
            return $Parameter;
        }
        
    }
   
?>