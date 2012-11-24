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
     * This class will run the loading
     * of Models and Views.
     **/
    class Model
    {
        //Setup multiple variables we need:
        static $ModelClass = null; //The Extender Class
        static $showHeader = true; //Option to show header
        static $showFooter = true; //Option to show footer.
        static $showView   = true;
        public $Session    = null;
        public $data       = null;
        
        /**
         * Class constructor. This will setup
         * any needed classes.
         **/
        public function __construct()
        {
            TaskManager::LoadClass('Data', 'Model/Data');
            $this->data = new Data;
        }
    
        /**
         * Method to process the Model. We pass multiple
         * parameters here to check:
         * @param: Model -> Extender Class to call
         * @param: Action -> Extender Method to call
         **/
        public static function ProcessModel($Model, $Action)
        {
            
            //Check if we can load the model
            if(TaskManager::LoadModel($Model))
            {
                //Set up the class extension title:
                $ClassExtension = $Model . "Model";
                //Load this class:
                self::$ModelClass = new $ClassExtension;
                //If the method exists
                if(method_exists(self::$ModelClass, $Action))
                {
                    //Call Class Method
                    self::$ModelClass->$Action();
                    
                    //If displaying Header:
                    if(self::$showHeader)
                    {
                        //Try loading it
                        if(!TaskManager::LoadHeader())
                        {
                            //If it doesnt load, let them know:
                            LogManager::File('Header was unable to be loaded.');
                            DebugManager::Warning('Header was unable to be loaded.');
                        } 
                    } 
                    
                    //If we are showing the view:
                    if(self::$showView)
                    {
                        //Try loading the View for the current Model
                        if(!TaskManager::LoadView($Model, $Action))
                        {
                            //If it doesnt load, let them know:
                            LogManager::File('"' . $Action . '" was unable to be found.');
                            DebugManager::Warning('"' . $Action . '" was unable to be found.');
                        } 
                    }
                          
                    //If displaying Header:  
                    if(self::$showFooter)
                    {
                        //Try loading it:
                        if(!TaskManager::LoadFooter())
                        {
                            //If it doesnt load, let them know.
                            LogManager::File('Footer was unable to be loaded.');
                            DebugManager::Warning('Footer was unable to be loaded.');
                        }   
                    }
                        
                }
                //If it doesnt:
                else
                {
                    //Let them know via Debug Warning:
                    LogManager::File('Action "' . $Action . '" was not found.');
                    TaskManager::LoadError404('Action "' . $Action . '" was not found.');
                }
            }
            //If we were not able to load the model:
            else
            {
                //Let them know via Debug warning:
                LogManager::File('"' . $Model . 'Model" was not found.');
                TaskManager::LoadError404('"' . $Model . 'Model" was not found.');
            }
        }
        
        
        //Extender Option Methods:
        //------------------------------------------------------
        
        /**
         * are we using sessions?
         **/
         
        public function useSessions($sessions, $dbsave)
        {
            if($sessions)
            {
                TaskManager::LoadClass('Session', 'Model/Session');
                $this->Session = new Session;
                $this->Session->StartSession($dbsave);
            }
        }
        
        /**
         * Method to show the view or not.
         * We make this optional.
         **/
        public function showView($show)
        {
            self::$showView = $show;
        }
        
        /**
         * Method to show header or not.
         * We make this optional.
         **/
        public function showHeader($show)
        {
            self::$showHeader = $show;
        }
        
        /**
         * Method to show footer or not.
         * We make this optional.
         **/
        public function showFooter($show)
        {
            self::$showFooter = $show;
        }
        
        /**
         * Method to show footer or not.
         * We make this optional.
         **/
        public function set($var, $value)
        {
            TaskManager::$Smarty->assign($var, $value);
        }
        
        //------------------------------------------------------
        
    }
   
?>