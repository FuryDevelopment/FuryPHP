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
    * Check here if we have a database file to include from the
    * application's Config folder. If we don't, then we need to set 
    * the allow connection to false to prevent any kind of connection.
    **/
    define('DATABASE_FILE', APPLICATION_DIR . D . 'Config' . D . 'Database.php');
    
    if(!file_exists(DATABASE_FILE))
    {
        Database::$allowConnection = false;
    }
    
   /**
    * If we do have an allowed connection, set it under here.
    **/
    else
    {
        include(DATABASE_FILE);
        Database::init();
        Database::connect();
        Database::selectDB();
    }
    
    class Database
    {
        
        public static $connection = NULL;
        public static $result     = false;
        public static $allowConnection = NULL;
        
        public static function init()
        {
            if(!empty($GLOBALS['SQL_DATABASE']['host']) &&
               !empty($GLOBALS['SQL_DATABASE']['database'])&&
               !empty($GLOBALS['SQL_DATABASE']['user'])){
                
                self::$allowConnection = true;
            }
        }
        
        
        /*
            ---------------------------------------------
           |     Function: connect                       |
           |     Description: Connects to the SQL        |
           |                   database.                 |
            ---------------------------------------------
            
        */
        public static function connect(){
            if(!self::$allowConnection)
            {
                trigger_error('Connection variables were not set. Refused to attempt connectivity to SQL.');
                die();
            }
            else
            {
                if(!self::$connection = mysql_connect($GLOBALS['SQL_DATABASE']['host'], 
                                                      $GLOBALS['SQL_DATABASE']['user'], 
                                                      $GLOBALS['SQL_DATABASE']['password'])){
                    trigger_error('Unable to connect to the database.'); 
                    die();                                       
                }
            }
        }
        
        /*
            ---------------------------------------------
           |     Function: selectDB                      |
           |     Description: Selects the database       |
           |                  For MySQL                  |
            ---------------------------------------------
            
        */
        public static function selectDB(){
            if(!self::$allowConnection)
                trigger_error('Connection variables were not set. Refused to attempt connectivity to SQL.');
            elseif(self::$connection == NULL)
                trigger_error('Connection to the database failed. Please check your SQL Information.');
            else
                mysql_select_db($GLOBALS['SQL_DATABASE']['database']) or die(mysql_error());
        }
        
        /*
            ---------------------------------------------
           |     Function: escape_string                 |
           |     Description: Protects a String          |
            ---------------------------------------------
            
        */
        public static function escape_string($String){
            if(!self::$allowConnection)
                trigger_error('Connection variables were not set. Refused to attempt connectivity to SQL.');
            elseif(self::$connection == NULL)
                trigger_error('Connection to the database failed. Please check your SQL Information.');
            else
                $EscapeString = mysql_real_escape_string($String, self::$connection);
                Return $EscapeString;
        }
        
        /*
            ---------------------------------------------
           |     Function: query                         |
           |     Description: Simple function to         |
           |                  handle the Queries         |
            ---------------------------------------------
            
        */
        public static function query($Query){
            if(!self::$allowConnection)
                trigger_error('Connection variables were not set. Refused to attempt connectivity to SQL.');
            elseif(self::$connection == NULL)
                trigger_error('Connection to the database failed. Please check your SQL Information.');
            else
                self::$result = mysql_query($Query, self::$connection) or die(mysql_error());
                Return self::$result;
        }
        
        /*
            ---------------------------------------------
           |     Function: fetch_array                   |
           |     Description: Handles the SQL function   |
           |                   fetch_array               |
            ---------------------------------------------
            
        */
        public static function fetch_array($Query){
            if(!self::$allowConnection)
                trigger_error('Connection variables were not set. Refused to attempt connectivity to SQL.');
            elseif(self::$connection == NULL)
                trigger_error('Connection to the database failed. Please check your SQL Information.');
            else
                $fetch = mysql_fetch_array($Query);
                Return $fetch;
        }
        
        /*
            ---------------------------------------------
           |     Function: num_rows                      |
           |     Description: Does a SQL row count       |
            ---------------------------------------------
            
        */
        public static function num_rows($Query){
            if(!self::$allowConnection)
                trigger_error('Connection variables were not set. Refused to attempt connectivity to SQL.');
            elseif(self::$connection == NULL)
                trigger_error('Connection to the database failed. Please check your SQL Information.');
            else
                $num_rows = mysql_num_rows($Query);
                Return $num_rows;
        }
        
        /*
            ---------------------------------------------
           |     Function: close                         |
           |     Description: Closes the connection      |
            ---------------------------------------------
            
        */
        public static function Close(){
            if(!self::$allowConnection)
                trigger_error('Connection variables were not set. Refused to attempt connectivity to SQL.');
            elseif(self::$connection == NULL)
                trigger_error('Connection to the database failed. Please check your SQL Information.');
            else
                mysql_close(self::$connection);
        }
        
    }
?>