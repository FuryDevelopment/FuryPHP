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
     * This class will run the loading
     * of Models and Views.
     **/
    class Model
    {
        //Setup multiple variables we need:
        public $showHeader = true; //Option to show header
        public $showFooter = true; //Option to show footer.
        public $showView   = true;
        public $session    = null;
        public $data       = null;
        public $view       = null;
        public $sql        = null;
        
        /**
         * Class constructor. This will setup
         * any needed classes.
         **/
        public function __construct()
        {
            TaskManager::LoadClass('Data', 'Model/Data');
            $this->data = new Data;
            $this->view = new View;
            $this->sql  = new DatabaseManager;
        }
    
        /**
         * Method to process the Model. We pass multiple
         * parameters here to check:
         * @param: Model -> Extender Class to call
         * @param: Action -> Extender Method to call
         **/
        public function ProcessModel($Model, $Action)
        {

            if($this->showHeader)
            {
                //Try loading it
                if(!$this->view->load(APP_HEADER_VIEW))
                {
                    //If it doesnt load, let them know:
                    LogManager::File('Header was unable to be loaded.');
                    DebugManager::Warning('Header was unable to be loaded.');
                } 
            } 
                    
            //If we are showing the view:
            if($this->showView)
            {
                //Try loading the View for the current Model
                $ViewFile = APPLICATION_DIR . D . "Modules" . D  . $Model . D . "Views" . D . $Action . '.tpl';
                if(!$this->view->load($ViewFile))
                {
                    //If it doesnt load, let them know:
                    LogManager::File('"' . $Action . '" was unable to be found.');
                    DebugManager::Warning('"' . $Action . '" was unable to be found.');
                } 
            }
                          
            //If displaying Header:  
            if($this->showFooter)
            {
                //Try loading it:
                if(!$this->view->load(APP_FOOTER_VIEW))
                {
                    //If it doesnt load, let them know.
                    LogManager::File('Footer was unable to be loaded.');
                    DebugManager::Warning('Footer was unable to be loaded.');
                }   
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
                $this->session = new Session;
                $this->session->StartSession($dbsave);
            }
        }
        
        /**
         * Method to show footer or not.
         * We make this optional.
         **/
        public function set($var, $value)
        {
            $this->view->smarty->assign($var, $value);
        }
        
        //------------------------------------------------------
        
    }
   
?>