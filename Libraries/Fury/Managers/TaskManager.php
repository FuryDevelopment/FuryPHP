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
    
    class TaskManager
    {
        public static $Smarty;
        
        /**
         * ---------------------------------
         * Class Loader
         * ---------------------------------
         **/
        public static function LoadClass($classname, $location)
        {
            //If the class name/location is NOT empty.
            if(!empty($classname) && !empty($location))
            {
                //Setup the class file location:
                $ClassFile = FURY_LIB . D . ucfirst($location) . D . ucfirst($classname) . ".php";
                //Check if the Class exists:
                if(file_exists($ClassFile))
                {
                    include_once $ClassFile;
                }else
                {
                  trigger_error('Class "' . $classname . '" does not exist.');  
                }    
            }
        }
        
        /**
         * ---------------------------------
         * Load Custom Definitions
         * ---------------------------------
         **/
        public static function LoadCustomDefines()
        {
            //Here we are loading the file from the application directory
            //that is meant to overwrite any global constants within the
            //framework. This file is not required.
            $DefineFile = APPLICATION_DIR . D . "Config" . D . "Defines.php";
            if(file_exists($DefineFile))
                include_once($DefineFile);
        }
        
        /**
         * ---------------------------------
         * Load framework definitions:
         * ---------------------------------
         **/
        public static function LoadRequiredDefines()
        {
            //Here we are loading the required file for the framework
            //that holds all global constants.
            $DefineFile = FURY_LIB . D . "Config" . D . "Defines.php";
            if(file_exists($DefineFile))
            {
                include_once($DefineFile);
            }else{
                //Since this is a required file, it it does not exist, we need
                //to kill the app.
                trigger_error('Fury requires a defines file, which could not be found.');
                die();
            }
        }
        
        /**
         * ---------------------------------
         * Load the SiteURL
         * ---------------------------------
         **/
        public static function GetURL()
        {
            $pageURL = 'http';
            //If it's a secure site:
            if (!empty($_SERVER['HTTPS'])) {$pageURL .= "s";}  
                $pageURL .= "://";
            //If the port is not 80
            if ($_SERVER["SERVER_PORT"] != "80") {
                $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
            //Else just get the server name
            } else {
                $pageURL .= $_SERVER["SERVER_NAME"];
            }
            return $pageURL;
        }
        
        /**
         * ---------------------------------
         * Load the Controller
         * ---------------------------------
         **/
        public static function LoadController($Controller)
        {
            $Controller = ucfirst($Controller);
            //Load the controller from the application
            //directory.
            $file = APPLICATION_DIR . D . "Modules" . D  . $Controller . D . $Controller . 'Controller.php';
            //If it exists, load it and return true
            if(file_exists($file)){
                include_once($file);
                return true;
            //If it doesnt exist, return false.
            }else{
                return false;
            }   
        }
        
        /**
         * ---------------------------------
         * Load the Model
         * ---------------------------------
         **/
        public static function LoadModel($Model)
        {
            $Model = ucfirst($Model);
            //Load the controller from the application
            //directory.
            $file = APPLICATION_DIR . D . "Modules" . D  . $Model . D . $Model . 'Model.php';
            //If it exists, load it and return true
            if(file_exists($file)){
                include_once($file);
                return true;
            //If it doesnt exist, return false.
            }else{
                return false;
            }   
        }
        
        /**
         * ---------------------------------
         * Load the Footer
         * ---------------------------------
         **/
        public static function LoadError404($error)
        {
            //Let them know via Debug warning:
            $View = new View;
            $View->smarty->assign('error', $error);
            $View->smarty->load(APP_ERROR_404);
            die();   
        }
    }
    
?>