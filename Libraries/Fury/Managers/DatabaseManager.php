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
    * Check here if we have a database file to include from the
    * application's Config folder. If we don't, then we need to set 
    * the allow connection to false to prevent any kind of connection.
    **/

    class DatabaseManager extends Database
    {
        public function __construct()
        {
            $DatabaseConfig = APPLICATION_DIR . D . 'Config' . D . 'Database.php';
            if(file_exists($DatabaseConfig))
            {
                include_once($DatabaseConfig);
                if($this->ValidConfiguation())
                {
                    $this->allowConnection = true;
                    $this->connect();
                    $this->selectDB();
                }
                else
                {
                    trigger_error('Connection variables were not set. Refused to attempt connectivity to SQL.');
                    die();
                }
                
            }
        }


        public function ValidConfiguation()
        {
            //Check if the SQL Variables are empty
            //or not.
            if(!empty($GLOBALS['SQL_DATABASE']['host']) &&
               !empty($GLOBALS['SQL_DATABASE']['database'])&&
               !empty($GLOBALS['SQL_DATABASE']['user'])){
                //if they are not empty,
                //that means we can connect.
                return true;
            }
            else
            {
                return false;
            }
        }
    }

?>