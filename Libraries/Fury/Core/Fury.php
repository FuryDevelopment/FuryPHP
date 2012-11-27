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
            //Load the Database Manager
            TaskManager::LoadClass('DataBaseManager', 'Managers');
            //Load The Smarty Template Engine:
            TaskManager::LoadClass('Smarty', 'View/Smarty');
            //Load the HTML Class
            TaskManager::LoadClass('Html', 'View');
            //Load the View Class
            TaskManager::LoadClass('View', 'View');
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