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
    
    //Core class.
    //This will initiate everything
    //that we need to run the framework
    //effectively.
    class Fury
    {
        
        //Class constructor:
        public function __construct()
        {
            //Load the application definitions
            TaskManager::LoadCustomDefines();
            //Load the Fury definitions:
            TaskManager::LoadRequiredDefines();
            //Load the LogManager
            TaskManager::LoadClass('LogManager', 'Managers');
            //Load the Debugger:
            TaskManager::LoadClass('DebugManager', 'Managers');
            //Load the Database:
            TaskManager::LoadClass('Database', 'Database');
            //Load the Smarty Template:
            TaskManager::LoadClass('Smarty', 'View/Smarty');
            //Initiate Smarty:
            TaskManager::InitiateSmarty();
            //Load the Plugin Manager:
            TaskManager::LoadClass('PluginManager', 'Managers');
            //Load Plugins
            PluginManager::LoadPlugins();
            //Load the Controller Class:
            TaskManager::LoadClass('Controller', 'Controller');
            //Process the Controller:
            Controller::ProcessController();
        }
        
    }
    
?>