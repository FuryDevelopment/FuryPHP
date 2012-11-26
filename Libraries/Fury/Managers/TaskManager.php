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
         * Smarty initializer:
         * ---------------------------------
         **/
        public static function InitiateSmarty()
        {
            //Load the HTML Class:
            TaskManager::LoadClass('Html', 'View');
            //Set the static variable to the class
            self::$Smarty = new Smarty;
            //Configure Smarty:
            //==========================================================================
            self::$Smarty->setTemplateDir(SMARTY_TEMPLATE_DIRECTORY); // Do not change
            self::$Smarty->setCompileDir (TEMP_CACHE_DIRECTORY); // Do not change
            self::$Smarty->setCacheDir   (SMARTY_CACHE_DIRECTORY); // Do not change
            self::$Smarty->setConfigDir  (SMARTY_CONFIGS_DIRECTORY); // Do not change
            self::$Smarty->debugging      = SMARTY_DEBUGGING; // For development only. If enabled, a debug popup opens.
            self::$Smarty->caching        = SMARTY_CACHING; // I have disabled caching for development reasons.
            self::$Smarty->cache_lifetime = SMARTY_CACHE_LIFETIME; // Caching lifetime.
            //==========================================================================
        }
        
        /**
         * ---------------------------------
         * Load the Header
         * ---------------------------------
         **/
        public static function LoadHeader()
        {
            //If it exists, load it and return true
            if(file_exists(APP_HEADER_VIEW)){
                self::$Smarty->display(APP_HEADER_VIEW);
                return true;
            //If it doesnt exist, return false.
            }else{
                return false;
            }   
        }
        
        /**
         * ---------------------------------
         * Load the View
         * ---------------------------------
         **/
        public static function LoadView($Model, $Action)
        {
            $file = APPLICATION_DIR . D . "Modules" . D  . $Model . D . "Views" . D . $Action . '.tpl';
            //If it exists, load it and return true
            if(file_exists($file)){
                self::$Smarty->display($file);
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
        public static function LoadFooter()
        {
            //If it exists, load it and return true
            if(file_exists(APP_FOOTER_VIEW)){
                self::$Smarty->display(APP_FOOTER_VIEW);
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
            self::$Smarty->assign('error', $error);
            self::$Smarty->display(APP_ERROR_404);
            die();   
        }
    }
    
?>