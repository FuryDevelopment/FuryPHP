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
    
    //Load the URL Data class for the controller.
    TaskManager::LoadClass('Controller_Url_Data', 'Controller');
    
    /**
     * This file has been shortened a lot with the
     * new task manager in place. 90% of this class
     * is ran by methods from the Task Manager.
     * Refer to Managers/TaskManager.php
     **/
    class Controller extends Controller_Url_Data
    {
        
        //This method will Process the Controller
        //and load it.
        public static function ProcessController()
        {
            //Once we get to this method, we can get all
            //information about the controller from the
            //Controller_Url_Data class with the following:
            //self::CurrentController();
            //self::CurrentAction();
            //self::CurrentParam();
            
            //Lets check if the Controller Exist:
            if(TaskManager::LoadController(self::CurrentController()))
            {
                //We can now move on to loading the Model & View.
                TaskManager::LoadClass('Model', 'Model');
                $Model = new Model;
                //Call the Model now that we know the controller exists.
                Model::ProcessModel(self::CurrentController(), self::CurrentAction());
            }
            else
            {
                //If the controller doesnt exist, throw an error lettings them know.
                LogManager::File('"' . self::CurrentController() . 'Controller" was not found.');
                TaskManager::LoadError404('"' . self::CurrentController() . 'Controller" was not found.');
            }
        }
        
    }
   
?>