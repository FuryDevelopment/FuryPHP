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
                $Model  = self::CurrentController();
                $Action = self::CurrentAction();


                /**
                 * VERSION 1.0.9 DEV CHANGE:
                 * WE WILL NOW INITIALIZE THE MODEL FROM HERE.
                 **/
                //Check if we can load the model
                if(TaskManager::LoadModel($Model))
                {
                    $ClassExtension = $Model . "Model";
                    //Load this class:
                    $ModelClass = new $ClassExtension;

                    if(method_exists($ModelClass, $Action))
                    {
                        $ModelClass->$Action();
                        $ModelClass->ProcessModel($Model, $Action);
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
            else
            {
                //If the controller doesnt exist, throw an error lettings them know.
                LogManager::File('"' . self::CurrentController() . 'Controller" was not found.');
                TaskManager::LoadError404('"' . self::CurrentController() . 'Controller" was not found.');
            }
        }
        
    }
   
?>